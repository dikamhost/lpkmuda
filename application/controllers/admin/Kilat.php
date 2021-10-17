<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kilat extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->appauth->is_logged_in();
      $this->load->model('M_Datatables');
   }

   public function index()
   {
      $data['title'] = 'Kilat';
      $data['page'] = 'admin/kilat/index';
      $this->load->view('admin/template', $data);
   }

   public function view_data()
   {
      $tables = "app_kilat";
      $search = array('klt_nama', 'klt_harga');
      $isWhere = 'klt_deleted_at IS NULL';
      header('Content-Type: application/json');
      $data = $this->M_Datatables->get_tables($tables, $search, $isWhere);
      header('Content-Type: application/json');
      echo $data;
   }

   function getPemateri()
   {
      $data = $this->db
         ->where('usr_deleted_at', null)
         ->where('grp_name', 'Pemateri')
         ->order_by('usr_name', 'asc')
         ->join('system_group b', 'a.usr_group=b.grp_id')
         ->get('system_users a')->result_array();
      if ($data) {
         echo json_encode(array('status' => 1, 'pesan' => 'Berhasil ambil data !!', 'data' => $data));
      } else {
         echo json_encode(array('status' => 0, 'pesan' => 'Gagal ambil data !!'));
      }
   }

   public function getByID()
   {
      if (isset($_POST['klt_id'])) {
         $data = $this->db->get_where('app_kilat', ['klt_id' => $_POST['klt_id']])->row_array();
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
      if (isset($_POST['klt_locked']) && isset($_POST['klt_id'])) {
         if ($_POST['klt_locked'] == 0) {
            $klt_locked = 1;
         } else {
            $klt_locked = 0;
         }
         $this->db->where('klt_id', $_POST['klt_id']);
         $query = $this->db->update('app_kilat', ['klt_locked' => $klt_locked]);
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
      if (isset($_POST['klt_id'])) {
         $this->db->where('klt_id', $_POST['klt_id']);
         $query = $this->db->update('app_kilat', ['klt_deleted_at' => date('Y-m-d H:i:s')]);
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
         $slug = url_title($_POST['klt_nama'], 'dash', true);
         $this->cekSlug($slug);
         $data = array(
            'klt_nama'           => $_POST['klt_nama'],
            'klt_harga'          => $_POST['klt_harga'],
            'klt_slug'           => $slug,
            'klt_deskripsi'      => $_POST['klt_deskripsi'],
            'klt_pemateri'       => $_POST['klt_pemateri'],
            'klt_created_by'     => $_SESSION['system_users']['usr_id'],
         );
         if (!empty($_FILES['klt_image']['name'])) {
            $config['upload_path']          = './storage/kilat/';
            $config['allowed_types']        = 'jpg|png|jpeg|JPG|PNG|JPEG';
            $config['max_size']             = 2048;
            $config['remove_spaces']        = TRUE;
            $config['file_name']            = url_title($_POST['klt_nama'], 'dash', true) . "-" . date("Y_m_d His");
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('klt_image')) {
               die;
               echo json_encode(array('status' => 2, 'pesan' => "<b>Gagal upload gambar</b> <br>" . $this->upload->display_errors()));
               die;
            } else {
               $data_foto = $this->upload->data();
               $data['klt_image'] = $data_foto['file_name'];
            }
         } else {
            if (empty($_POST['klt_id'])) {
               $array = array(
                  'error'   => true,
                  'klt_nama' => form_error('klt_nama'),
                  'klt_image' => 'Gambar harus diisi',
                  'message' => form_error('message')
               );
               echo json_encode(array('status' => 3, 'pesan' => $array));
               die;
            }
         }
         if (!empty($_POST['klt_id'])) {
            $foto = $this->db->select('klt_image')->where('klt_id', $_POST['klt_id'])->get('app_kilat')->row()->klt_image;
            if (!empty($data_foto['file_name'])) {
               if (!empty($foto)) {
                  unlink($config['upload_path'] . $foto);
               }
            }
            $this->db->where('klt_id', $_POST['klt_id']);
            $query = $this->db->update('app_kilat', $data);
         } else {
            $data['klt_id'] = GENERATOR['app_kilat'] . "-" . random_string("alnum", 10);
            $data['klt_created_at'] = date('Y-m-d H:i:s');
            $data['klt_locked'] = 0;
            $query = $this->db->insert('app_kilat', $data);
         }
         if ($query) {
            echo json_encode(array('status' => 1, 'pesan' => 'Berhasil disimpan !!'));
         } else {
            echo json_encode(array('status' => 0, 'pesan' => 'Gagal disimpan !!'));
         }
      } else {
         $array = array(
            'error'   => true,
            'klt_nama' => form_error('klt_nama'),
            'klt_harga' => form_error('klt_harga'),
            'klt_deskripsi' => form_error('klt_deskripsi'),
            'klt_pemateri' => form_error('klt_pemateri'),
            'klt_image' => '',
            'message' => form_error('message')
         );
         echo json_encode(array('status' => 3, 'pesan' => $array));
      }
   }

   private function cekSlug($slug = '')
   {
      $this->db->where('klt_slug', $slug);
      $this->db->where('klt_deleted_at', null);
      if (isset($_POST['klt_id'])) {
         $this->db->where('klt_id !=', $_POST['klt_id']);
      }
      $klt_slug = $this->db->get('app_kilat')->row_array();
      if ($klt_slug) {
         $array = array(
            'error'   => true,
            'klt_nama' => "Nama kejuruan sudah digunakan"
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
            'field' => 'klt_nama',
            'label' => 'Nama Kejuruan',
            'rules' => 'required',
            'errors' => [
               'required' => 'Nama Kejuruan harus diisi',
            ],
         ],
         [
            'field' => 'klt_harga',
            'label' => 'Harga',
            'rules' => 'required|numeric',
            'errors' => [
               'required' => 'Harga harus diisi',
               'numeric' => 'Harga harus berupa angka',
            ],
         ],
         [
            'field' => 'klt_deskripsi',
            'label' => 'Deskripsi',
            'rules' => 'required',
            'errors' => [
               'required' => 'Deskripsi harus diisi',
            ],
         ],
         [
            'field' => 'klt_pemateri',
            'label' => 'Pemateri',
            'rules' => 'required',
            'errors' => [
               'required' => 'Pemateri harus diisi',
            ],
         ],
      ];
      $this->form_validation->set_rules($config);
      return $this->form_validation->run();
   }
}
