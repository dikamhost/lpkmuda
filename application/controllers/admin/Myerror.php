<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Myerror extends CI_Controller
{
    public function e403()
    {
        $data['title'] = '403 Access Forbidden';
        $data['page'] = 'admin/myerror/403';
        $this->load->view('admin/myerror/template', $data);
    }
}
