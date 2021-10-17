<?php
class M_kejuruan extends CI_Model
{
   function __construct()
   {
      parent::__construct();
   }

   function getKejuruan($start = null)
   {
      if ($start) {
         $start = ($start * 8) - 8;
         $this->db->limit(8, $start);
      } else {
         $this->db->limit(8);
      }
      $data = $this->kejuruan();
      $this->load->library('pagination');
      $config = $this->getConfig($data);
      $this->pagination->initialize($config);
      $data['pagination'] = $this->pagination->create_links();
      return $data;
   }

   private function kejuruan()
   {
      if (isset($_POST['usr_id'])) {
         $this->db->where('b.usr_id', $_POST['usr_id']);
      }
      if (isset($_GET['cari'])) {
         $this->db->like('kjr_nama', $_GET['cari']);
      }
      $data['app_kejuruan'] = $this->db
         ->where('kjr_deleted_at', null)
         ->order_by('kjr_created_at', 'desc')
         ->join('system_users b', 'a.kjr_created_by=b.usr_id')
         ->get('app_kejuruan a')->result_array();
      return $data;
   }

   private function getConfig()
   {
      $config['full_tag_open'] = '<ul class="pagination justify-content-center">';
      $config['full_tag_close'] = '</ul>';
      $config['num_tag_open'] = '<li class="page-item">';
      $config['num_tag_close'] = '</li>';
      $config['last_tag_open'] = '<li class="page-item">';
      $config['last_tag_close'] = '</li>';
      $config['prev_tag_open'] = '<li class="page-item">';
      $config['prev_tag_close'] = '</li>';
      $config['next_tag_open'] = '<li class="page-item">';
      $config['next_tag_close'] = '</li>';
      $config['cur_tag_open'] = '<li class="page-item"><a class="page-link active"  href="#">';
      $config['cur_tag_close'] = '</a></li>';
      $config['base_url'] = base_url('kejuruan/index/');
      $config['total_rows'] = count($this->kejuruan()['app_kejuruan']);
      $config['per_page'] = 8;
      $config['use_page_numbers'] = TRUE;
      return $config;
   }

   function getKejuruanLihat($slug = null)
   {
      $data = $this->db
         ->where('kjr_slug', $slug)
         ->where('kjr_deleted_at', null)
         ->order_by('kjr_created_at', 'desc')
         ->join('system_users b', 'a.kjr_pemateri=b.usr_id')
         ->get('app_kejuruan a')->row_array();
      if ($data) {
         $this->db
            ->where('kjr_slug', $slug)
            ->update('app_kejuruan', ['kjr_hit' => $data['kjr_hit'] + 1]);
      }
      return $data;
   }

   function getkategori($ktg_slug = null)
   {
      $data = $this->db->where('ktg_slug', $ktg_slug)
         ->get('kategori')->row_array();
      return $data;
   }

   function getTag($tag_slug = null)
   {
      $data = $this->db->where('tag_slug', $tag_slug)
         ->get('tags')->row_array();
      return $data;
   }
}
