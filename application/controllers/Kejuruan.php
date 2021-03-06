<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kejuruan extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->model('M_kejuruan');
      $this->load->helper('tgl_indo');
   }

   public function index()
   {
      $start = $this->uri->segment(3);
      $data['title']       = 'Kejuruan';
      $load = cekStart($start);
      if ($load) {
         $data['page']        = 'depan/kejuruan/index';
         $data['data']        = $this->M_kejuruan->getKejuruan($start)['app_kejuruan'];
         $data['pagination']  = $this->M_kejuruan->getKejuruan()['pagination'];
      } else {
         $data['page']        = 'belajar/error/404';
      }
      $this->load->view('depan/template', $data);
   }

   public function lihat($slug = null)
   {
      $data['kelas']       = false;
      $data['kejuruan']    = $this->M_kejuruan->getKejuruanLihat($slug);
      if ($data['kejuruan']) {
         if (isset($_SESSION['system_members']['mbr_id'])) {
            $app_kelas_wr = [
               'kls_mbr_id'   => $_SESSION['system_members']['mbr_id'],
               'kls_kjr_id'   => $data['kejuruan']['kjr_id'],
               'kls_locked'   => 0,
               'kls_trf_id !='   => null,
               'kls_lunas !=' => null
            ];
            $data['kelas'] = $this->db->get_where('app_kelas', $app_kelas_wr)->row_array();
         }
         $data['title']       = 'Kejuruan | ' . $data['kejuruan']['kjr_nama'];
         $data['page']        = 'depan/kejuruan/lihat';
      } else {
         $data['title']       = '404 Not found !!';
         $data['page']        = 'depan/error/404';
      }
      $this->load->view('depan/template', $data);
   }

   public function gabungKelas()
   {
      if (isset($_POST['mbr_id']) && isset($_POST['kjr_id'])) {
         $kelas = $this->db
            ->where('kls_mbr_id', $_POST['mbr_id'])
            ->where('kls_kjr_id', $_POST['kjr_id'])
            ->get('app_kelas')->row_array();
         if (!$kelas) {
            $data = array(
               'kls_mbr_id' => $_POST['mbr_id'],
               'kls_kjr_id' => $_POST['kjr_id'],
               'kls_locked' => 1,
            );
            $data['kls_id'] = GENERATOR['app_kelas'] . "-" . random_string("alnum", 10);
            $query = $this->db->insert('app_kelas', $data);
            if ($query) {
               echo json_encode(array('status' => 1, 'pesan' => 'Berhasil bergabung !!'));
            } else {
               echo json_encode(array('status' => 0, 'pesan' => 'Gagal bergabung !!'));
            }
         } else {
            echo json_encode(array('status' => 4, 'pesan' => 'Gagal !!<br>Anda sudah bergabung'));
         }
      } else {
         echo json_encode(array('status' => 0, 'pesan' => 'Gagal !!<br>ID tidak terdata'));
      }
   }
}
