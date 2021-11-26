<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Members extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->appauth->is_logged_in();
        $this->load->model('M_Datatables');
    }

    public function index()
    {
        $data['title'] = 'Members';
        $data['page'] = 'admin/members/index';
        $this->load->view('admin/template', $data);
    }

    public function view_data()
    {
        $tables = "system_members";
        $search = array('mbr_name', 'mbr_email', 'mbr_username');
        $isWhere = 'mbr_deleted_at IS NULL';
        header('Content-Type: application/json');
        $data = $this->M_Datatables->get_tables($tables, $search, $isWhere);
        header('Content-Type: application/json');
        echo $data;
    }

    public function getByID()
    {
        if (isset($_POST['mbr_id'])) {
            $data = $this->db->get_where('system_members', ['mbr_id' => $_POST['mbr_id']])->row_array();
            if ($data) {
                echo json_encode(['status' => 1, 'pesan' => 'Berhasil ambil data', 'data' => $data]);
            } else {
                echo json_encode(['status' => 0, 'pesan' => 'Gagal ambil data']);
            }
        } else {
            echo json_encode(['status' => 0, 'pesan' => 'Gagal ambil data']);
        }
    }

    function getGroup()
    {
        $data = $this->db
            ->where('grp_deleted_at', null)
            ->order_by('grp_name', 'asc')
            ->get('system_group')->result_array();
        if ($data) {
            echo json_encode(array('status' => 1, 'pesan' => 'Berhasil ambil data !!', 'data' => $data));
        } else {
            echo json_encode(array('status' => 0, 'pesan' => 'Gagal ambil data !!'));
        }
    }

    public function lock()
    {
        if (isset($_POST['mbr_locked']) && isset($_POST['mbr_id'])) {
            if ($_POST['mbr_locked'] == 0) {
                $mbr_locked = 1;
            } else {
                $mbr_locked = 0;
            }
            $this->db->where('mbr_id', $_POST['mbr_id']);
            $query = $this->db->update('system_members', ['mbr_locked' => $mbr_locked]);
            if ($query) {
                echo json_encode(['status' => 1]);
            } else {
                echo json_encode(['status' => 0, 'pesan' => 'Gagal simpan data']);
            }
        } else {
            echo json_encode(['status' => 0, 'pesan' => 'Gagal simpan data']);
        }
    }

    public function destroy()
    {
        if (isset($_POST['mbr_id'])) {
            $this->db->where('mbr_id', $_POST['mbr_id']);
            $query = $this->db->update('system_members', ['mbr_deleted_at' => date('Y-m-d H:i:s')]);
            if ($query) {
                echo json_encode(['status' => 1]);
            } else {
                echo json_encode(['status' => 0, 'pesan' => 'Gagal hapus data']);
            }
        } else {
            echo json_encode(['status' => 0, 'pesan' => 'Gagal hapus data']);
        }
    }

    public function store()
    {
        if ($this->get_validation()) {
            $mbr_username = $this->db->get_where('system_members', ['mbr_username' => $_POST['mbr_username'], 'mbr_deleted_at' => null])->row_array();
            if ($mbr_username && $_POST['mbr_id'] == "") {
                $array = array(
                    'error'   => true,
                    'mbr_username' => "Username sudah digunakan"
                );
                echo json_encode(array('status' => 3, 'pesan' => $array));
                die;
            }
            $data_image['file_name'] = '';
            $data = array(
                'mbr_name' => $_POST['mbr_name'],
                'mbr_username' => $_POST['mbr_username'],
                'mbr_email' => $_POST['mbr_email'],
                'mbr_deskripsi' => $_POST['mbr_deskripsi'],
                'mbr_twitter' => $_POST['mbr_twitter'],
                'mbr_facebook' => $_POST['mbr_facebook'],
                'mbr_instagram' => $_POST['mbr_instagram'],
            );
            if (!empty($_FILES['mbr_foto']['name'])) {
                $config['upload_path']          = './storage/user/';
                $config['allowed_types']        = 'jpg|png|jpeg|JPG|PNG|JPEG';
                $config['max_size']             = 2048;
                $config['remove_spaces']        = TRUE;
                $config['file_name']            = $_POST['mbr_username'] . "-" . date("Y_m_d His");
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('mbr_foto')) {
                    die;
                    echo json_encode(array('status' => 2, 'pesan' => "<b>Gagal upload gambar</b> <br>" . $this->upload->display_errors()));
                    die;
                } else {
                    $data_foto = $this->upload->data();
                    $data['mbr_foto'] = $data_foto['file_name'];
                }
            }
            if (!empty($_POST['mbr_id'])) {
                $foto = $this->db->select('mbr_foto')->where('mbr_id', $_POST['mbr_id'])->get('system_members')->row()->mbr_foto;
                if (!empty($data_foto['file_name'])) {
                    if (!empty($foto)) {
                        unlink($config['upload_path'] . $foto);
                    }
                }
                if (!empty($_POST['mbr_password'])) {
                    $data['mbr_password'] = generatePasswordHash($_POST['mbr_password']);
                }
                // $data['mbr_update_by'] = $_SESSION['user_id'];
                $data['mbr_update_at'] = date('Y-m-d H:i:s');
                $this->db->where('mbr_id', $_POST['mbr_id']);
                $query = $this->db->update('system_members', $data);
            } else {
                $data['mbr_id'] = GENERATOR['system_members'] . "-" . random_string("alnum", 10);
                $data['mbr_password'] = generatePasswordHash($_POST['mbr_password']);
                $query = $this->db->insert('system_members', $data);
            }
            if ($query) {
                echo json_encode(array('status' => 1, 'pesan' => 'Berhasil disimpan !!'));
            } else {
                echo json_encode(array('status' => 0, 'pesan' => 'Gagal disimpan !!'));
            }
        } else {
            $array = array(
                'error'   => true,
                'mbr_name' => form_error('mbr_name'),
                'mbr_email' => form_error('mbr_email'),
                'mbr_username' => form_error('mbr_username'),
                'mbr_password' => form_error('mbr_password'),
                'mbr_cpassword' => form_error('mbr_cpassword'),
                'mbr_foto' => form_error('mbr_foto'),
                'message' => form_error('message')
            );
            echo json_encode(array('status' => 3, 'pesan' => $array));
        }
    }

    private function get_validation()
    {
        $this->load->library('form_validation');

        $config = [
            [
                'field' => 'mbr_name',
                'label' => 'Nama Lengkap',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Lengkap harus diisi',
                ],
            ],
            [
                'field' => 'mbr_email',
                'label' => 'Email',
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'Email harus diisi',
                    'valid_email' => 'Email tidak valid',
                ],
            ],
        ];

        if ($_POST['mbr_id'] == "") {
            array_push(
                $config,
                [
                    'field' => 'mbr_username',
                    'label' => 'Password',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Username harus diisi'
                    ],
                ],
            );
            array_push(
                $config,
                [
                    'field' => 'mbr_password',
                    'label' => 'Password',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Password harus diisi',
                    ],
                ],
            );
            array_push(
                $config,
                [
                    'field' => 'mbr_cpassword',
                    'label' => 'Confirm Password',
                    'rules' => 'required|matches[mbr_cpassword]',
                    'errors' => [
                        'required' => 'Confirm Password harus diisi',
                        'matches' => 'Confirm Password tidak sama'
                    ],
                ],
            );
        } else {
            array_push(
                $config,
                [
                    'field' => 'mbr_username',
                    'label' => 'Username',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Username harus diisi',
                    ],
                ],
            );
        }

        $this->form_validation->set_rules($config);
        return $this->form_validation->run();
    }
}
