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
      <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modal-default">Tambah Data Kategori</button>
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
          <h3 class="card-title">Semua Data <?= $title; ?></h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
            </button>
          </div>
          <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Kategori</th>
                  <th><i class="fas fa-cogs"></i></th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1; foreach($kategori as $k) : ?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $k->nama_kategori; ?></td>
                    <td>
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default<?= $k->id_kategori; ?>">Ubah</button>
                      <a href="<?= base_url('admin/kategori/delete/' . $k->id_kategori); ?>" onclick="return confirm('Yakin ?')" class="btn btn-danger">Hapus</a>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
    </div>
  </div>
  

</section>
<!-- /.content -->

<!-- Tambah -->
<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Default Modal</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?= form_open('admin/kategori'); ?>
        <div class="form-group">
          <label for="nama">Nama Kategori</label>
          <input type="text" name="nama" id="nama" class="form-control">
          <small class="muted text-danger"><?= form_error('nama'); ?></small>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Tambah</button>
        </div>
        <?= form_close(); ?>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<!-- Ubah -->
<?php foreach($kategori as $k) : ?>
<div class="modal fade" id="modal-default<?= $k->id_kategori; ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Default Modal</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?= form_open('admin/kategori/update/' . $k->id_kategori); ?>
        <div class="form-group">
          <label for="nama">Nama Akun</label>
          <input type="text" name="nama" id="nama" class="form-control" value="<?= $k->nama_kategori; ?>">
          <small class="muted text-danger"><?= form_error('nama'); ?></small>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Ubah</button>
        </div>
        <?= form_close(); ?>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<?php endforeach; ?>