<div class="container mt-4">
   <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="<?= base_url() ?>"><i class="fas fa-home"></i> Beranda</a></li>
         <li class="breadcrumb-item active" aria-current="page">Kursus Kilat</li>
      </ol>
   </nav>
</div>
<section>
   <div class="col-md-12 text-center py-3">
      <div class="container">
         <div class="row">
            <?php
            foreach ($data as $d) :
               $klt_image = '/no-image.jpg';
               if ($d['klt_image']) {
                  $klt_image = '/kilat/' . $d['klt_image'];
               }
            ?>
               <div class="col-md-3 col-sm-12 mb-3">
                  <div class="card text-center" style="width: 100%;">
                     <img src="<?= STORAGEPATH . $klt_image ?>" class="card-img-top" alt="<?= $d['klt_nama'] ?>" style="max-height: 11.8rem;">
                     <div class="card-body text-left">
                        <h5 class="card-title text-left"><?= $d['klt_nama'] ?></h5>
                        <p class="card-text text-left">Rp. <?= number_format($d['klt_harga'], 2, ',', '.') ?></p>
                        <a href="<?= base_url('kilat/lihat/' . $d['klt_slug']) ?>" class="btn btn-warning btn-block"><i class="fas fa-eye"></i> Lihat</a>
                     </div>
                  </div>
               </div>
            <?php endforeach; ?>
         </div>
         <div class="row">
            <div class="col-md-12">
               <nav aria-label="Page navigation example">
                  <?php echo $pagination ?>
               </nav>
            </div>
         </div>
      </div>
   </div>
</section>