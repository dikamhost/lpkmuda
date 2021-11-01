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
         ->join('app_kejuruan c', 'a.kls_kjr_id=c.kjr_id')
         ->join('system_members b', 'a.kls_mbr_id=b.mbr_id')
         ->get('app_kelas a')->result_array();
      if ($data) {
         for ($i = 0; $i < count($data); $i++) {
            $data[$i]['wes_modul'] = $this->db
               ->select('count(mdl_id) as jml')
               ->where('mtr_kjr_id', $data[$i]['kjr_id'])
               ->where('mtr_index !=', null)
               ->where('mdl_mbr_id', $_SESSION['system_members']['mbr_id'])
               ->join('app_materi b', 'a.mdl_mtr_id=b.mtr_id', 'left')
               ->get('app_modul a')->row_array()['jml'];
            $data[$i]['jml_modul'] = $this->db
               ->select('count(mtr_id) as jml')
               ->where('mtr_kjr_id', $data[$i]['kjr_id'])
               ->where('mtr_index !=', null)
               ->get('app_materi')->row_array()['jml'];
         }
      }
      return $data;
   }

   public function getKelasBayar($slug)
   {
      $data = $this->db
         ->where('kjr_slug', $slug)
         ->get('app_kejuruan')->row_array();
      return $data;
   }
}
