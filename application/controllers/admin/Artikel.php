<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Artikel extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->appauth->is_logged_in();
        $this->load->model("private/app_query", "mod_data");
    }

    public function index()
    {
        $data['title'] = 'Artikel';
        $data['page'] = 'admin/artikel/index';
        $this->load->view('admin/template', $data);
    }

    public function view_data()
    {
        $set_query["search"]    = ["a.art_judul"];
        $set_query["table"]     = "blog_artikel a";
        $set_query["select"]    = "*";
        $set_query["join"]      = [
            [
                "join"    => "blog_kategori b",
                "on"    => "b.ktg_id = a.art_ktg_id",
                "type"    => "left"
            ],
        ];
        $set_query["where"]     = ["art_deleted_at" => null];
        $set_query["order"]     = ["art_tgl_upload" => "DESC"];
        if (isset($_POST["order"])) {
            $set_query["order"]      = [null, null, null, 'art_judul', null, null];
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
        if (isset($_POST['art_locked']) && isset($_POST['art_id'])) {
            if ($_POST['art_locked'] == 0) {
                $art_locked = 1;
            } else {
                $art_locked = 0;
            }
            $this->db->where('art_id', $_POST['art_id']);
            $query = $this->db->update('blog_artikel', ['art_locked' => $art_locked]);
            if ($query) {
                echo json_encode(['status' => 1]);
            } else {
                echo json_encode(['status' => 0, 'pesan' => 'Gagal simpan data']);
            }
        } else {
            echo json_encode(['status' => 0, 'pesan' => 'Gagal simpan data']);
        }
    }

    public function headline()
    {
        if (isset($_POST['art_headline']) && isset($_POST['art_id'])) {
            if ($_POST['art_headline'] == 0) {
                $art_headline = 1;
                $this->db->where('art_id !=', $_POST['art_id']);
                $this->db->update('blog_artikel', ['art_headline' => 0]);
            } else {
                $art_headline = 0;
            }
            $this->db->where('art_id', $_POST['art_id']);
            $query = $this->db->update('blog_artikel', ['art_headline' => $art_headline]);
            if ($query) {
                echo json_encode(['status' => 1]);
            } else {
                echo json_encode(['status' => 0, 'pesan' => 'Gagal simpan data']);
            }
        } else {
            echo json_encode(['status' => 0, 'pesan' => 'Gagal simpan data']);
        }
    }

    public function store()
    {
        if ($this->get_validation()) {
            $slug = url_title($_POST['art_judul'], 'dash', true);
            $this->cekSlug($slug);
            $data = array(
                'art_judul' => $_POST['art_judul'],
                'art_slug' => $slug,
                'art_isi' => $_POST['art_isi'],
                'art_ktg_id' => $_POST['art_ktg_id'],
            );
            if (!empty($_FILES['art_gambar']['name'])) {
                $config['upload_path']          = './storage/artikel/';
                $config['allowed_types']        = 'jpg|png|jpeg|JPG|PNG|JPEG';
                $config['max_size']             = 2048;
                $config['remove_spaces']        = TRUE;
                $config['file_name']            = $slug . "-" . date("Y_m_d His");
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('art_gambar')) {
                    die;
                    echo json_encode(array('status' => 2, 'pesan' => "<b>Gagal upload gambar</b> <br>" . $this->upload->display_errors()));
                    die;
                } else {
                    $data_foto = $this->upload->data();
                    $data['art_gambar'] = $data_foto['file_name'];
                }
            }
            if (!empty($_POST['art_id'])) {
                $foto = $this->db->select('art_gambar')->where('art_id', $_POST['art_id'])->get('blog_artikel')->row()->art_gambar;
                if (!empty($data_foto['file_name'])) {
                    if (!empty($foto)) {
                        if (file_exists($config['upload_path'] . $foto)) {
                            unlink($config['upload_path'] . $foto);
                        }
                    }
                }
                $this->db->where('art_id', $_POST['art_id']);
                $query = $this->db->update('blog_artikel', $data);
                if ($query) {
                    $this->setTags($_POST['art_tag_id'], $_POST['art_id'], 'delete');
                }
                $data['art_id'] = $_POST['art_id'];
            } else {
                $data['art_id'] = GENERATOR['blog_artikel'] . "-" . random_string("alnum", 10);
                $data['art_usr_id'] = $_SESSION['system_users']['usr_id'];
                $query = $this->db->insert('blog_artikel', $data);
            }
            if ($query) {
                $this->setTags($_POST['art_tag_id'], $data['art_id'], 'insert');
                echo json_encode(array('status' => 1, 'pesan' => 'Berhasil disimpan !!'));
            } else {
                echo json_encode(array('status' => 0, 'pesan' => 'Gagal disimpan !!'));
            }
        } else {
            $array = array(
                'error'   => true,
                'art_judul' => form_error('art_judul'),
                'art_isi' => form_error('art_isi'),
                'art_ktg_id' => form_error('art_ktg_id'),
                'message' => form_error('message')
            );
            echo json_encode(array('status' => 3, 'pesan' => $array));
        }
    }

    private function setTags($tags, $art, $param)
    {
        if (isset($tags)) {
            if ($param == 'insert') {
                foreach ($tags as $t) {
                    $data = [
                        'art_id' => $art,
                        'tag_id' => $t
                    ];
                    $this->db->insert('blog_artikel_tags', $data);
                }
            } else if ($param == 'delete') {
                $this->db->where('art_id', $art)
                    ->delete('blog_artikel_tags');
            }
        }
    }

    private function get_validation()
    {
        $this->load->library('form_validation');
        $config = [
            [
                'field' => 'art_judul',
                'label' => 'Judul',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Judul harus diisi',
                ],
            ],
            [
                'field' => 'art_isi',
                'label' => 'Isi',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isi harus diisi',
                ],
            ],
            [
                'field' => 'art_ktg_id',
                'label' => 'kategori',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kategori harus diisi',
                ],
            ],
        ];
        $this->form_validation->set_rules($config);
        return $this->form_validation->run();
    }

    private function cekSlug($slug = '')
    {
        $this->db->where('art_slug', $slug);
        $this->db->where('art_deleted_at', null);
        if (isset($_POST['art_id'])) {
            $this->db->where('art_id !=', $_POST['art_id']);
        }
        $art_slug = $this->db->get('blog_artikel')->row_array();
        if ($art_slug) {
            $array = array(
                'error'   => true,
                'art_judul' => "Judul sudah digunakan"
            );
            echo json_encode(array('status' => 3, 'pesan' => $array));
            die;
        }
    }

    public function getKategori()
    {
        $data = $this->db
            ->where('ktg_locked', 0)
            ->where('ktg_deleted_at', null)
            ->order_by('ktg_nama', 'asc')
            ->get('blog_kategori')->result_array();
        if ($data) {
            echo json_encode(array('status' => 1, 'pesan' => 'Berhasil ambil data !!', 'data' => $data));
        } else {
            echo json_encode(array('status' => 0, 'pesan' => 'Gagal ambil data !!'));
        }
    }

    public function getTags()
    {
        $data = $this->db
            ->where('tag_locked', 0)
            ->where('tag_deleted_at', null)
            ->order_by('tag_nama', 'asc')
            ->get('blog_tags')->result_array();
        if ($data) {
            echo json_encode(array('status' => 1, 'pesan' => 'Berhasil ambil data !!', 'data' => $data));
        } else {
            echo json_encode(array('status' => 0, 'pesan' => 'Gagal ambil data !!'));
        }
    }

    public function getByID()
    {
        if (isset($_POST['art_id'])) {
            $data = $this->db
                ->get_where('blog_artikel', ['art_id' => $_POST['art_id']])->row_array();
            if ($data) {
                $data['tags'] = $this->db
                    ->where('art_id', $data['art_id'])
                    ->join('blog_tags b', 'a.tag_id=b.tag_id')
                    ->get('blog_artikel_tags a')
                    ->result_array();
                echo json_encode(['status' => 1, 'pesan' => 'Berhasil ambil data', 'data' => $data]);
            } else {
                echo json_encode(['status' => 0, 'pesan' => 'Gagal ambil data']);
            }
        } else {
            echo json_encode(['status' => 0, 'pesan' => 'Gagal ambil data']);
        }
    }

    public function destroy()
    {
        if (isset($_POST['art_id'])) {
            $this->db->where('art_id', $_POST['art_id']);
            $query = $this->db->update('blog_artikel', ['art_deleted_at' => date('Y-m-d H:i:s')]);
            if ($query) {
                echo json_encode(['status' => 1]);
            } else {
                echo json_encode(['status' => 0, 'pesan' => 'Gagal hapus data']);
            }
        } else {
            echo json_encode(['status' => 0, 'pesan' => 'Gagal hapus data']);
        }
    }

    public function generate()
    {
        for ($i = 11; $i <= 1000; $i++) {
            $judul = "Judul " . $i;
            $slug = url_title($judul, 'dash', true);
            $this->cekSlug($slug);
            $data = array(
                'art_judul' => $judul,
                'art_slug' => $slug,
                'art_isi' => "Isi",
                'art_ktg_id' => "didikam",
                'art_usr_id' => "didikam",
            );
            $data['art_gambar'] = "artikel-33333-2021_09_25_090953.jpg";
            $data['art_id'] = GENERATOR['blog_artikel'] . "-" . random_string("alnum", 10);
            $query = $this->db->insert('blog_artikel', $data);
            echo $judul . "<br>";
        }
    }
}
