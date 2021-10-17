<!doctype html>
<html lang="en">

<head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <!-- Favicons -->
   <link href="<?= base_url() ?>storage/logo/favicon.png" rel="icon">
   <meta name="description" content="<?= getApp('app_descryption')['conf_value'] ?>">
   <meta name="keywords" content="<?= getApp('app_keywords')['conf_value'] ?>">
   <meta name="author" content="LPK Muda Al-Hidayah">

   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/bootstrap.min.css">
   <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/fontawesome/css/all.css">
   <link rel="stylesheet" href="<?= base_url() ?>assets/custome/style.css">

   <script src="<?= base_url() ?>assets/jquery-3.6.0.min.js"></script>
   <title><?= $title ?> | <?= getApp('app_title')['conf_value'] ?></title>
</head>

<body>
   <?php $this->load->view('depan/include/navbar') ?>
   <?php $this->load->view($page) ?>
   <?php $this->load->view('depan/include/footer') ?>
   <script src="<?= base_url() ?>assets/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>