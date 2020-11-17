<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <h3 class="text-center mt-4 mb-2"><?= $title; ?></h3>
      <hr style="width: 100px; height: 1px; background-color: #00aaff; border-radius: 10px; margin-top: 0;">
    </div>
  </div>
  <div class="row">
    <div class="col-lg-6">
      <div class="card card-info">
        <div class="card-header">
          <h3 class="card-title">No.Rekening Toko</h3>
        </div>
        <div class="card-body">
          <div class="alert alert-info" role="alert"><i class="fas fa-info-circle"></i> Silahkan transfer uang ke nomor rekening di bawah ini sebesar <h4>Rp.<?= number_format($detailBayar->total_bayar, 0, ',', '.'); ?></h4></div>
          <div class="table-responsive">
            <table class="table">
              <tr>
                <th>Bank</th>
                <th>No.Rekening</th>
                <th>Atas Nama</th>
              </tr>
              <?php foreach($rekening as $r) : ?>
              <tr>
                <td><?= $r->nama_bank; ?></td>
                <td><?= $r->no_rek; ?></td>
                <td><?= $r->atas_nama; ?></td>
              </tr>  
              <?php endforeach; ?>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-6">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Isi Lengkap Data Anda</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <?= form_open_multipart('belanja/bayar/' . $detailBayar->id_transaksi); ?>
          <div class="card-body">
            <?= $this->session->flashdata('pesan'); ?>
            <div class="form-group">
              <label for="nama">Atas Nama</label>
              <input type="text" name="nama" class="form-control" id="nama" placeholder="A/N">
              <small class="muted text-danger"><?= form_error('nama'); ?></small>
            </div>
            <div class="form-group">
              <label for="bank">Bank</label>
              <select name="bank" id="bank" class="form-control">
                <option value="">-- Pilih Bank --</option>
                <option value="bri">BRI</option>
                <option value="mandiri">Mandiri</option>
                <option value="riau kepri">Riau Kepri</option>
              </select>
              <small class="muted text-danger"><?= form_error('bank'); ?></small>
            </div>
            <div class="form-group">
              <label for="no_rek">Nomor Rekening</label>
              <input type="text" name="no_rek" class="form-control" id="no_rek" placeholder="Nomor Rekening">
              <small class="muted text-danger"><?= form_error('no_rek'); ?></small>
            </div>
            <div class="form-group">
              <label for="exampleInputFile">File input</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" name="bukti" class="custom-file-input" id="exampleInputFile">
                  <label class="custom-file-label" for="exampleInputFile">Unggah Bukti</label>
                </div>
              </div>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary">Kirim</button>
            </div>
          <?= form_close(); ?>
          </div>
          <!-- /.card-body -->

      </div>
    </div>
  </div>
</div>