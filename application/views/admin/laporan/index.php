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

<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-4">
          <div class="card card-outline card-primary">
            <div class="card-header">
              <h3 class="card-title"><?= $title; ?> Harian</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
              </div>
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="row">
                <div class="col-md-4">
                  <?= form_open('admin/laporan/harian', 'target="_blank"'); ?>
                  <div class="form-group">
                    <label for="tgl">Tanggal</label>
                    <select name="tgl" id="tgl" class="form-control">
                      <option value="">-- Pilih Tanggal --</option>
                      <?php for($i = 1; $i <= 31; $i++) : ?>
                        <?php if($i == date('d')) : ?>
                        <option value="<?= $i; ?>" selected><?= $i; ?></option>
                        <?php else : ?>
                        <option value="<?= $i; ?>"><?= $i; ?></option>
                        <?php endif; ?>
                      <?php endfor; ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="bulan">Bulan</label>
                    <select name="bulan" id="bulan" class="form-control">
                      <option value="">-- Pilih Bulan</option>
                      <option value="1" <?= (date('m') == 1) ? 'selected' : '' ?>>Januari</option>
                      <option value="2" <?= (date('m') == 2) ? 'selected' : '' ?>>Februari</option>
                      <option value="3" <?= (date('m') == 3) ? 'selected' : '' ?>>Maret</option>
                      <option value="4" <?= (date('m') == 4) ? 'selected' : '' ?>>April</option>
                      <option value="5" <?= (date('m') == 5) ? 'selected' : '' ?>>Mei</option>
                      <option value="6" <?= (date('m') == 6) ? 'selected' : '' ?>>Juni</option>
                      <option value="7" <?= (date('m') == 7) ? 'selected' : '' ?>>Juli</option>
                      <option value="8" <?= (date('m') == 8) ? 'selected' : '' ?>>Agustus</option>
                      <option value="9" <?= (date('m') == 9) ? 'selected' : '' ?>>September</option>
                      <option value="10" <?= (date('m') == 10) ? 'selected' : '' ?>>Oktober</option>
                      <option value="11" <?= (date('m') == 11) ? 'selected' : '' ?>>November</option>
                      <option value="12" <?= (date('m') == 12) ? 'selected' : '' ?>>Desember</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="tahun">Tahun</label>
                    <select name="tahun" id="tahun" class="form-control">
                      <option value="">-- Pilih Tahun --</option>
                      <?php for($i = 2015; $i <= date('Y'); $i++) : ?>
                        <?php if($i == date('Y')) : ?>
                        <option value="<?= $i; ?>" selected><?= $i; ?></option>
                        <?php else : ?>
                        <option value="<?= $i; ?>"><?= $i; ?></option>
                        <?php endif; ?>
                      <?php endfor; ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block btn-sm"><i class="fas fa-print"></i> Cetak</button>
                  </div>
                  <?= form_close(); ?>
                </div>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
        <div class="col-md-4">
          <div class="card card-outline card-primary">
            <div class="card-header">
              <h3 class="card-title"><?= $title; ?> Bulanan</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
              </div>
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <?= str_replace(' ', '', 'a Ridho Surya') ?>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
        <div class="col-md-4">
          <div class="card card-outline card-primary">
            <div class="card-header">
              <h3 class="card-title"><?= $title; ?> Tahunan</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
              </div>
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              
            </div>
            <!-- /.card-body -->
          </div>
        </div>
      </div>
    </div>
  </div>
</section>