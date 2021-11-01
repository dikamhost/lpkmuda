<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelas extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->appauth->is_logged_in_member();
      $this->load->model('member/M_kelas', 'm_kelas');
      $_SESSION['member_act'] = 'kelas';
   }

   public function index()
   {
      $data['title'] = 'Kelas';
      $data['memberpage']  = 'member/kelas/index';
      $data['page']  = 'member/template/index';
      $data['kelas']    = $this->m_kelas->getKelas();
      $this->load->view('depan/template', $data);
   }

   public function bayar($kjr_slug)
   {
      $data['title'] = 'Bayar Kelas';
      $data['memberpage']  = 'member/kelas/bayar';
      $data['page']  = 'member/template/index';
      $data['kelas']    = $this->m_kelas->getKelasBayar($kjr_slug);
      $this->load->view('depan/template', $data);
   }
}
