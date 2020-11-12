<div class="container">
  <div class="row mt-5">
    <div class="col-lg-12">
      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-sm-6">
              <h3 class="d-inline-block d-sm-none"><?= $barang->nama_barang; ?></h3>
              <div class="col-12">
                <img src="<?= base_url('assets/back/img/barang/' . $barang->gambar); ?>" class="product-image" alt="Product Image">
              </div>
              <div class="col-12 product-image-thumbs">
                <div class="product-image-thumb active"><img src="<?= base_url('assets/back/img/barang/' . $barang->gambar); ?>" alt="Product Image"></div>
                <?php foreach($gambarBarang as $gb) : ?>
                <div class="product-image-thumb" ><img src="<?= base_url('assets/back/img/gambar_barang/' . $gb->cover); ?>" alt="Product Image"></div>
                <?php endforeach; ?>
              </div>
            </div>
            <div class="col-12 col-sm-6">
              <h3 class="my-3"><?= $barang->nama_barang; ?></h3>
              <p><?= word_limiter($barang->deskripsi, 30); ?></p>

              <hr>
              <div class="bg-gray py-2 px-3 mt-4">
                <h2 class="mb-0">
                  Rp.<?= number_format($barang->harga, 0, ',', '.'); ?>
                </h2>
              </div>

              <div class="mt-4">
                <div class="btn btn-primary btn-lg btn-flat">
                  <i class="fas fa-cart-plus fa-lg mr-2"></i> 
                  Pesan
                </div>

                <!-- <div class="btn btn-default btn-lg btn-flat">
                  <i class="fas fa-heart fa-lg mr-2"></i> 
                  Add to Wishlist
                </div> -->
              </div>

              <div class="mt-4 product-share">
                <a href="#" class="text-gray">
                  <i class="fab fa-facebook-square fa-2x"></i>
                </a>
                <a href="#" class="text-gray">
                  <i class="fab fa-twitter-square fa-2x"></i>
                </a>
                <a href="#" class="text-gray">
                  <i class="fas fa-envelope-square fa-2x"></i>
                </a>
                <a href="#" class="text-gray">
                  <i class="fas fa-rss-square fa-2x"></i>
                </a>
              </div>

            </div>
          </div>
          
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
</div>