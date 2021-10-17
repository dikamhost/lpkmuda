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
      $data['page']        = 'depan/kejuruan/index';
      $data['data']        = $this->M_kejuruan->getKejuruan($start)['app_kejuruan'];
      $data['pagination']  = $this->M_kejuruan->getKejuruan()['pagination'];
      $this->load->view('depan/template', $data);
   }

   public function lihat($slug = null)
   {
      $data['kejuruan']    = $this->M_kejuruan->getKejuruanLihat($slug);
      if ($data['kejuruan']) {
         $data['title']       = 'Kejuruan | ' . $data['kejuruan']['kjr_nama'];
         $data['page']        = 'depan/kejuruan/lihat';
      } else {
         $data['title']       = '404 Not found !!';
         $data['page']        = 'depan/error/404';
      }
      $this->load->view('depan/template', $data);
   }
}
