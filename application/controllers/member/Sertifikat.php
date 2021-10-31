<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sertifikat extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->appauth->is_logged_in_member();
      $_SESSION['member_act'] = 'sertifikat';
   }

   public function index()
   {
      $data['title'] = 'Sertifikat';
      $data['memberpage']  = 'member/sertifikat/index';
      $data['page']  = 'member/template/index';
      $this->load->view('depan/template', $data);
   }

   public function cetak()
   {
      $img = imagecreatefromjpeg('assets/sertifikat/kosong.jpg');

      $txt = "Hello World";
      $fontFile = "C:\Windows\Fonts\arial.ttf"; // CHANGE TO YOUR OWN!
      $fontSize = 24;
      $fontColor = imagecolorallocate($img, 0, 0, 0);
      $posX = 5;
      $posY = 24;
      $angle = 0;
      imagettftext($img, $fontSize, $angle, $posX, $posY, $fontColor, $fontFile, $txt);

      // (C) OUTPUT IMAGE
      // (C1) DIRECTLY SHOW IMAGE
      header("Content-type: image/jpeg");
      imagejpeg($img);
      imagedestroy($img);

      // (C2) OR SAVE TO A FILE
      // $quality = 100; // 0 to 100
      // imagejpeg($img, "demo.jpg", $quality);
   }
}
