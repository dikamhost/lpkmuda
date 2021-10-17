<nav class="navbar navbar-expand-lg navbar-light bg-light">
   <div class="container">
      <a class="navbar-brand" href="<?= base_url() ?>">
         <img src="<?= STORAGEPATH ?>/system/<?= getApp('app_brand')['conf_value'] ?>" alt="<?= getApp('app_names')['conf_value'] ?>" width="200">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
         <ul class="navbar-nav mr-auto">
            <li class="nav-item">
               <a class="nav-link" href="<?= base_url('kejuruan') ?>"><i class="fas fa-address-book"></i> Kejuruan</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="<?= base_url('kilat') ?>"><i class="fas fa-address-card"></i> Kilat</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="<?= base_url() ?>#tentang"><i class="fas fa-archive"></i> Tentang</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="<?= base_url() ?>#kontak"><i class="fas fa-user-circle"></i> Kontak</a>
            </li>
         </ul>
         <form class="form-inline my-2 my-lg-0">
            <div class="btn-group" role="group" aria-label="Basic example">
               <input class="form-control" type="search" placeholder="Cari" aria-label="Search">
               <button class="btn btn-outline-success" type="submit"><i class="fas fa-search"></i></button>
            </div>
         </form>
         <a href="<?= base_url('peserta') ?>" class="btn btn-success ml-md-3"><i class="fas fa-sign-in-alt"></i> Masuk</a>
      </div>
   </div>
</nav>