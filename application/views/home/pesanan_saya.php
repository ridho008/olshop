<div class="container">
  <div class="row mt-5">
    <div class="col-lg-12">
      <h3>Pesanan Saya</h3>
      <?= $this->session->flashdata('pesan'); ?>
    </div>
  </div>
  <div class="col-lg-12 col-sm-6">
    <div class="card card-primary card-outline card-outline-tabs">
      <div class="card-header p-0 border-bottom-0">
        <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="custom-tabs-four-belum-bayar-tab" data-toggle="pill" href="#custom-tabs-four-belum-bayar" role="tab" aria-controls="custom-tabs-four-belum-bayar" aria-selected="true">Order</a>
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
          <div class="tab-pane fade show active" id="custom-tabs-four-belum-bayar" role="tabpanel" aria-labelledby="custom-tabs-four-belum-bayar-tab">
             <div class="table-responsive">
             	<table class="table">
             		<tr>
             			<th>No.Order</th>
             			<th>Tanggal Order</th>
             			<th>Ekpedisi</th>
             			<th>Total Bayar</th>
             			<th><i class="fas fa-cogs"></i></th>
             		</tr>
             		<?php foreach($belum_bayar as $bb) : ?>
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
                		<?php if($bb->status_bayar == 0) : ?>
                		<a href="<?= base_url('belanja/bayar/' . $bb->id_transaksi); ?>" class="btn btn-success btn-sm">Bayar</a>
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
                </tr>
                <?php foreach($diproses as $bb) : ?>
                <tr>
                  <td><?= $bb->no_order; ?></td>
                  <td><?= date('d-m-Y', strtotime($bb->tgl_order)); ?></td>
                  <td><?= strtoupper($bb->ekpedisi) . '/' . $bb->paket . '/' . $bb->ongkir; ?></td>
                  <td>Rp.<?= number_format($bb->total_bayar,0 , ',', '.'); ?> <br>
                    <span class="badge badge-info">Terverifikasi</span><br>
                    <span class="badge badge-success">Diproses/Sedang Dikemas</span>
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
                  <th><i class="fas fa-cogs"></i></th>
                </tr>
                <?php foreach($dikirim as $bb) : ?>
                <tr>
                  <td><?= $bb->no_order; ?></td>
                  <td><?= date('d-m-Y', strtotime($bb->tgl_order)); ?></td>
                  <td><?= strtoupper($bb->ekpedisi) . '/' . $bb->paket . '/' . $bb->ongkir; ?></td>
                  <td>Rp.<?= number_format($bb->total_bayar,0 , ',', '.'); ?> <br>
                    <span class="badge badge-success">Terkirim</span>
                  </td>
                  <td><?= $bb->no_resi; ?></td>
                  <td>
                    <button type="button" data-toggle="modal" data-target="#modal-terima<?= $bb->id_transaksi; ?>" class="btn btn-success btn-sm"><i class="fas fa-check"></i> Diterima</button>
                  </td>
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
                <?php foreach($selesai as $bb) : ?>
                <tr>
                  <td><?= $bb->no_order; ?></td>
                  <td><?= date('d-m-Y', strtotime($bb->tgl_order)); ?></td>
                  <td><?= strtoupper($bb->ekpedisi) . '/' . $bb->paket . '/' . $bb->ongkir; ?></td>
                  <td>Rp.<?= number_format($bb->total_bayar,0 , ',', '.'); ?> <br>
                    <span class="badge badge-success">Selesai :)</span>
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

<!-- Modal Terima -->
<?php foreach($dikirim as $bb) : ?>
<div class="modal fade" id="modal-terima<?= $bb->id_transaksi; ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Sudah Menerima Barang ?</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah Anda Sudah Menerima Barang Yang Anda Pesan ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Tidak</button>
        <a href="<?= base_url('admin/barang/diterima/' . $bb->id_transaksi); ?>" class="btn btn-outline-success">Ya</a>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<?php endforeach; ?>