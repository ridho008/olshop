<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1><?= $title; ?></h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard'); ?>"><?= $title; ?></a></li>
          <!-- <li class="breadcrumb-item active">Blank Page</li> -->
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-6">
        <?php if(validation_errors()) : ?>
          <div class="alert alert-danger"><?= validation_errors(); ?></div>
        <?php endif; ?>
        <?= $this->session->flashdata('pesan'); ?>
      </div>
    </div>
    <div class="row">
      <div class="col-lg">
        <div class="card card-outline card-primary">
          <div class="card-header">
            <h3 class="card-title"><?= $title; ?> Website</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
              </button>
            </div>
            <!-- /.card-tools -->
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <?= form_open('admin/pengaturan'); ?>
            <div class="row">
              <div class="col-lg-6">
                <div class="form-group">
                  <label for="provinsi">Provinsi</label>
                  <select name="provinsi" id="provinsi" class="form-control">
                  </select>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <label for="kota">Kota</label>
                  <select name="kota" id="kota" class="form-control">
                    <option value="<?= $pengaturan->lokasi; ?>"><?= $pengaturan->lokasi; ?></option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6">
                <div class="form-group">
                  <label for="nama_toko">Nama Toko</label>
                  <input type="text" name="nama_toko" id="nama_toko" class="form-control" value="<?= $pengaturan->nama_toko; ?>">
                  <small class="muted text-danger"><?= form_error('nama_toko'); ?></small>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <label for="telp">Telepon</label>
                  <input type="text" name="telp" id="telp" class="form-control" value="<?= $pengaturan->telp; ?>">
                  <small class="muted text-danger"><?= form_error('telp'); ?></small>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12">
                <div class="form-group">
                  <label for="alamat">Alamat</label>
                  <input type="text" name="alamat" id="alamat" class="form-control" value="<?= $pengaturan->alamat_toko; ?>">
                  <small class="muted text-danger"><?= form_error('alamat'); ?></small>
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
              </div>
            </div>
            <?= form_close(); ?>
          </div>
          <!-- /.card-body -->
        </div>
      </div>
    </div>
  </div>
  

</section>
<!-- /.content -->
 
<script src="<?= base_url('assets/back'); ?>/plugins/jquery/jquery.min.js"></script>
<script>
  $(document).ready(function() {
    $.ajax({
      url: 'http://localhost/olshop/admin/rajaongkir/provinsi',
      type: 'post',
      success: function(hasil_provinsi) {
        // console.log(hasil_provinsi);
        $('#provinsi').html(hasil_provinsi);
      }
    });

    $('#provinsi').change(function() {
      var id_provinsi_terpilih = $('option:selected', this).attr('id_provinsi');

      $.ajax({
        url: 'http://localhost/olshop/admin/rajaongkir/kota',
        type: 'post',
        data: 'id_provinsi=' + id_provinsi_terpilih,
        success: function(hasil_kota) {
          console.log(hasil_kota);
          $('#kota').html(hasil_kota);
        }
      });
    });
  });
</script>