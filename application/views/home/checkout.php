<div class="container mt-4">
	<div class="row">
		<div class="col-lg-12">

			<!-- Content Header (Page header) -->
			<section class="content-header">
			  <div class="container-fluid">
			    <div class="row mb-2">
			      <div class="col-sm-6">
			        <h1><?= $title; ?></h1>
			      </div>
			      <div class="col-sm-6">
			        <ol class="breadcrumb float-sm-right">
			          <li class="breadcrumb-item"><a href="#">Home</a></li>
			          <li class="breadcrumb-item active"><?= $title; ?></li>
			        </ol>
			      </div>
			    </div>
			  </div><!-- /.container-fluid -->
			</section>

			<section class="content">
			  <div class="container-fluid">
			    <div class="row">
			      <div class="col-12">

			        <!-- Main content -->
			        <div class="invoice p-3 mb-3">
			          <!-- title row -->
			          <div class="row">
			            <div class="col-12">
			              <h4>
			                <i class="fas fa-globe"></i> Checkout
			                <small class="float-right">Tanggal: <?= date('d-m-Y'); ?></small>
			              </h4>
			            </div>
			            <!-- /.col -->
			          </div>
			          <!-- info row -->
			          
			          <!-- /.row -->

			          <!-- Table row -->
			          <div class="row">
			            <div class="col-12 table-responsive">
			              <table class="table table-striped">
			                <thead>
			                <tr>
			                  <th>Qty</th>
			                  <th>Barang</th>
			                  <th>Harga</th>
			                  <th>Sub Total</th>
			                  <th>Berat</th>
			                </tr>
			                </thead>
			                <tbody>
			                <?php $i = 1; ?>
			                <?php $totalBerat = 0; ?>
			                <?php foreach ($this->cart->contents() as $items): ?>
			                  <?php 
			                  $this->load->model('Barang_m');
			                  $id = $items['id'];
			                  
			                  $barang = $this->Barang_m->get_where('barang', ['id_barang' => $id])->row();
			                  $berat = $items['qty'] * $barang->berat;
			                  $totalBerat = $totalBerat + $berat; 
			                  ?>
			                <tr>
			                	<td><?= $items['qty']; ?></td>
			                	<td><?= $items['name']; ?></td>
			                	<td><?= number_format($items['price'],0,',','.'); ?></td>
			                	<td><?= number_format($items['subtotal'],0,',','.'); ?></td>
			                	<td><?= $berat; ?> Gr</td>
			                </tr>
			                <?php endforeach; ?>
			                </tbody>
			              </table>
			            </div>
			            <!-- /.col -->
			          </div>
			          <!-- /.row -->

			          <?= form_open('belanja/checkout'); 
			          $no_order = date('Ymd') . strtoupper(random_string('alnum', 8));
			          // echo $no_order;
			          ?>
			          <div class="row">
			            <!-- accepted payments column -->
			            <div class="col-6">
			              <p class="lead">Tujuan :</p>
			              <div class="row">
			                <div class="col-lg-6">
			                  <div class="form-group">
			                    <label for="provinsi">Provinsi</label>
			                    <select name="provinsi" id="provinsi" class="form-control">
			                    </select>
			                    <small class="muted text-danger"><?= form_error('provinsi'); ?></small>
			                  </div>
			                  <div class="form-group">
			                    <label for="ekpedisi">Ekpedisi</label>
			                    <select name="ekpedisi" id="ekpedisi" class="form-control">
			                    </select>
			                    <small class="muted text-danger"><?= form_error('ekpedisi'); ?></small>
			                  </div>
			                </div>
			                <div class="col-lg-6">
			                  <div class="form-group">
			                    <label for="kota">Kota</label>
			                    <select name="kota" id="kota" class="form-control">
			                    </select>
			                    <small class="muted text-danger"><?= form_error('kota'); ?></small>
			                  </div>
			                  <div class="form-group">
			                    <label for="paket">Paket</label>
			                    <select name="paket" id="paket" class="form-control">
			                    </select>
			                    <small class="muted text-danger"><?= form_error('paket'); ?></small>
			                  </div>
			                </div>
			              </div>
			              <div class="row">
			              	<div class="col-lg-6">
			              		<div class="form-group">
			              			<label for="penerima">Nama Penerima</label>
			              			<input type="text" name="penerima" id="penerima" class="form-control">
			              			<small class="muted text-danger"><?= form_error('penerima'); ?></small>
			              		</div>
			              	</div>
			              	<div class="col-lg-4">
			              		<div class="form-group">
			              			<label for="no_hp">Nomor Hp</label>
			              			<input type="text" name="no_hp" id="no_hp" class="form-control">
			              			<small class="muted text-danger"><?= form_error('no_hp'); ?></small>
			              		</div>
			              	</div>
			              	<div class="col-lg-2">
			              		<div class="form-group">
			              			<label for="kode_pos">Kode Pos</label>
			              			<input type="text" name="kode_pos" id="kode_pos" class="form-control">
			              			<small class="muted text-danger"><?= form_error('kode_pos'); ?></small>
			              		</div>
			              	</div>
			              </div>
			              <div class="row">
			              	<div class="col-lg-12">
			              		<div class="form-group">
			              			<label for="alamat">Alamat</label>
			              			<textarea name="alamat" id="alamat" class="form-control"></textarea>
			              			<small class="muted text-danger"><?= form_error('alamat'); ?></small>
			              		</div>
			              	</div>
			              </div>
			            </div>
			            <!-- /.col -->
			            <div class="col-6">
			              <p class="lead">Amount Due 2/22/2014</p>

			              <div class="table-responsive">
			                <table class="table">
			                  <tr>
			                    <th style="width:50%">Grand Total:</th>
			                    <td>Rp.<?php echo number_format($this->cart->total(),0,',','.'); ?></td>
			                  </tr>
			                  <tr>
			                    <th>Berat</th>
			                    <td><?= $totalBerat; ?> Gram</td>
			                  </tr>
			                  <tr>
			                    <th>Ongkir</th>
			                    <td id="ongkir">0</td>
			                  </tr>
			                  <tr>
			                    <th>Total Bayar</th>
			                    <td id="total_bayar">0</td>
			                  </tr>
			                </table>
			              </div>
			            </div>
			            <!-- /.col -->
			          </div>
			          <!-- /.row -->

			          <!-- this row will not appear when printing -->
			          <input type="hidden" name="no_order" value="<?= $no_order; ?>">
			          <input type="hidden" name="estimasi">
			          <input type="hidden" name="ongkir">
			          <input type="hidden" name="berat" value="<?= $totalBerat; ?>">
			          <input type="hidden" name="grand_total" value="<?= $this->cart->total(); ?>">
			          <input type="hidden" name="total_bayar">

			          <!-- Rincian Transaksi -->
			          <?php 
			          $i = 1;
			          foreach($this->cart->contents() as $items) {
			          	echo form_hidden('qty'. $i++, $items['qty']);
			          }

			          ?>
			          <div class="row no-print">
			            <div class="col-12">
			              <a href="<?= base_url('belanja'); ?>" target="_blank" class="btn btn-default"><i class="fas fa-backward"></i> Keranjang Belanja</a>
			              <button type="submit" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
			                Payment
			              </button>
			            </div>
			          </div>
			          <?= form_close(); ?>
			        </div>
			        <!-- /.invoice -->
			      </div><!-- /.col -->
			    </div><!-- /.row -->
			  </div><!-- /.container-fluid -->
			</section>
			<!-- /.content -->
			
		</div>
	</div>
</div>

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
          // console.log(hasil_kota);
          $('#kota').html(hasil_kota);
        }
      });
    });

    $('#provinsi').change(function() {
    	$.ajax({
    	  url: 'http://localhost/olshop/admin/rajaongkir/ekpedisi',
    	  type: 'post',
    	  success: function(hasil_ekpedisi) {
    	    // console.log(hasil_ekpedisi);
    	    $('#ekpedisi').html(hasil_ekpedisi);
    	  }
    	});
    });

    $('#ekpedisi').change(function() {
    	// mendapatkan ekpedisi terpilih
    	var ekpedisi_terpilih = $('select[name=ekpedisi]').val();
    	// mendapatkan id kota terpilih
    	var id_kota_tujuan_terpilih = $('option:selected', 'select[name=kota]').attr('id_kota');
    	// mendapatkan data ongkos kirim
    	var total_berat = <?= $totalBerat ?>;
    	// alert(total_berat);
    	$.ajax({
    	  url: 'http://localhost/olshop/admin/rajaongkir/paket',
    	  type: 'post',
    	  data: 'ekpedisi=' + ekpedisi_terpilih + '&id_kota=' + id_kota_tujuan_terpilih + '&berat=' + total_berat,
    	  success: function(hasil_paket) {
    	    console.log(hasil_paket);
    	    $('#paket').html(hasil_paket);
    	  }
    	});
    });

    $('#paket').change(function() {
    	// menampilkan ongkir
    	var ongkir = $('option:selected', this).attr('ongkir');
    	// mengubah menjadi format rupiah
    	var reverse = ongkir.toString().split('').reverse().join(''),
    		ribuan_ongkir = reverse.match(/\d{1,3}/g);
    	ribuan_ongkir = ribuan_ongkir.join('.').split('').reverse().join('');

    	// alert(ongkir);
    	$('#ongkir').html('Rp.' + ribuan_ongkir);
    	// menghitung total bayar
    	var data_total_bayar = parseInt(ongkir) + parseInt(<?= $this->cart->total(); ?>);
    	// mengubah menjadi format rupiah
    	var reverse2 = data_total_bayar.toString().split('').reverse().join(''),
    		ribuan_total_bayar = reverse2.match(/\d{1,3}/g);
    	ribuan_total_bayar = ribuan_total_bayar.join('.').split('').reverse().join('');
    	$('#total_bayar').html('Rp.' + ribuan_total_bayar);

    	// estimasi, ongkir
    	var estimasi = $('option:selected', this).attr('estimasi');
    	$('input[name=estimasi]').val(estimasi + ' Hari');
    	$('input[name=ongkir]').val(ongkir);
    	$('input[name=total_bayar]').val(data_total_bayar);
    });
  });
</script>