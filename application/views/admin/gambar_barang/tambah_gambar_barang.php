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

<!-- Main content -->
<section class="content">
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
          <h3 class="card-title"><?= $title; ?> <?= $gambarBarang->nama_barang; ?></h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
            </button>
          </div>
          <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="row">
            <div class="col-lg">
              <?= form_open_multipart('admin/gambarBarang/add/' . $id_barang); ?>
              <div class="row">
                <div class="col-lg-4">
                  <div class="form-group">
                    <label for="ket">Keterangan Gambar</label>
                    <input type="text" name="ket" class="form-control">
                    <small class="muted text-danger"><?= form_error('ket'); ?></small>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <label for="cover">Cover</label><br>
                    <input type="file" name="cover" id="preview_gambar" class="form-control-file">
                  </div>
                </div>
                <div class="col-lg-4">
                  <label for="">Preview Gambar</label>
                  <img src="<?= base_url('assets/back/img/barang/no-image.png'); ?>" id="gambar_load" width="100px">
                </div>
              </div>
              <?= form_close(); ?>
            </div>
          </div>

          <div class="row">
            <?php foreach($previewBarang as $pb) : ?>
            <div class="col-lg-4 text-center">
              <img src="<?= base_url('assets/back/img/gambar_barang/' . $pb->cover); ?>" class="img-fluid" width="200">
              <small class="d-block text-center">Keterangan : <?= $pb->ket; ?></small>
              <a href="<?= base_url('admin/gambarBarang/delete/' . $pb->id_gambar); ?>" class="btn btn-danger btn-sm btn-block">Hapus</a>
            </div>
            <?php endforeach; ?>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
    </div>
  </div>
  

</section>
<!-- /.content -->


