<nav class="navbar navbar-expand-lg navbar-light bg-success">
  <div class="container">
  <a class="navbar-brand text-white" href="<?= base_url(); ?>">OlShop</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link text-white" href="#">Link</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Kategori
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <?php foreach($navKategori as $nk) : ?>
          <a class="dropdown-item" href="<?= base_url('kategori/' . strtolower($nk->nama_kategori)); ?>"><?= $nk->nama_kategori; ?></a>
          <?php endforeach; ?>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <?php 
      $keranjang = $this->cart->contents(); 
      $jml_item = 0;
      foreach ($keranjang as $key => $value) {
        $jml_item = $jml_item + $value['qty'];
      }
      ?>
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fas fa-shopping-cart text-white"></i>
          <span class="badge badge-danger navbar-badge"><?= $jml_item; ?></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <?php foreach($keranjang as $krj) : ?>
          <?php 
          $this->load->model('Barang_m');
          $id = $krj['id'];
          $barang = $this->Barang_m->get_join_where('barang', 'kategori', ['id_barang' => $id])->row();
          ?>
          <a href="#" class="dropdown-item">
            <!-- Barang Start -->
            <div class="media">
              <img src="<?= base_url('assets/back/img/barang/' . $barang->gambar); ?>" alt="<?= $barang->nama_barang; ?>" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  <?= $krj['name']; ?>
                </h3>
                <p class="text-sm"><?= $krj['qty']; ?> x Rp.<?= number_format($krj['price'], 0, ',', '.'); ?></p>
                <p class="text-sm text-muted"><i class="far fa-calculator mr-1"></i> <?= $this->cart->format_number($krj['subtotal']); ?></p>
              </div>
            </div>
            <!-- Barang End -->
          </a>
          <div class="dropdown-divider"></div>
          <?php endforeach; ?>
          <a href="#" class="dropdown-item">
            <!-- Barang Start -->
            <div class="media">
              <div class="media-body text-center">
                <tr>
                  <td colspan="2"> </td>
                  <td class="right"><strong>Total</strong></td>
                  <td class="right">Rp.<?php echo $this->cart->format_number($this->cart->total()); ?></td>
                </tr>
              </div>
            </div>
            <!-- Barang End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">Lihat Keranjang</a>
          <a href="#" class="dropdown-item dropdown-footer">Checkout</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
    </ul>
  </div>
</div> <!-- /container -->
</nav>
