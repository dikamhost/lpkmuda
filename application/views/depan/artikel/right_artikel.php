<div class="col-md-3">
   <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
         <li class="breadcrumb-item"><i class="fas fa-archive"></i> Kategori</li>
      </ol>
   </nav>
   <div class="text-center mx-1 mt-2" style="width: 100%; display:inline-table;">
      <?php foreach ($kategori as $k) : ?>
         <a href="<?= base_url('kategori/' . $k['ktg_slug']) ?>" class="btn btn-outline-secondary mt-1 mr-1"><?= $k['ktg_nama'] ?></a>
      <?php endforeach; ?>
   </div>
   <nav aria-label="breadcrumb" class="mt-4">
      <ol class="breadcrumb">
         <li class="breadcrumb-item"><i class="fas fa-th-list"></i> Tags</li>
      </ol>
   </nav>
   <div class="text-center mx-1 mt-2" style="width: 100%; display:inline-table;">
      <?php foreach ($tags as $k) : ?>
         <a href="<?= base_url('tag/' . $k['tag_slug']) ?>" class="btn btn-outline-secondary mt-1 mr-1"><?= $k['tag_nama'] ?></a>
      <?php endforeach; ?>
   </div>
</div>