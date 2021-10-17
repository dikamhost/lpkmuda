<?php
class M_beranda extends CI_Model
{
   function __construct()
   {
      parent::__construct();
   }

   public function getSlider()
   {
      $data = $this->db
         ->where('sld_deleted_at', null)
         ->where('sld_locked', 0)
         ->order_by('sld_order', 'asc')
         ->get('app_slider a')->result_array();
      return $data;
   }

   public function getMitra()
   {
      $data = $this->db
         ->where('mtr_deleted_at', null)
         ->where('mtr_locked', 0)
         ->order_by('mtr_order', 'asc')
         ->get('app_mitra a')->result_array();
      return $data;
   }

   public function getPemateri()
   {
      $data = $this->db
         ->where('usr_deleted_at', null)
         ->where('usr_locked', 0)
         ->where('grp_name', 'Pemateri')
         ->join('system_group b', 'a.usr_group=b.grp_id', 'left')
         ->get('system_users a')->result_array();
      return $data;
   }

   public function getTentang()
   {
      $data = $this->db
         ->get('app_tentang')->row_array();
      return $data;
   }
}
