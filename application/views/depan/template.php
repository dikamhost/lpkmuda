<!doctype html>
<html lang="en">

<head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   <!-- Favicons -->
   <link href="<?= STORAGEPATH ?>/system/<?= getApp('app_icons')['conf_value'] ?>" rel="icon">
   <link href="<?= STORAGEPATH ?>/system/<?= getApp('app_icons')['conf_value'] ?>" rel="apple-touch-icon">

   <meta name="description" content="<?= getApp('app_descryption')['conf_value'] ?>">
   <meta name="keywords" content="<?= getApp('app_keywords')['conf_value'] ?>">
   <meta name="site_name" content="<?= getApp('app_names')['conf_value'] ?>">
   <meta name="author" content="LPK Muda Al-Hidayah">
   <meta property="locale" content="id_ID" />
   <meta property="type" content="website" />

   <?php if (isset($artikel)) : ?>
      <meta property="title" content="<?= $artikel['art_judul'] ?>" />
      <meta property="description" content="<?= limitWord(strip_tags($artikel['art_isi']), 15) ?>" />
      <meta property="url" content="<?= base_url('artikel/baca/' . $artikel['art_slug']) ?>" />
      <?php
      $art_gambar = '/no-image.jpg';
      if ($artikel['art_gambar']) {
         $art_gambar = '/artikel/' . $artikel['art_gambar'];
      } ?>
      <meta property="image" content="<?= STORAGEPATH . $art_gambar ?>">
   <?php endif; ?>
   <!-- Global site tag (gtag.js) - Google Analytics -->
   <script async src="https://www.googletagmanager.com/gtag/js?id=G-2VX46W52BE"></script>
   <script>
      window.dataLayer = window.dataLayer || [];

      function gtag() {
         dataLayer.push(arguments);
      }
      gtag('js', new Date());

      gtag('config', 'G-2VX46W52BE');
   </script>
   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/bootstrap.min.css">
   <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/fontawesome/css/all.css">
   <link rel="stylesheet" href="<?= base_url() ?>assets/custome/style.css">

   <script src="<?= base_url() ?>assets/jquery-3.6.0.min.js"></script>
   <title><?= $title ?> | <?= getApp('app_title')['conf_value'] ?></title>
   <script>
      var BASE_URL = "<?= base_url(); ?>";
   </script>
   <script src="<?= base_url() ?>assets/member/js/custome.js"></script>
</head>

<body>
   <?php $this->load->view('depan/include/navbar') ?>
   <?php $this->load->view($page) ?>
   <?php $this->load->view('depan/include/footer') ?>
   <script src="<?= base_url() ?>assets/dist/js/bootstrap.bundle.min.js"></script>
   <!-- SweetAlert2 -->
   <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
   <!-- SweetAlert2 -->
   <script src="<?= base_url() ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
</body>

</html>