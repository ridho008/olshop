<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <h3 class="text-center mt-4 mb-2">Kategori <?= $rowKat->nama_kategori; ?></h3>
      <hr style="width: 100px; height: 1px; background-color: #00aaff; border-radius: 10px; margin-top: 0;">
    </div>
  </div>
  <div class="row mt-2">
    <?php foreach($kategori as $b) : ?>
    <div class="col-lg-3 mb-4">
      <div class="card" style="width: 15rem;">
        <img src="<?= base_url('assets/back/img/barang/' . $b->gambar); ?>" class="card-img-top" height="270px" alt="<?= $b->nama_barang; ?>">
        <div class="card-body">
          <h5 class="card-title"><?= $b->nama_barang; ?></h5>
          <p class="card-text mb-0"><a href="<?= base_url('kategori/' . strtolower($b->nama_kategori)); ?>" class="badge badge-primary"><?= $b->nama_kategori; ?></a></p>
          <p class="card-text">Rp.<?= number_format($b->harga, 0, ',', '.'); ?></p>
          <a href="#" class="btn btn-primary"><i class="fas fa-eye"></i> Detail</a>
          <a href="#" class="btn btn-success"><i class="fas fa-shopping-cart"></i> Pesan</a>
        </div>
      </div>
    </div>
    <?php endforeach; ?>
  </div>
</div>