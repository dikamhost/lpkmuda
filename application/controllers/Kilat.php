<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kilat extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->model('M_kilat');
      $this->load->helper('tgl_indo');
   }

   public function index()
   {
      $start = $this->uri->segment(3);
      $data['title']       = 'Kilat';
      $data['page']        = 'depan/kilat/index';
      $data['data']        = $this->M_kilat->getKilat($start)['app_kilat'];
      $data['pagination']  = $this->M_kilat->getKilat()['pagination'];
      $this->load->view('depan/template', $data);
   }

   public function lihat($slug = null)
   {
      $data['kilat']    = $this->M_kilat->getKilatLihat($slug);
      $data['title']       = 'Kilat | ' . $data['kilat']['klt_nama'];
      $data['page']        = 'depan/kilat/lihat';
      $this->load->view('depan/template', $data);
   }
}