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
  <div class="row">
    <div class="col-lg-6">
      <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modal-default">Tambah Data User</button>
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
                  <th>Nama</th>
                  <th>Username</th>
                  <th>Level</th>
                  <th><i class="fas fa-cogs"></i></th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1; foreach($users as $u) : ?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $u->nama_user; ?></td>
                    <td><?= $u->username; ?></td>
                    <td><?= $u->level == '1' ? 'Admin' : 'User'; ?></td>
                    <td>
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default<?= $u->id_user; ?>">Ubah</button>
                      <a href="<?= base_url('admin/user/delete/' . $u->id_user); ?>" class="btn btn-danger">Hapus</a>
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
        <?= form_open('admin/user'); ?>
        <div class="form-group">
          <label for="nama">Nama Akun</label>
          <input type="text" name="nama" id="nama" class="form-control">
          <small class="muted text-danger"><?= form_error('nama'); ?></small>
        </div>
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" name="username" id="username" class="form-control">
          <small class="muted text-danger"><?= form_error('username'); ?></small>
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" name="password" id="password" class="form-control">
          <small class="muted text-danger"><?= form_error('password'); ?></small>
        </div>
        <div class="form-group">
          <label for="level">Level Akun</label>
          <select name="level" id="level" class="form-control">
            <option value="">-- Pilih Level --</option>
            <option value="1">Admin</option>
            <option value="2">User</option>
          </select>
          <small class="muted text-danger"><?= form_error('level'); ?></small>
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
<?php foreach($users as $u) : ?>
<div class="modal fade" id="modal-default<?= $u->id_user; ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Default Modal</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?= form_open('admin/user/update/' . $u->id_user); ?>
        <div class="form-group">
          <label for="nama">Nama Akun</label>
          <input type="text" name="nama" id="nama" class="form-control" value="<?= $u->nama_user; ?>">
          <small class="muted text-danger"><?= form_error('nama'); ?></small>
        </div>
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" name="username" id="username" class="form-control" value="<?= $u->username; ?>">
          <small class="muted text-danger"><?= form_error('username'); ?></small>
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" name="password" id="password" class="form-control" placeholder="Masukan Password">
          <small class="muted text-danger"><?= form_error('password'); ?></small>
        </div>
        <div class="form-group">
          <label for="level">Level Akun</label>
          <select name="level" id="level" class="form-control">
            <option value="">-- Pilih Level --</option>
            <option value="1" <?php if($u->level == 1){echo "selected";} ?>>Admin</option>
            <option value="2" <?php if($u->level == 2){echo "selected";} ?>>User</option>
          </select>
          <small class="muted text-danger"><?= form_error('level'); ?></small>
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
<?php endforeach; ?>