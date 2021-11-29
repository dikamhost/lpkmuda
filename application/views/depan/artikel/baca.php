<div class="container-fluid my-5 px-5">
   <div class="row">
      <div class="col-md-9">
         <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="<?= base_url() ?>"><i class="fas fa-home"></i> Beranda</a></li>
               <li class="breadcrumb-item"><a href="<?= base_url('artikel') ?>">Artikel</a></li>
               <li class="breadcrumb-item active" aria-current="page"><?= $artikel['art_judul'] ?></li>
            </ol>
         </nav>
         <div class="container-fluid">
            <div class="row">
               <?php
               $d = $artikel;
               $art_gambar = '/no-image.jpg';
               if ($d['art_gambar']) {
                  $art_gambar = '/artikel/' . $d['art_gambar'];
               }
               ?>
               <div class="card text-center" style="width: 100%;">
                  <div class="card-body text-left">
                     <h3 class="card-title text-left"><?= $d['art_judul'] ?></h3>
                     <div class="row">
                        <div class="col-md-4 text-left">
                           <i class="fas fa-user"></i> <?= $d['usr_name'] ?>
                        </div>
                        <div class="col-md-4 text-left">
                           <i class="fas fa-calendar-alt"></i> <?= date_indo(explode(' ', $d['art_tgl_upload'])[0]); ?>
                        </div>
                        <div class="col-md-4 text-left">
                           <i class="fas fa-eye"></i> <?= $d['art_hit'] ?> Dilihat
                        </div>
                     </div>
                     <hr class="mb-1 mt-3">
                     <div class="row mt-3">
                        <div class="col-md-12 text-center">
                           <img loading="lazy" src="<?= STORAGEPATH . $art_gambar ?>" class="card-img-top" alt="<?= $d['art_judul'] ?>" style="height: 15rem; width: auto; max-width: 100%;">
                        </div>
                        <div class="col-md-12">
                           <p style="font-size: 13px;" class="card-text text-left"><?= $d['art_isi'] ?></p>
                        </div>
                        <div class="col-md-12">
                           <hr class="mb-1 mt-3">
                           <p>Kategori : <a href="<?= base_url('kategori/' . $d['ktg_slug']) ?>" class="btn btn-sm btn-outline-success mt-1 mr-1"><?= $d['ktg_nama'] ?></a></p>
                           <?php if ($d['tags']) : ?>
                              <p>Tags :
                                 <?php $i = 1;
                                 foreach ($d['tags'] as $tag) : ?>
                                    <a href="<?= base_url('tag/' . $tag['tag_slug']) ?>">#<?= $tag['tag_nama'] ?></a><?php echo ($i < count($d['tags'])) ? "," : ""; ?>
                                 <?php $i++;
                                 endforeach; ?>
                              </p>
                           <?php endif; ?>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <div id="disqus_thread"></div>
                  <script>
                     (function() {
                        var d = document,
                           s = d.createElement('script');
                        s.src = 'https://simuda-course.disqus.com/embed.js';
                        s.setAttribute('data-timestamp', +new Date());
                        (d.head || d.body).appendChild(s);
                     })();
                  </script>
                  <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
               </div>
            </div>
         </div>
      </div>
      <?php $this->load->view('depan/artikel/right_artikel'); ?>
   </div>
</div>