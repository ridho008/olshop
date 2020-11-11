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
                  <th>Cover</th>
                  <th>Barang</th>
                  <th>Jumlah Gambar</th>
                  <th><i class="fas fa-cogs"></i></th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1; foreach($gambarBarang as $gb) : ?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td>
                      <img src="<?= base_url('assets/back/img/barang/' . $gb->gambar); ?>" width="100px">
                    </td>
                    <td><?= $gb->nama_barang; ?></td>
                    <td><span class="badge badge-primary"><?= $gb->totalGambar; ?></span></td>
                    <td>
                      <a href="<?= base_url('admin/gambarBarang/add/' . $gb->id_barang); ?>" class="btn btn-info btn-xs">Tambah Gambar</a>
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


