<style>
  @media print
  {    
      .main-footer
      {
          display: none !important;
      }
  }
</style>
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
                    <i class="fas fa-globe"></i> Laporan Penjualan Bulanan
                    <small class="float-right">Bulan: <?= $bln. '-'. $thn; ?></small>
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
                      <th>Tanggal</th>
                      <th>Total</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php $grandTot = 0; ?>
                      <?php $no = 1; foreach($laporan as $l) : ?>
                      <?php $grandTot += $l->grand_total; ?>
                      <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $l->no_order; ?></td>
                        <td><?= date('d-m-Y', strtotime($l->tgl_order)); ?></td>
                        <td>Rp.<?= number_format($l->grand_total,0, ',', '.'); ?></td>
                      </tr>
                      <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                      <?php if(empty($laporan)) : ?>
                      <tr>
                        <td colspan="6"><div class="alert-danger p-3 text-center" role="alert">Data Bulan: <strong><?= $bln. '-'. $thn; ?></strong> Penjualan Belum Ada.</div></td>
                      </tr>
                      <?php endif; ?>
                      <tr>
                        <th colspan="3">Grand Total</th>
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