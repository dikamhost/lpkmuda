<?php
class M_sertifikat extends CI_Model
{
   function __construct()
   {
      parent::__construct();
   }

   private $page = 5;
   function getSertifikat($start = null)
   {
      if ($start) {
         $start = ($start * $this->page) - $this->page;
         $this->db->limit($this->page, $start);
      } else {
         $this->db->limit($this->page);
      }
      $data = $this->sertifikat();
      $this->load->library('pagination');
      $config = $this->getConfig();
      $this->pagination->initialize($config);
      $data['pagination'] = $this->pagination->create_links();
      return $data;
   }

   private function sertifikat()
   {
      $data['app_sertifikat'] = $this->db
         ->where('srt_mbr_id', $_SESSION['system_members']['mbr_id'])
         ->join('app_kejuruan b', 'a.srt_kjr_id=b.kjr_id', 'left')
         ->get('app_sertifikat a')->result_array();
      if ($data['app_sertifikat']) {
         for ($i = 0; $i < count($data['app_sertifikat']); $i++) {
            $data['app_sertifikat'][$i]['jml_modul'] = $this->db
               ->select('count(mtr_id) as jml')
               ->where('mtr_kjr_id', $data['app_sertifikat'][$i]['kjr_id'])
               ->where('mtr_index !=', null)
               ->get('app_materi')->row_array()['jml'];
         }
      }
      return $data;
   }

   private function getConfig()
   {
      $config['full_tag_open'] = '<ul class="pagination justify-content-center">';
      $config['full_tag_close'] = '</ul>';
      $config['num_tag_open'] = '<li class="page-item">';
      $config['num_tag_close'] = '</li>';
      $config['first_link'] = '<<';
      $config['last_link'] = '>>';
      $config['first_tag_open'] = '<li class="page-item">';
      $config['first_tag_close'] = '</li>';
      $config['last_tag_open'] = '<li class="page-item">';
      $config['last_tag_close'] = '</li>';
      $config['prev_tag_open'] = '<li class="page-item">';
      $config['prev_tag_close'] = '</li>';
      $config['next_tag_open'] = '<li class="page-item">';
      $config['next_tag_close'] = '</li>';
      $config['cur_tag_open'] = '<li class="page-item"><a class="page-link active"  href="#">';
      $config['cur_tag_close'] = '</a></li>';
      $config['base_url'] = base_url('member/sertifikat/index/');
      $config['total_rows'] = count($this->sertifikat()['app_sertifikat']);
      $config['per_page'] = $this->page;
      $config['use_page_numbers'] = TRUE;
      return $config;
   }
}
