<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transfer extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->appauth->is_logged_in();
      $this->load->model("private/app_query", "mod_data");
   }

   public function index()
   {
      $data['title'] = 'Metode Pembayaran';
      $data['page'] = 'admin/transfer/index';
      $this->load->view('admin/template', $data);
   }

   public function view_data()
   {
      $set_query["search"]    = ["trf_nama", "trf_value", "trf_an"];
      $set_query["table"]     = "app_transfer";
      $set_query["select"]    = "*";
      $set_query["join"]      = [];
      $set_query["where"]     = ["trf_deleted_at" => null];
      $set_query["order"]     = ["trf_nama" => "asc"];
      if (isset($_POST["order"])) {
         $set_query["order"]      = [null, null, 'trf_nama', null, null];
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

   public function lock()
   {
      if (isset($_POST['trf_locked']) && isset($_POST['trf_id'])) {
         if ($_POST['trf_locked'] == 0) {
            $trf_locked = 1;
         } else {
            $trf_locked = 0;
         }
         $this->db->where('trf_id', $_POST['trf_id']);
         $query = $this->db->update('app_transfer', ['trf_locked' => $trf_locked]);
         if ($query) {
            echo json_encode(['status' => 1]);
         } else {
            echo json_encode(['status' => 0, 'pesan' => 'Gagal simpan data']);
         }
      } else {
         echo json_encode(['status' => 0, 'pesan' => 'Gagal simpan data']);
      }
   }

   public function store()
   {
      if ($this->get_validation()) {
         $data = array(
            'trf_nama' => $_POST['trf_nama'],
            'trf_value' => $_POST['trf_value'],
            'trf_an' => $_POST['trf_an'],
         );
         if (!empty($_POST['trf_id'])) {
            $this->db->where('trf_id', $_POST['trf_id']);
            $query = $this->db->update('app_transfer', $data);
         } else {
            $data['trf_id'] = GENERATOR['app_transfer'] . "-" . random_string("alnum", 10);
            $data['trf_created_by'] = $_SESSION['system_users']['usr_id'];
            $query = $this->db->insert('app_transfer', $data);
         }
         if ($query) {
            echo json_encode(array('status' => 1, 'pesan' => 'Berhasil disimpan !!'));
         } else {
            echo json_encode(array('status' => 0, 'pesan' => 'Gagal disimpan !!'));
         }
      } else {
         $array = array(
            'error'   => true,
            'trf_nama' => form_error('trf_nama'),
            'trf_value' => form_error('trf_value'),
            'trf_an' => form_error('trf_an'),
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
            'field' => 'trf_nama',
            'label' => 'Nama Pembayaran',
            'rules' => 'required',
            'errors' => [
               'required' => 'Nama pembayaran harus diisi',
            ],
         ],
         [
            'field' => 'trf_value',
            'label' => 'Nomor Pembayaran',
            'rules' => 'required',
            'errors' => [
               'required' => 'Nomor pembayaran harus diisi',
            ],
         ],
         [
            'field' => 'trf_an',
            'label' => 'Atas nama',
            'rules' => 'required',
            'errors' => [
               'required' => 'Atas nama harus diisi',
            ],
         ],
      ];
      $this->form_validation->set_rules($config);
      return $this->form_validation->run();
   }

   public function getByID()
   {
      if (isset($_POST['trf_id'])) {
         $data = $this->db->get_where('app_transfer', ['trf_id' => $_POST['trf_id']])->row_array();
         if ($data) {
            echo json_encode(['status' => 1, 'pesan' => 'Berhasil ambil data', 'data' => $data]);
         } else {
            echo json_encode(['status' => 0, 'pesan' => 'Gagal ambil data']);
         }
      } else {
         echo json_encode(['status' => 0, 'pesan' => 'Gagal ambil data']);
      }
   }

   public function destroy()
   {
      if (isset($_POST['trf_id'])) {
         $this->db->where('trf_id', $_POST['trf_id']);
         $query = $this->db->update('app_transfer', ['trf_deleted_at' => date('Y-m-d H:i:s')]);
         if ($query) {
            echo json_encode(['status' => 1]);
         } else {
            echo json_encode(['status' => 0, 'pesan' => 'Gagal hapus data']);
         }
      } else {
         echo json_encode(['status' => 0, 'pesan' => 'Gagal hapus data']);
      }
   }
}
