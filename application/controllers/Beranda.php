<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
{

   public function __construct()
   {
      parent::__construct();
      $this->load->model('M_beranda');
      $this->load->model('M_kejuruan');
   }

   public function index()
   {
      $data['title']    = 'Kursus Berkualitas';
      $data['page']     = 'depan/beranda/index';
      $data['slider']   = $this->M_beranda->getSlider();
      $data['mitra']    = $this->M_beranda->getMitra();
      $data['pemateri']    = $this->M_beranda->getPemateri();
      $data['tentang']    = $this->M_beranda->getTentang();
      $data['kejuruan'] = $this->M_kejuruan->getKejuruan()['app_kejuruan'];
      $this->load->view('depan/template', $data);
   }
}
