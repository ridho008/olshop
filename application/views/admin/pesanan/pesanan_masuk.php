<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1><?= $title; ?></h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard'); ?>">Dashboard</a></li>
          <li class="breadcrumb-item active"><?= $title; ?></li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<section class="content">
  <div class="row">
    <div class="col-lg-6">
      <?= $this->session->flashdata('pesan'); ?>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="card card-primary card-outline card-outline-tabs">
        <div class="card-header p-0 border-bottom-0">
          <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="custom-tabs-four-pesanan-masuk-tab" data-toggle="pill" href="#custom-tabs-four-pesanan-masuk" role="tab" aria-controls="custom-tabs-four-pesanan-masuk" aria-selected="true">Pesanan Masuk</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="custom-tabs-four-proses-tab" data-toggle="pill" href="#custom-tabs-four-proses" role="tab" aria-controls="custom-tabs-four-proses" aria-selected="false">Proses</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="custom-tabs-four-dikirim-tab" data-toggle="pill" href="#custom-tabs-four-dikirim" role="tab" aria-controls="custom-tabs-four-dikirim" aria-selected="false">Dikirim</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="custom-tabs-four-selesai-tab" data-toggle="pill" href="#custom-tabs-four-selesai" role="tab" aria-controls="custom-tabs-four-selesai" aria-selected="false">Selesai</a>
            </li>
          </ul>
        </div>
        <div class="card-body">
          <div class="tab-content" id="custom-tabs-four-tabContent">
            <div class="tab-pane fade show active" id="custom-tabs-four-pesanan-masuk" role="tabpanel" aria-labelledby="custom-tabs-four-pesanan-masuk-tab">
               <div class="table-responsive">
                <table class="table">
                  <tr>
                    <th>No.Order</th>
                    <th>Tanggal Order</th>
                    <th>Ekpedisi</th>
                    <th>Total Bayar</th>
                    <th><i class="fas fa-cogs"></i></th>
                  </tr>
                  <?php foreach($pesanan as $bb) : ?>
                  <tr>
                    <td><?= $bb->no_order; ?></td>
                    <td><?= date('d-m-Y', strtotime($bb->tgl_order)); ?></td>
                    <td><?= strtoupper($bb->ekpedisi) . '/' . $bb->paket . '/' . $bb->ongkir; ?></td>
                    <td>Rp.<?= number_format($bb->total_bayar,0 , ',', '.'); ?> <br>
                      <?php if($bb->status_bayar == 0) : ?>
                      <span class="badge badge-info">Belum Bayar</span>
                      <?php else: ?>
                        <span class="badge badge-success">Menunggu Konfirmasi</span>
                      <?php endif; ?>
                    </td>
                    <td>
                      <?php if($bb->status_bayar == 1) : ?>
                      <button type="button" data-toggle="modal" data-target="#modal-default<?= $bb->id_transaksi; ?>" class="btn btn-sm btn-info">Cek Bukti</button>
                      <a href="<?= base_url('admin/barang/proses/' . $bb->id_transaksi); ?>" class="btn btn-success btn-sm">Proses</a>
                    <?php endif; ?>
                    </td>
                  </tr>
                  <?php endforeach; ?>
                </table>
               </div>
            </div>
            <div class="tab-pane fade" id="custom-tabs-four-proses" role="tabpanel" aria-labelledby="custom-tabs-four-proses-tab">
               <div class="table-responsive">
                <table class="table">
                  <tr>
                    <th>No.Order</th>
                    <th>Tanggal Order</th>
                    <th>Ekpedisi</th>
                    <th>Total Bayar</th>
                    <th><i class="fas fa-cogs"></i></th>
                  </tr>
                  <?php foreach($pesananProses as $bb) : ?>
                  <tr>
                    <td><?= $bb->no_order; ?></td>
                    <td><?= date('d-m-Y', strtotime($bb->tgl_order)); ?></td>
                    <td><?= strtoupper($bb->ekpedisi) . '/' . $bb->paket . '/' . $bb->ongkir; ?></td>
                    <td>Rp.<?= number_format($bb->total_bayar,0 , ',', '.'); ?> <br>
                      <span class="badge badge-primary">Diproses/Dikemas</span>
                    </td>
                    <td>
                      <?php if($bb->status_bayar == 1) : ?>
                      <button type="button" data-toggle="modal" data-target="#modal-kirim<?= $bb->id_transaksi; ?>" class="btn btn-success btn-sm"><i class="fas fa-paper-plane"></i> Kirim</button>
                    <?php endif; ?>
                    </td>
                  </tr>
                  <?php endforeach; ?>
                </table>
               </div> 
            </div>
            <div class="tab-pane fade" id="custom-tabs-four-dikirim" role="tabpanel" aria-labelledby="custom-tabs-four-dikirim-tab">
               <div class="table-responsive">
                <table class="table">
                  <tr>
                    <th>No.Order</th>
                    <th>Tanggal Order</th>
                    <th>Ekpedisi</th>
                    <th>Total Bayar</th>
                    <th>No.Resi</th>
                  </tr>
                  <?php foreach($pesananDikirim as $bb) : ?>
                  <tr>
                    <td><?= $bb->no_order; ?></td>
                    <td><?= date('d-m-Y', strtotime($bb->tgl_order)); ?></td>
                    <td><?= strtoupper($bb->ekpedisi) . '/' . $bb->paket . '/' . $bb->ongkir; ?></td>
                    <td>Rp.<?= number_format($bb->total_bayar,0 , ',', '.'); ?> <br>
                      <span class="badge badge-success">Terkirim</span>
                    </td>
                    <td><?= $bb->no_resi; ?></td>
                  </tr>
                  <?php endforeach; ?>
                </table>
               </div> 
            </div>
            <div class="tab-pane fade" id="custom-tabs-four-selesai" role="tabpanel" aria-labelledby="custom-tabs-four-selesai-tab">
               <div class="table-responsive">
                <table class="table">
                  <tr>
                    <th>No.Order</th>
                    <th>Tanggal Order</th>
                    <th>Ekpedisi</th>
                    <th>Total Bayar</th>
                    <th>No.Resi</th>
                  </tr>
                  <?php foreach($pesananSelesai as $bb) : ?>
                  <tr>
                    <td><?= $bb->no_order; ?></td>
                    <td><?= date('d-m-Y', strtotime($bb->tgl_order)); ?></td>
                    <td><?= strtoupper($bb->ekpedisi) . '/' . $bb->paket . '/' . $bb->ongkir; ?></td>
                    <td>Rp.<?= number_format($bb->total_bayar,0 , ',', '.'); ?> <br>
                      <span class="badge badge-success">Selesai</span>
                    </td>
                    <td><?= $bb->no_resi; ?></td>
                  </tr>
                  <?php endforeach; ?>
                </table>
               </div> 
            </div>
          </div>
        </div>
        <!-- /.card -->
      </div>
    </div>
  </div>
</section>

<!-- Modal Cek Bukti Bayar -->
<?php foreach($pesanan as $bb) : ?>
<div class="modal fade" id="modal-default<?= $bb->id_transaksi; ?>">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Bukti Pembayaran <?= $bb->atas_nama; ?></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table">
          <tr>
            <th>Atas Nama</th>
            <th>:</th>
            <td><?= ucwords($bb->atas_nama); ?></td>
          </tr>
          <tr>
            <th>Bank</th>
            <th>:</th>
            <td><?= ucwords($bb->nama_bank); ?></td>
          </tr>
          <tr>
            <th>No.Rekening</th>
            <th>:</th>
            <td><?= $bb->no_rek; ?></td>
          </tr>
          <tr>
            <th>Total Bayar</th>
            <th>:</th>
            <td>Rp.<?= number_format($bb->total_bayar, 0, ',', '.'); ?></td>
          </tr>
        </table>
        <img src="<?= base_url('assets/front/img/bukti_pembayaran/' . $bb->bukti_bayar); ?>" class="img-thumbnail">
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<?php endforeach; ?>


<!-- Modal Kirim -->
<?php foreach($pesananProses as $bb) : ?>
<div class="modal fade" id="modal-kirim<?= $bb->id_transaksi; ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Kirim Barang <?= $bb->no_order; ?></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?= form_open('admin/barang/kirim_barang/' . $bb->id_transaksi); ?>
        <div class="table-responsive">
          <table class="table">
            <tr>
              <th>Ekpedisi</th>
              <th>:</th>
              <td><?= strtoupper($bb->ekpedisi); ?></td>
            </tr>
            <tr>
              <th>Paket</th>
              <th>:</th>
              <td><?= $bb->paket; ?></td>
            </tr>
            <tr>
              <th>Ongkir</th>
              <th>:</th>
              <td>Rp.<?= number_format($bb->ongkir, 0, ',', '.'); ?></td>
            </tr>
          </table>
          <div class="form-group">
            <label for="resi">No.Resi</label>
            <input type="text" name="resi" id="resi" class="form-control" placeholder="nomor resi">
            <small class="muted text-danger"><?= form_error('resi'); ?></small>
          </div>
        </div>
      </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Kirim</button>
        </div>
        <?= form_close(); ?>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<?php endforeach; ?>