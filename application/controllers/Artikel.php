<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Artikel extends CI_Controller
{

   public function __construct()
   {
      parent::__construct();
      $this->load->model('M_artikel');
      function limitWord($string, $word_limit)
      {
         $words = explode(" ", $string);
         return implode(" ", array_splice($words, 0, $word_limit));
      }
   }

   public function index()
   {
      $start = $this->uri->segment(3);
      $data['title']    = 'Artikel';
      $load = cekStart($start);
      if ($load) {
         $data['page']     = 'depan/artikel/index';
         $data['data']        = $this->M_artikel->getArtikel($start);
         $data['pagination']  = $this->M_artikel->getArtikel()['pagination'];
         $data['kategori']    = $this->M_artikel->getKategori();
         $data['tags']    = $this->M_artikel->getTags();
      } else {
         $data['page']        = 'belajar/error/404';
      }
      $this->load->view('depan/template', $data);
   }

   public function kategori($kategori)
   {
      $_POST['ktg_slug'] = $kategori;
      $start = $this->uri->segment(3);
      $data['title']    = 'Artikel';
      $load = cekStart($start);
      if ($load) {
         $data['page']     = 'depan/artikel/index';
         $data['data']        = $this->M_artikel->getArtikel($start);
         $data['pagination']  = $this->M_artikel->getArtikel()['pagination'];
         $data['kategori']    = $this->M_artikel->getKategori();
         $data['tags']    = $this->M_artikel->getTags();
      } else {
         $data['page']        = 'belajar/error/404';
      }
      $this->load->view('depan/template', $data);
   }

   public function tag($tag_slug)
   {
      $_POST['tag_slug'] = $tag_slug;
      $start = $this->uri->segment(3);
      $data['title']    = 'Artikel';
      $load = cekStart($start);
      if ($load) {
         $data['page']     = 'depan/artikel/index';
         $data['data']        = $this->M_artikel->getArtikel($start);
         $data['pagination']  = $this->M_artikel->getArtikel()['pagination'];
         $data['kategori']    = $this->M_artikel->getKategori();
         $data['tags']    = $this->M_artikel->getTags();
      } else {
         $data['page']        = 'belajar/error/404';
      }
      $this->load->view('depan/template', $data);
   }

   public function baca($slug)
   {
      $data['artikel']    = $this->M_artikel->getArtikelBaca($slug);
      if ($data['artikel']) {
         $data['title']       = $data['artikel']['art_judul'];
         $data['kategori']    = $this->M_artikel->getKategori();
         $data['tags']    = $this->M_artikel->getTags();
         $data['page']        = 'depan/artikel/baca';
      } else {
         $data['title']       = '404 Not found !!';
         $data['page']        = 'depan/error/404';
      }
      $this->load->view('depan/template', $data);
   }
}
