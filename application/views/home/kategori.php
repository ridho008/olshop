<?php if(empty($kategori)) : ?>
  <div class="container mt-4">
    <div class="row">
      <div class="col-lg">
        <div class="alert alert-info"><i class="fas fa-info-circle"></i> Barang Kategori <strong><?= ucwords($kat); ?></strong> Belum Tersedia.</div>
      </div>
    </div>
  </div>
  <?php else : ?>
<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <h3 class="text-center mt-4 mb-2">Kategori <?= $rowKat->nama_kategori; ?></h3>
      <hr style="width: 100px; height: 1px; background-color: #00aaff; border-radius: 10px; margin-top: 0;">
    </div>
  </div>
  <div class="row mt-2">

    <?php foreach($kategori as $b) : ?>
      <?php 
        echo form_open('belanja/add');
        echo form_hidden('id', $b->id_barang);
        echo form_hidden('qty', 1);
        echo form_hidden('price', $b->harga);
        echo form_hidden('name', $b->nama_barang);
        echo form_hidden('redirect_page', str_replace('index.php/', '', current_url()));
        ?>
    <div class="col-lg-3 mb-4">
      <div class="card" style="width: 15rem;">
        <img src="<?= base_url('assets/back/img/barang/' . $b->gambar); ?>" class="card-img-top" height="270px" alt="<?= $b->nama_barang; ?>">
        <div class="card-body">
          <h5 class="card-title"><?= $b->nama_barang; ?></h5>
          <p class="card-text mb-0"><a href="<?= base_url('kategori/' . strtolower($b->nama_kategori)); ?>" class="badge badge-primary"><?= $b->nama_kategori; ?></a></p>
          <p class="card-text">Rp.<?= number_format($b->harga, 0, ',', '.'); ?></p>
          <a href="<?= base_url('barang/' . strtolower($b->id_barang)); ?>" class="btn btn-primary"><i class="fas fa-eye"></i> Detail</a>
          <button type="submit" class="btn btn-success swalDefaultSuccess"><i class="fas fa-shopping-cart"></i> Pesan</button>
          <?= form_close(); ?>
        </div>
      </div>
    </div>
    <?php endforeach; ?>
  </div>
</div>
<?php endif; ?>