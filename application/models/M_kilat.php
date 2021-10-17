<?php
class M_kilat extends CI_Model
{
   function __construct()
   {
      parent::__construct();
   }

   function getKilat($start = null)
   {
      if ($start) {
         $start = ($start * 8) - 8;
         $this->db->limit(8, $start);
      } else {
         $this->db->limit(8);
      }
      $data = $this->kilat();
      $this->load->library('pagination');
      $config = $this->getConfig($data);
      $this->pagination->initialize($config);
      $data['pagination'] = $this->pagination->create_links();
      return $data;
   }

   private function kilat()
   {
      if (isset($_POST['usr_id'])) {
         $this->db->where('b.usr_id', $_POST['usr_id']);
      }
      if (isset($_GET['key'])) {
         $this->db->like('klt_nama', $_GET['key']);
      }
      $data['app_kilat'] = $this->db
         ->where('klt_deleted_at', null)
         ->where('klt_locked', 0)
         ->order_by('klt_created_at', 'desc')
         ->join('system_users b', 'a.klt_pemateri=b.usr_id')
         ->get('app_kilat a')->result_array();
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
      $config['base_url'] = base_url('kilat/index/');
      $config['total_rows'] = count($this->kilat()['app_kilat']);
      $config['per_page'] = 8;
      $config['use_page_numbers'] = TRUE;
      return $config;
   }

   function getkilatLihat($slug = null)
   {
      $data = $this->db
         ->where('klt_slug', $slug)
         ->where('klt_deleted_at', null)
         ->where('klt_locked', 0)
         ->order_by('klt_created_at', 'desc')
         ->join('system_users b', 'a.klt_pemateri=b.usr_id')
         ->get('app_kilat a')->row_array();
      if ($data) {
         $this->db
            ->where('klt_slug', $slug)
            ->update('app_kilat', ['klt_hit' => $data['klt_hit'] + 1]);
      }
      return $data;
   }
}
