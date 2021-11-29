<?php
class M_artikel extends CI_Model
{
   function __construct()
   {
      parent::__construct();
   }

   private $page = 6;
   function getArtikel($start = null)
   {
      if ($start) {
         $start = ($start * $this->page) - $this->page;
         $this->db->limit($this->page, $start);
      } else {
         $this->db->limit($this->page);
      }
      $data = $this->artikel();
      $this->load->library('pagination');
      $config = $this->getConfig();
      $this->pagination->initialize($config);
      $data['pagination'] = $this->pagination->create_links();
      return $data;
   }

   public function getArtikelBaca($slug)
   {
      $data = $this->db
         ->where('art_slug', $slug)
         ->where('art_deleted_at', null)
         ->where('art_locked', 0)
         ->join('blog_kategori c', 'a.art_ktg_id=c.ktg_id')
         ->join('system_users b', 'a.art_usr_id=b.usr_id')
         ->get('blog_artikel a')->row_array();
      if ($data) {
         $this->db
            ->where('art_slug', $slug)
            ->update('blog_artikel', ['art_hit' => $data['art_hit'] + 1]);
         $data['tags'] = $this->db
            ->where('art_id', $data['art_id'])
            ->join('blog_tags b', 'a.tag_id=b.tag_id')
            ->get('blog_artikel_tags a')->result_array();
      }
      return $data;
   }

   private function artikel()
   {
      if (isset($_POST['ktg_slug'])) {
         $data['kategori'] = $this->db->get_where('blog_kategori', ['ktg_slug' => $_POST['ktg_slug']])->row_array();
         $ktg_id = $data['kategori']['ktg_id'];
         $this->db->where('a.art_ktg_id', $ktg_id);
      }
      if (isset($_POST['tag_slug'])) {
         $data['tag'] = $this->db->get_where('blog_tags', ['tag_slug' => $_POST['tag_slug']])->row_array();
         $tag_id = $data['tag']['tag_id'];
         $data['blog_artikel'] = $this->db
            ->where('a.tag_id', $tag_id)
            ->where('b.art_deleted_at', null)
            ->where('b.art_locked', 0)
            ->order_by('b.art_tgl_upload', 'desc')
            ->join('blog_artikel b', 'a.art_id=b.art_id', 'left')
            ->get('blog_artikel_tags a')->result_array();
      } else {
         $data['blog_artikel'] = $this->db
            ->where('art_deleted_at', null)
            ->where('art_locked', 0)
            ->order_by('art_tgl_upload', 'desc')
            ->get('blog_artikel a')->result_array();
      }
      return $data;
   }

   private function getConfig()
   {
      $config['full_tag_open'] = '<ul class="pagination justify-content-center">';
      $config['full_tag_close'] = '</ul>';
      $config['num_tag_open'] = '<li class="page-item">';
      $config['num_tag_close'] = '</li>';
      $config['first_link'] = '<<';
      $config['last_link'] = '>>';
      $config['first_tag_open'] = '<li class="page-item">';
      $config['first_tag_close'] = '</li>';
      $config['last_tag_open'] = '<li class="page-item">';
      $config['last_tag_close'] = '</li>';
      $config['prev_tag_open'] = '<li class="page-item">';
      $config['prev_tag_close'] = '</li>';
      $config['next_tag_open'] = '<li class="page-item">';
      $config['next_tag_close'] = '</li>';
      $config['cur_tag_open'] = '<li class="page-item"><a class="page-link active"  href="#">';
      $config['cur_tag_close'] = '</a></li>';
      $config['base_url'] = base_url('artikel/index/');
      $config['total_rows'] = count($this->artikel()['blog_artikel']);
      $config['per_page'] = $this->page;
      $config['use_page_numbers'] = TRUE;
      return $config;
   }

   public function getKategori()
   {
      $data = $this->db
         ->where('ktg_deleted_at', null)
         ->where('ktg_locked', 0)
         ->get('blog_kategori')->result_array();
      return $data;
   }

   public function getTags()
   {
      $data = $this->db
         ->where('tag_deleted_at', null)
         ->where('tag_locked', 0)
         ->get('blog_tags')->result_array();
      return $data;
   }
}
