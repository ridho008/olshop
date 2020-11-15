<div class="container mt-4">
	<div class="row">
		<div class="col-lg-12">

			<!-- Content Header (Page header) -->
			<section class="content-header">
			  <div class="container-fluid">
			    <div class="row mb-2">
			      <div class="col-sm-6">
			        <h1>Invoice</h1>
			      </div>
			      <div class="col-sm-6">
			        <ol class="breadcrumb float-sm-right">
			          <li class="breadcrumb-item"><a href="#">Home</a></li>
			          <li class="breadcrumb-item active">Invoice</li>
			        </ol>
			      </div>
			    </div>
			  </div><!-- /.container-fluid -->
			</section>

			<section class="content">
			  <div class="container-fluid">
			    <div class="row">
			      <div class="col-12">
			        <div class="callout callout-info">
			          <h5><i class="fas fa-info"></i> Note:</h5>
			          This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
			        </div>


			        <!-- Main content -->
			        <div class="invoice p-3 mb-3">
			          <!-- title row -->
			          <div class="row">
			            <div class="col-12">
			              <h4>
			                <i class="fas fa-globe"></i> AdminLTE, Inc.
			                <small class="float-right">Date: 2/10/2014</small>
			              </h4>
			            </div>
			            <!-- /.col -->
			          </div>
			          <!-- info row -->
			          <div class="row invoice-info">
			            <div class="col-sm-4 invoice-col">
			              From
			              <address>
			                <strong>Admin, Inc.</strong><br>
			                795 Folsom Ave, Suite 600<br>
			                San Francisco, CA 94107<br>
			                Phone: (804) 123-5432<br>
			                Email: info@almasaeedstudio.com
			              </address>
			            </div>
			            <!-- /.col -->
			            <div class="col-sm-4 invoice-col">
			              To
			              <address>
			                <strong>John Doe</strong><br>
			                795 Folsom Ave, Suite 600<br>
			                San Francisco, CA 94107<br>
			                Phone: (555) 539-1037<br>
			                Email: john.doe@example.com
			              </address>
			            </div>
			            <!-- /.col -->
			            <div class="col-sm-4 invoice-col">
			              <b>Invoice #007612</b><br>
			              <br>
			              <b>Order ID:</b> 4F3S8J<br>
			              <b>Payment Due:</b> 2/22/2014<br>
			              <b>Account:</b> 968-34567
			            </div>
			            <!-- /.col -->
			          </div>
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
			                  </div>
			                  <div class="form-group">
			                    <label for="ekpedisi">Ekpedisi</label>
			                    <select name="ekpedisi" id="ekpedisi" class="form-control">
			                    </select>
			                  </div>
			                </div>
			                <div class="col-lg-6">
			                  <div class="form-group">
			                    <label for="kota">Kota</label>
			                    <select name="kota" id="kota" class="form-control">
			                    </select>
			                  </div>
			                  <div class="form-group">
			                    <label for="paket">Paket</label>
			                    <select name="paket" id="paket" class="form-control">
			                    </select>
			                  </div>
			                </div>
			              </div>
			              <div class="row">
			              	<div class="col-lg-12">
			              		<div class="form-group">
			              			<label for="alamat">Alamat</label>
			              			<textarea name="alamat" id="alamat" class="form-control"></textarea>
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
			                    <th style="width:50%">Subtotal:</th>
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
			          <div class="row no-print">
			            <div class="col-12">
			              <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
			              <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
			                Payment
			              </button>
			              <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
			                <i class="fas fa-download"></i> Generate PDF
			              </button>
			            </div>
			          </div>
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
    	var reverse = ongkir.toString().split('').reverse().join(''),
    		ribuan_ongkir = reverse.match(/\d{1,3}/g);
    	ribuan_ongkir = ribuan_ongkir.join('.').split('').reverse().join('');

    	// alert(ongkir);
    	$('#ongkir').html('Rp.' + ribuan_ongkir);
    	// menghitung total bayar
    	var data_total_bayar = parseInt(ongkir) + parseInt(<?= $this->cart->total(); ?>);
    	var reverse2 = data_total_bayar.toString().split('').reverse().join(''),
    		ribuan_total_bayar = reverse2.match(/\d{1,3}/g);
    	ribuan_total_bayar = ribuan_total_bayar.join('.').split('').reverse().join('');
    	$('#total_bayar').html('Rp.' + ribuan_total_bayar);
    });
  });
</script>