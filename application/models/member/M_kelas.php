<?php
class M_kelas extends CI_Model
{
   function __construct()
   {
      parent::__construct();
   }

   private $page = 5;
   function getKelas($start = null)
   {
      if ($start) {
         $start = ($start * $this->page) - $this->page;
         $this->db->limit($this->page, $start);
      } else {
         $this->db->limit($this->page);
      }
      $data = $this->kelas();
      $this->load->library('pagination');
      $config = $this->getConfig();
      $this->pagination->initialize($config);
      $data['pagination'] = $this->pagination->create_links();
      return $data;
   }

   private function kelas()
   {
      $data['app_kelas'] = $this->db
         ->order_by('a.kls_created_at', 'desc')
         ->where('a.kls_mbr_id', $_SESSION['system_members']['mbr_id'])
         ->join('app_kejuruan c', 'a.kls_kjr_id=c.kjr_id')
         ->join('system_members b', 'a.kls_mbr_id=b.mbr_id')
         ->get('app_kelas a')->result_array();
      if ($data['app_kelas']) {
         for ($i = 0; $i < count($data['app_kelas']); $i++) {
            $data['app_kelas'][$i]['wes_modul'] = $this->db
               ->select('count(mdl_id) as jml')
               ->where('mtr_kjr_id', $data['app_kelas'][$i]['kjr_id'])
               ->where('mtr_index !=', null)
               ->where('mdl_mbr_id', $_SESSION['system_members']['mbr_id'])
               ->join('app_materi b', 'a.mdl_mtr_id=b.mtr_id', 'left')
               ->get('app_modul a')->row_array()['jml'];
            $data['app_kelas'][$i]['jml_modul'] = $this->db
               ->select('count(mtr_id) as jml')
               ->where('mtr_kjr_id', $data['app_kelas'][$i]['kjr_id'])
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
      $config['base_url'] = base_url('member/kelas/index/');
      $config['total_rows'] = count($this->kelas()['app_kelas']);
      $config['per_page'] = $this->page;
      $config['use_page_numbers'] = TRUE;
      return $config;
   }

   public function getKejuruanBayar($slug)
   {
      $data = null;
      $kejuruan = $this->db
         ->where('kjr_slug', $slug)
         ->get('app_kejuruan')->row_array();
      if ($kejuruan) {
         $data = $this->getKelasBayar($kejuruan['kjr_id']);
      }
      return $data;
   }

   public function getKelasBayar($kjr_id)
   {
      $kls_mbr_id = $_SESSION['system_members']['mbr_id'];
      $data = $this->db
         ->where('kls_kjr_id', $kjr_id)
         ->where('kls_mbr_id', $kls_mbr_id)
         ->join('app_transfer d', 'a.kls_trf_id=d.trf_id', 'left')
         ->join('system_members c', 'a.kls_mbr_id=c.mbr_id', 'left')
         ->join('app_kejuruan b', 'a.kls_kjr_id=b.kjr_id', 'left')
         ->get('app_kelas a')->row_array();
      return $data;
   }
}
