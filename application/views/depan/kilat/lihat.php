<div class="container mt-4">
   <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="<?= base_url() ?>"><i class="fas fa-home"></i> Beranda</a></li>
         <li class="breadcrumb-item active" aria-current="page"><a href="<?= base_url('kejuruan') ?>">Kursus Kejuruan</a></li>
         <li class="breadcrumb-item active" aria-current="page"><?= $kilat['klt_nama'] ?></li>
      </ol>
   </nav>
</div>
<section>
   <div class="col-md-12 text-center py-3">
      <div class="container">
         <div class="row">
            <div class="col-md-4">
               <?php
               $klt_image = '/no-image.jpg';
               if ($kilat['klt_image']) {
                  $klt_image = '/kilat/' . $kilat['klt_image'];
               }
               ?>
               <img src="<?= STORAGEPATH . $klt_image ?>" class="card-img-top" alt="...">
            </div>
            <div class="col-md-8">
               <p class="h4 text-left"><?= $kilat['klt_nama'] ?></p>
               <p class="h5 text-left">Rp. <?= number_format($kilat['klt_harga'], 2, ',', '.') ?></p>
               <hr class="mb-1 mt-3">
               <div class="row">
                  <div class="col-md-4 text-left">
                     <i class="fas fa-user"></i> <?= $kilat['usr_name'] ?>
                  </div>
                  <div class="col-md-4 text-left">
                     <i class="fas fa-calendar-alt"></i> <?= date_indo(explode(' ', $kilat['klt_created_at'])[0]); ?>
                  </div>
                  <div class="col-md-4 text-left">
                     <i class="fas fa-eye"></i> <?= $kilat['klt_hit'] ?> Dilihat
                  </div>
               </div>
               <div class="row py-md-5 py-3">
                  <div class="col-md-3">
                     <button class="btn btn-success btn-block"><i class="fas fa-cart-arrow-down"></i> Beli</button>
                  </div>
               </div>
            </div>
         </div>
         <div class="row py-3">
            <div class="col-md-12">
               <ul class="nav nav-tabs">
                  <li class="nav-item">
                     <a class="nav-link active" data-id="deskripsi">Deskripsi</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" data-id="pemateri">Pemateri</a>
                  </li>
               </ul>
            </div>
         </div>
         <div class="row">
            <div class="col-md-12">
               <div class="tab-content">
                  <div class="tab-pane active text-left" id="deskripsi">
                     <?= $kilat['klt_deskripsi'] ?>
                  </div>
                  <div class="tab-pane" id="pemateri">
                     <div class="row">
                        <div class="col-md-3 text-center">
                           <?php
                           $usr_foto = '/no-image.jpg';
                           if ($kilat['usr_foto']) {
                              $usr_foto = '/user/' . $kilat['usr_foto'];
                           }
                           ?>
                           <img src="<?= STORAGEPATH . $usr_foto ?>" style="width: 12rem;" class="card-img-top mb-2" alt="<?= $kilat['usr_name'] ?>">
                        </div>
                        <div class="col-md-8 text-left">
                           <p class="h4"><?= $kilat['usr_name'] ?></p>
                           <p><?= $kilat['usr_deskripsi'] ?></p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<script src="<?= base_url() ?>script/kilat/lihat.js"></script>