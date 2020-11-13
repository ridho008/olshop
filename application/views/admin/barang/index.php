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
      <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modal-default">Tambah Data Barang</button>
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
                  <th>Gambar</th>
                  <th>Barang</th>
                  <th>Kategori</th>
                  <th>Harga</th>
                  <th>Deskripsi</th>
                  <th><i class="fas fa-cogs"></i></th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1; foreach($barang as $b) : ?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td>
                      <img src="<?= base_url('assets/back/img/barang/' . $b->gambar); ?>" width="100px">
                    </td>
                    <td><?= $b->nama_barang; ?><br> <?= $b->berat; ?> Gram</td>
                    <td><?= $b->nama_kategori; ?></td>
                    <td><?= number_format($b->harga, 0, ',', '.'); ?></td>
                    <td><?= $b->deskripsi; ?></td>
                    <td>
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default<?= $b->id_barang; ?>">Ubah</button>
                      <a href="<?= base_url('admin/barang/delete/' . $b->id_barang); ?>" onclick="return confirm('Yakin ?')" class="btn btn-danger">Hapus</a>
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
        <?= form_open_multipart('admin/barang'); ?>
        <div class="form-group">
          <label for="nama">Nama Barang</label>
          <input type="text" name="nama" id="nama" class="form-control">
          <small class="muted text-danger"><?= form_error('nama'); ?></small>
        </div>
        <div class="form-group">
          <label for="kategori">Kategori</label>
          <select name="kategori" id="kategori" class="form-control">
            <option value="">-- Pilih Kategori --</option>
            <?php foreach($kategori as $k) : ?>
              <option value="<?= $k->id_kategori; ?>"><?= $k->nama_kategori; ?></option>
            <?php endforeach; ?>
          </select>
          <small class="muted text-danger"><?= form_error('nama'); ?></small>
        </div>
        <div class="form-group">
          <label for="harga">Harga Barang</label>
          <input type="text" name="harga" id="harga" class="form-control">
          <small class="muted text-danger"><?= form_error('harga'); ?></small>
        </div>
        <div class="form-group">
          <label for="berat">Berat (Gram)</label>
          <input type="number" name="berat" id="berat" class="form-control">
          <small class="muted text-danger"><?= form_error('berat'); ?></small>
        </div>
        <div class="form-group">
          <label for="deskripsi">Deskripsi</label>
          <textarea name="deskripsi" id="deskripsi" class="form-control"></textarea>
          <small class="muted text-danger"><?= form_error('deskripsi'); ?></small>
        </div>
        <div class="form-group">
          <label for="gambar">Gambar</label><br>
          <img src="<?= base_url('assets/back/img/barang/no-image.png'); ?>" id="gambar_load" width="100px">
          <input type="file" name="gambar" id="preview_gambar" class="form-control-file">
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
<?php foreach($barang as $b) : ?>
<div class="modal fade" id="modal-default<?= $b->id_barang; ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Default Modal</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?= form_open_multipart('admin/barang/update/' . $b->id_barang); ?>
        <div class="form-group">
          <label for="nama">Nama Barang</label>
          <input type="text" name="nama" id="nama" class="form-control" value="<?= $b->nama_barang; ?>">
          <small class="muted text-danger"><?= form_error('nama'); ?></small>
        </div>
        <div class="form-group">
          <label for="kategori">Kategori</label>
          <select name="kategori" id="kategori" class="form-control">
            <option value="">-- Pilih Kategori --</option>
            <?php foreach($kategori as $k) : ?>
              <?php if($k->id_kategori == $b->id_kategori) : ?>
              <option value="<?= $k->id_kategori; ?>" selected><?= $k->nama_kategori; ?></option>
              <?php else : ?>
                <option value="<?= $k->id_kategori; ?>"><?= $k->nama_kategori; ?></option>
              <?php endif; ?>
            <?php endforeach; ?>
          </select>
          <small class="muted text-danger"><?= form_error('nama'); ?></small>
        </div>
        <div class="form-group">
          <label for="harga">Harga Barang</label>
          <input type="text" name="harga" id="harga" class="form-control" value="<?= $b->harga; ?>">
          <small class="muted text-danger"><?= form_error('harga'); ?></small>
        </div>
        <div class="form-group">
          <label for="berat">Berat (Gram)</label>
          <input type="number" name="berat" id="berat" value="<?= $b->berat; ?>" class="form-control">
          <small class="muted text-danger"><?= form_error('berat'); ?></small>
        </div>
        <div class="form-group">
          <label for="deskripsi">Deskripsi</label>
          <textarea name="deskripsi" id="deskripsi" class="form-control"><?= $b->deskripsi; ?></textarea>
          <small class="muted text-danger"><?= form_error('deskripsi'); ?></small>
        </div>
        <div class="form-group">
          <label for="gambar">Gambar</label><br>
          <img src="<?= base_url('assets/back/img/barang/' . $b->gambar); ?>" id="gambar_load" width="100px">
          <input type="file" name="gambar" id="preview_gambar" class="form-control-file">
          <input type="hidden" name="gambarLama" id="gambarLama" class="form-control" value="<?= $b->gambar; ?>">
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
