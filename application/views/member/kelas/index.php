<div class="col-md-9 mt-4">
   <div class="card">
      <div class="card-header">
         <i class="fas fa-book"></i> Kelas
      </div>
      <div class="card-body">
         <?php if ($kelas) : ?>
            <?php foreach ($kelas as $k) : ?>
               <div class="row">
                  <div class="col-md-3">
                     <?php
                     $foto = $k['kjr_image'];
                     if (!isset($foto)) {
                        $foto = STORAGEPATH . '/no-image.jpg';
                     } else {
                        $foto = STORAGEPATH . '/kejuruan/' . $foto;
                     }
                     ?>
                     <img src="<?= $foto ?>" width="100%" alt="">
                  </div>
                  <div class="col-md-9">
                     <h5 class="mb-2"><?= $k['kjr_nama']; ?></h5>
                     <?php if ($k['kls_locked'] == 0) : ?>
                        <div class="progress">
                           <div class="progress-bar progress-bar-striped bg-warning" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                        </div>
                        <div class="mt-1 mb-2" style="color: #696666;">
                           <strong> 3 </strong> dari <strong> 75 </strong> modul telah selesai
                        </div>
                        <a href="<?= base_url('belajar/' . $k['kjr_slug']) ?>" class="btn btn-success"><i class="fas fa-book-reader"></i> Lanjut Belajar</a>
                        <hr class="my-2">
                        <div class="mt-2 mb-3" style="color: #696666;">
                           <p class="mt-2 mb-1">Lisensi Kepada :</p>
                           <strong class="mt-0"><?= $k['mbr_name'] ?></strong> <span>| <?= $k['mbr_email'] ?></span>
                           <p class="mt-1 tgl-license"><i>(<?= $k['kls_created_at'] ?>)</i></p>
                        </div>
                     <?php else : ?>
                        <i>(Proses Verifikasi Admin)</i>
                     <?php endif; ?>
                  </div>
                  <div class="col-md-12">
                     <hr class="mt-0 mb-3">
                  </div>
               </div>
            <?php endforeach; ?>
         <?php else : ?>
            <div class="row">
               <div class="col-md-4 text-center">
                  <img src="<?= base_url('assets/images/kosong.jpg') ?>" width="75%" alt="">
               </div>
               <div class="col-md-8 text-md-left text-center">
                  <h5 class="mt-4 mb-3">Tidak ada data !!</h5>
                  <a href="<?= base_url('kejuruan') ?>" class="btn btn-danger"><i class="fas fa-search"></i> Cari Kelas</a>
               </div>
            </div>
         <?php endif; ?>
      </div>
   </div>
</div>