<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->appauth->is_logged_in();
        $this->load->model("private/app_query", "mod_data");
    }

    public function index()
    {
        $data['title'] = 'Kategori';
        $data['page'] = 'admin/kategori/index';
        $this->load->view('admin/template', $data);
    }

    public function view_data()
    {
        $set_query["search"]    = ["a.ktg_nama"];
        $set_query["table"]     = "blog_kategori a";
        $set_query["select"]    = "*";
        $set_query["join"]      = [];
        $set_query["where"]     = ["ktg_deleted_at" => null];
        $set_query["order"]     = ["ktg_nama" => "ASC"];
        if (isset($_POST["order"])) {
            $set_query["order"]      = [null, null, 'ktg_nama'];
        }
        $query      = $this->mod_data->getData_table($set_query)->result_array();
        $output      = [];
        $count_data   = 0;
        if ($query) {
            $output = $query;
            $count_data   = $this->mod_data->getData_count($set_query);
        }
        $return["draw"]            = $_POST["draw"];
        $return["recordsTotal"]      = count($output);
        $return["recordsFiltered"]   = $count_data;
        $return["data"]            = $output;
        echo json_encode($return, true);
    }

    public function getByID()
    {
        if (isset($_POST['ktg_id'])) {
            $data = $this->db->get_where('blog_kategori', ['ktg_id' => $_POST['ktg_id']])->row_array();
            if ($data) {
                echo json_encode(['status' => 1, 'pesan' => 'Berhasil ambil data', 'data' => $data]);
            } else {
                echo json_encode(['status' => 0, 'pesan' => 'Gagal ambil data']);
            }
        } else {
            echo json_encode(['status' => 0, 'pesan' => 'Gagal ambil data']);
        }
    }

    public function lock()
    {
        if (isset($_POST['ktg_locked']) && isset($_POST['ktg_id'])) {
            if ($_POST['ktg_locked'] == 0) {
                $ktg_locked = 1;
            } else {
                $ktg_locked = 0;
            }
            $this->db->where('ktg_id', $_POST['ktg_id']);
            $query = $this->db->update('blog_kategori', ['ktg_locked' => $ktg_locked]);
            if ($query) {
                echo json_encode(['status' => 1]);
            } else {
                echo json_encode(['status' => 0, 'pesan' => 'Gagal simpan data']);
            }
        } else {
            echo json_encode(['status' => 0, 'pesan' => 'Gagal simpan data']);
        }
    }

    public function order()
    {
        if (isset($_POST['ktg_order']) && isset($_POST['ktg_id']) && isset($_POST['ktg_arrow'])) {
            if ($_POST['ktg_arrow'] == 'up') {
                $ktg_order = $_POST['ktg_order'] - 1;
                if ($ktg_order <= 0) {
                    die;
                }
            } else {
                $max_order = $this->db->select('max(ktg_order) as max_ord')->get('blog_kategori')->row_array()['max_ord'];
                if ($_POST['ktg_order'] >= $max_order) {
                    die;
                }
                $ktg_order = $_POST['ktg_order'] + 1;
            }
            $this->db->where('ktg_order', $ktg_order);
            $query = $this->db->update('blog_kategori', ['ktg_order' => $_POST['ktg_order']]);
            if ($query) {
                $this->db->where('ktg_id', $_POST['ktg_id']);
                $query2 = $this->db->update('blog_kategori', ['ktg_order' => $ktg_order]);
                if ($query2) {
                    echo json_encode(['status' => 1]);
                } else {
                    echo json_encode(['status' => 0, 'pesan' => 'Gagal simpan, gagal update order 2']);
                }
            } else {
                echo json_encode(['status' => 0, 'pesan' => 'Gagal simpan, gagal update order']);
            }
        } else {
            echo json_encode(['status' => 0, 'pesan' => 'Gagal simpan, data kosong']);
        }
    }
    public function destroy()
    {
        if (isset($_POST['ktg_id'])) {
            $this->db->where('ktg_id', $_POST['ktg_id']);
            $query = $this->db->update('blog_kategori', ['ktg_deleted_at' => date('Y-m-d H:i:s')]);
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
            $slug = url_title($_POST['ktg_nama'], 'dash', true);
            $this->cekSlug($slug);
            $data = array(
                'ktg_nama' => $_POST['ktg_nama'],
                'ktg_slug' => $slug,
                'ktg_usr_id' => $_SESSION['system_users']['usr_id'],
            );
            if (!empty($_POST['ktg_id'])) {
                $this->db->where('ktg_id', $_POST['ktg_id']);
                $query = $this->db->update('blog_kategori', $data);
            } else {
                $data['ktg_id'] = GENERATOR['blog_kategori'] . "-" . random_string("alnum", 10);
                $data['ktg_locked'] = 0;
                // $data['ktg_order'] = $this->db->select('max(ktg_order) as ktg_order')->get('blog_kategori')->row_array()['ktg_order'] + 1;
                $query = $this->db->insert('blog_kategori', $data);
            }
            if ($query) {
                echo json_encode(array('status' => 1, 'pesan' => 'Berhasil disimpan !!'));
            } else {
                echo json_encode(array('status' => 0, 'pesan' => 'Gagal disimpan !!'));
            }
        } else {
            $array = array(
                'error'   => true,
                'ktg_nama' => form_error('ktg_nama'),
                'message' => form_error('message')
            );
            echo json_encode(array('status' => 3, 'pesan' => $array));
        }
    }

    private function cekSlug($slug = '')
    {
        $this->db->where('ktg_slug', $slug);
        $this->db->where('ktg_deleted_at', null);
        if (isset($_POST['ktg_id'])) {
            $this->db->where('ktg_id !=', $_POST['ktg_id']);
        }
        $ktg_slug = $this->db->get('blog_kategori')->row_array();
        if ($ktg_slug) {
            $array = array(
                'error'   => true,
                'ktg_nama' => "kategori sudah digunakan"
            );
            echo json_encode(array('status' => 3, 'pesan' => $array));
            die;
        }
    }

    private function get_validation()
    {
        $this->load->library('form_validation');
        $config = [
            [
                'field' => 'ktg_nama',
                'label' => 'Nama Kategori',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama kategori harus diisi',
                ],
            ],
        ];
        $this->form_validation->set_rules($config);
        return $this->form_validation->run();
    }
}
