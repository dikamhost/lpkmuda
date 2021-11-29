<div class="container-fluid my-4 px-5">
   <div class="row">
      <div class="col-md-9">
         <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="<?= base_url() ?>"><i class="fas fa-home"></i> Beranda</a></li>
               <li class="breadcrumb-item active" aria-current="page">Artikel</li>
               <?php if (isset($_POST['ktg_slug'])) : ?>
                  <li class="breadcrumb-item active" aria-current="page">Kategori - <?= $data['kategori']['ktg_nama'] ?></li>
               <?php elseif (isset($_POST['tag_slug'])) : ?>
                  <li class="breadcrumb-item active" aria-current="page">Tag - <?= $data['tag']['tag_nama'] ?></li>
               <?php endif; ?>
            </ol>
         </nav>
         <div class="container-fluid">
            <div class="row">
               <?php if ($data['blog_artikel']) : ?>
                  <?php
                  foreach ($data['blog_artikel'] as $d) :
                     $art_gambar = '/no-image.jpg';
                     if ($d['art_gambar']) {
                        $art_gambar = '/artikel/' . $d['art_gambar'];
                     }
                  ?>
                     <div class="col-md-4 col-sm-12 mt-3">
                        <div class="card text-center" style="width: 100%;">
                           <img loading="lazy" src="<?= STORAGEPATH . $art_gambar ?>" class="card-img-top" alt="<?= $d['art_judul'] ?>" style="height: 14rem;">
                           <div class="card-body text-left">
                              <h6 class="card-title text-left"><?= $d['art_judul'] ?></h6>
                              <p style="font-size: 13px;" class="card-text text-left"><?= limitWord(strip_tags($d['art_isi']), 15) ?></p>
                              <a href="<?= base_url('artikel/baca/' . $d['art_slug']) ?>" class="btn btn-success btn-block">Selengkapnya...</a>
                           </div>
                        </div>
                     </div>
                  <?php endforeach; ?>
               <?php else : ?>
                  <div class="col-md-12 text-center">
                     <img src="<?= base_url('assets/images/kosong.jpg') ?>" width="300" style="max-width: 75%;" alt="">
                     <h5 class="mt-4 mb-3">Tidak ada data !!</h5>
                  </div>
               <?php endif; ?>
            </div>
            <div class="row mt-3">
               <div class="col-md-12">
                  <nav aria-label="Page navigation example">
                     <?php echo $pagination ?>
                  </nav>
               </div>
            </div>
         </div>
      </div>
      <?php $this->load->view('depan/artikel/right_artikel'); ?>
   </div>
</div>