<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Members extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->appauth->is_logged_in();
        $this->load->model("private/app_query", "mod_data");
    }

    public function index()
    {
        $data['title'] = 'Members';
        $data['page'] = 'admin/members/index';
        $this->load->view('admin/template', $data);
    }

    public function view_data()
    {
        $set_query["search"]    = ['mbr_name', 'mbr_email', 'mbr_username'];
        $set_query["table"]     = "system_members";
        $set_query["select"]    = "*";
        $set_query["join"]      = [];
        $set_query["where"]     = ["mbr_deleted_at" => null];
        $set_query["order"]     = ["mbr_name" => "asc"];
        if (isset($_POST["order"])) {
            $set_query["order"]      = [null, null, null, 'mbr_name', null, null];
        }
        $query      = $this->mod_data->getData_table($set_query)->result_array();
        $output      = [];
        $count_data   = 0;
        if ($query) {
            $output = $query;
            $count_data   = $this->mod_data->getData_count($set_query);
        }
        $return["draw"]            = $_POST["draw"];
        $return["recordsTotal"]      = count($output);
        $return["recordsFiltered"]   = $count_data;
        $return["data"]            = $output;
        echo json_encode($return, true);
    }

    public function lock()
    {
        if (isset($_POST['mbr_locked']) && isset($_POST['mbr_id'])) {
            if ($_POST['mbr_locked'] == 0) {
                $mbr_locked = 1;
            } else {
                $mbr_locked = 0;
            }
            $this->db->where('mbr_id', $_POST['mbr_id']);
            $query = $this->db->update('system_members', ['mbr_locked' => $mbr_locked]);
            if ($query) {
                echo json_encode(['status' => 1]);
            } else {
                echo json_encode(['status' => 0, 'pesan' => 'Gagal simpan data']);
            }
        } else {
            echo json_encode(['status' => 0, 'pesan' => 'Gagal simpan data']);
        }
    }
}
