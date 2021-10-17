<?php

if (!function_exists("getMenu")) {
   function getMenu()
   {
      $ci = get_instance();

      $uri = $ci->uri->uri_string();
      $menu_where   = ["mnu_index" => null, "acs_group" => $_SESSION['system_users']['usr_group'], "mnu_deleted_at" => null];
      $menu = $ci->db
         ->join("system_menu", "system_menu.mnu_id = system_access.acs_menu", "left")
         ->order_by('mnu_order', 'asc')
         ->where('mnu_index', null)
         ->get_where('system_access', $menu_where)->result_array();
      foreach ($menu as $i => $v) {
         $menu[$i]['active'] = '';

         $submenu_where = ["acs_group" => $_SESSION['system_users']['usr_group'], "mnu_index" => $menu[$i]["mnu_id"], "mnu_deleted_at" => null];
         $submenu = $ci->db
            ->join("system_menu", "system_menu.mnu_id=system_access.acs_menu", "left")
            ->order_by('mnu_order', 'asc')
            ->get_where('system_access', $submenu_where)->result_array();
         $menu[$i]['submenu'] = $submenu;
         foreach ($submenu as $smi => $smv) {
            $menu[$i]['submenu'][$smi]['active'] = '';
            if ($smv['mnu_link'] == $uri) {
               $menu[$i]['active'] = 'active';
               $menu[$i]['submenu'][$smi]['active'] = 'active';
            }
         }
      }
      return $menu;
   }
}
