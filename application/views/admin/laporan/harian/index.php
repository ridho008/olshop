<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1><?= $title; ?></h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?= base_url('admin/laporan'); ?>">Laporan</a></li>
          <li class="breadcrumb-item active"><?= $title; ?></li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-globe"></i> Laporan Penjualan Harian
                    <small class="float-right">Tanggal: <?= $tgl. '-'. $bln. '-'. $thn; ?></small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>#</th>
                      <th>No.Order</th>
                      <th>Barang</th>
                      <th>Harga</th>
                      <th>Qty</th>
                      <th>Total Harga</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php $grandTot = 0; ?>
                    <?php $no = 1; foreach($laporan as $l) : ?>
                    <?php $totHarga = $l->qty * $l->harga ?>
                    <?php
                    $grandTot += $totHarga;
                    ?>
                    <tr>
                      <td><?= $no++; ?></td>
                      <td><?= $l->no_order; ?></td>
                      <td><?= $l->nama_barang; ?></td>
                      <td><?= number_format($l->harga,0,',','.'); ?></td>
                      <td><?= $l->qty; ?></td>
                      <td>Rp.<?= number_format($totHarga,0, ',', '.'); ?></td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <td colspan="6"><div class="alert-danger p-3 text-center" role="alert">Data Tanggal: <strong><?= $tgl. '-'. $bln. '-'. $thn; ?></strong> Penjualan Belum Ada.</div></td>
                      </tr>
                      <tr>
                        <th colspan="5">Grand Total</th>
                        <th>Rp.<?= number_format($grandTot,0, ',', '.'); ?></th>
                      </tr>
                    </tfoot>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  <button type="button" onclick="window.print()" class="btn btn-default"><i class="fas fa-print"></i> Print</button>
                </div>
              </div>
            </div>
      </div>
    </div>
  </div>
</section>