<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tags extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->appauth->is_logged_in();
      $this->load->model("private/app_query", "mod_data");
   }

   public function index()
   {
      $data['title'] = 'Tags';
      $data['page'] = 'admin/tags/index';
      $this->load->view('admin/template', $data);
   }

   public function view_data()
   {
      $set_query["search"]    = ["a.tag_nama"];
      $set_query["table"]     = "blog_tags a";
      $set_query["select"]    = "*";
      $set_query["join"]      = [];
      $set_query["where"]     = ["tag_deleted_at" => null];
      $set_query["order"]     = ["tag_nama" => "ASC"];
      if (isset($_POST["order"])) {
         $set_query["order"]      = [null, null, 'tag_nama'];
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
      if (isset($_POST['tag_id'])) {
         $data = $this->db->get_where('blog_tags', ['tag_id' => $_POST['tag_id']])->row_array();
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
      if (isset($_POST['tag_locked']) && isset($_POST['tag_id'])) {
         if ($_POST['tag_locked'] == 0) {
            $tag_locked = 1;
         } else {
            $tag_locked = 0;
         }
         $this->db->where('tag_id', $_POST['tag_id']);
         $query = $this->db->update('blog_tags', ['tag_locked' => $tag_locked]);
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
      if (isset($_POST['tag_order']) && isset($_POST['tag_id']) && isset($_POST['tag_arrow'])) {
         if ($_POST['tag_arrow'] == 'up') {
            $tag_order = $_POST['tag_order'] - 1;
            if ($tag_order <= 0) {
               die;
            }
         } else {
            $max_order = $this->db->select('max(tag_order) as max_ord')->get('blog_tags')->row_array()['max_ord'];
            if ($_POST['tag_order'] >= $max_order) {
               die;
            }
            $tag_order = $_POST['tag_order'] + 1;
         }
         $this->db->where('tag_order', $tag_order);
         $query = $this->db->update('blog_tags', ['tag_order' => $_POST['tag_order']]);
         if ($query) {
            $this->db->where('tag_id', $_POST['tag_id']);
            $query2 = $this->db->update('blog_tags', ['tag_order' => $tag_order]);
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
      if (isset($_POST['tag_id'])) {
         $this->db->where('tag_id', $_POST['tag_id']);
         $query = $this->db->update('blog_tags', ['tag_deleted_at' => date('Y-m-d H:i:s')]);
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
         $slug = url_title($_POST['tag_nama'], 'dash', true);
         $this->cekSlug($slug);
         $data = array(
            'tag_nama' => $_POST['tag_nama'],
            'tag_slug' => $slug,
            'tag_usr_id' => $_SESSION['system_users']['usr_id'],
         );
         if (!empty($_POST['tag_id'])) {
            $this->db->where('tag_id', $_POST['tag_id']);
            $query = $this->db->update('blog_tags', $data);
         } else {
            $data['tag_id'] = GENERATOR['blog_tags'] . "-" . random_string("alnum", 10);
            $data['tag_locked'] = 0;
            // $data['tag_order'] = $this->db->select('max(tag_order) as tag_order')->get('blog_tags')->row_array()['tag_order'] + 1;
            $query = $this->db->insert('blog_tags', $data);
         }
         if ($query) {
            echo json_encode(array('status' => 1, 'pesan' => 'Berhasil disimpan !!'));
         } else {
            echo json_encode(array('status' => 0, 'pesan' => 'Gagal disimpan !!'));
         }
      } else {
         $array = array(
            'error'   => true,
            'tag_nama' => form_error('tag_nama'),
            'message' => form_error('message')
         );
         echo json_encode(array('status' => 3, 'pesan' => $array));
      }
   }

   private function cekSlug($slug = '')
   {
      $this->db->where('tag_slug', $slug);
      $this->db->where('tag_deleted_at', null);
      if (isset($_POST['tag_id'])) {
         $this->db->where('tag_id !=', $_POST['tag_id']);
      }
      $tag_slug = $this->db->get('blog_tags')->row_array();
      if ($tag_slug) {
         $array = array(
            'error'   => true,
            'tag_nama' => "kategori sudah digunakan"
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
            'field' => 'tag_nama',
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
