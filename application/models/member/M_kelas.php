<?php
class M_kelas extends CI_Model
{
   function __construct()
   {
      parent::__construct();
   }

   public function getKelas()
   {
      $data = $this->db
         ->order_by('a.kls_created_at', 'desc')
         ->where('a.kls_mbr_id', $_SESSION['system_members']['mbr_id'])
         // ->where('kls_locked', 0)
         ->join('app_kejuruan c', 'a.kls_kjr_id=c.kjr_id')
         ->join('system_members b', 'a.kls_mbr_id=b.mbr_id')
         ->get('app_kelas a')->result_array();
      return $data;
   }
}
