<div class="container">
  <div class="row mt-5">
    <div class="col-lg-12">
      <h3>Pesanan Saya</h3>
      <?= $this->session->flashdata('pesan'); ?>
    </div>
  </div>
  <div class="col-lg-12 col-sm-6">
    <div class="card card-primary card-outline card-outline-tabs">
      <div class="card-header p-0 border-bottom-0">
        <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="custom-tabs-four-belum-bayar-tab" data-toggle="pill" href="#custom-tabs-four-belum-bayar" role="tab" aria-controls="custom-tabs-four-belum-bayar" aria-selected="true">Order</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="custom-tabs-four-proses-tab" data-toggle="pill" href="#custom-tabs-four-proses" role="tab" aria-controls="custom-tabs-four-proses" aria-selected="false">Proses</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="custom-tabs-four-dikirim-tab" data-toggle="pill" href="#custom-tabs-four-dikirim" role="tab" aria-controls="custom-tabs-four-dikirim" aria-selected="false">Dikirim</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="custom-tabs-four-selesai-tab" data-toggle="pill" href="#custom-tabs-four-selesai" role="tab" aria-controls="custom-tabs-four-selesai" aria-selected="false">Selesai</a>
          </li>
        </ul>
      </div>
      <div class="card-body">
        <div class="tab-content" id="custom-tabs-four-tabContent">
          <div class="tab-pane fade show active" id="custom-tabs-four-belum-bayar" role="tabpanel" aria-labelledby="custom-tabs-four-belum-bayar-tab">
             <div class="table-responsive">
             	<table class="table">
             		<tr>
             			<th>No.Order</th>
             			<th>Tanggal Order</th>
             			<th>Ekpedisi</th>
             			<th>Total Bayar</th>
             			<th><i class="fas fa-cogs"></i></th>
             		</tr>
             		<?php foreach($belum_bayar as $bb) : ?>
                <tr>
                	<td><?= $bb->no_order; ?></td>
                	<td><?= date('d-m-Y', strtotime($bb->tgl_order)); ?></td>
                	<td><?= strtoupper($bb->ekpedisi) . '/' . $bb->paket . '/' . $bb->ongkir; ?></td>
                	<td>Rp.<?= number_format($bb->total_bayar,0 , ',', '.'); ?> <br>
                		<?php if($bb->status_bayar == 0) : ?>
                		<span class="badge badge-info">Belum Bayar</span>
                		<?php else: ?>
                			<span class="badge badge-success">Menunggu Konfirmasi</span>
                		<?php endif; ?>
                	</td>
                	<td>
                		<?php if($bb->status_bayar == 0) : ?>
                		<a href="<?= base_url('belanja/bayar/' . $bb->id_transaksi); ?>" class="btn btn-success btn-sm">Bayar</a>
                	<?php endif; ?>
                	</td>
                </tr>
             		<?php endforeach; ?>
             	</table>
             </div>
          </div>
          <div class="tab-pane fade" id="custom-tabs-four-proses" role="tabpanel" aria-labelledby="custom-tabs-four-proses-tab">
             Mauris tincidunt mi at erat gravida, eget tristique urna bibendum. Mauris pharetra purus ut ligula tempor, et vulputate metus facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Maecenas sollicitudin, nisi a luctus interdum, nisl ligula placerat mi, quis posuere purus ligula eu lectus. Donec nunc tellus, elementum sit amet ultricies at, posuere nec nunc. Nunc euismod pellentesque diam. 
          </div>
          <div class="tab-pane fade" id="custom-tabs-four-dikirim" role="tabpanel" aria-labelledby="custom-tabs-four-dikirim-tab">
             Morbi turpis dolor, vulputate vitae felis non, tincidunt congue mauris. Phasellus volutpat augue id mi placerat mollis. Vivamus faucibus eu massa eget condimentum. Fusce nec hendrerit sem, ac tristique nulla. Integer vestibulum orci odio. Cras nec augue ipsum. Suspendisse ut velit condimentum, mattis urna a, malesuada nunc. Curabitur eleifend facilisis velit finibus tristique. Nam vulputate, eros non luctus efficitur, ipsum odio volutpat massa, sit amet sollicitudin est libero sed ipsum. Nulla lacinia, ex vitae gravida fermentum, lectus ipsum gravida arcu, id fermentum metus arcu vel metus. Curabitur eget sem eu risus tincidunt eleifend ac ornare magna. 
          </div>
          <div class="tab-pane fade" id="custom-tabs-four-selesai" role="tabpanel" aria-labelledby="custom-tabs-four-selesai-tab">
             Pellentesque vestibulum commodo nibh nec blandit. Maecenas neque magna, iaculis tempus turpis ac, ornare sodales tellus. Mauris eget blandit dolor. Quisque tincidunt venenatis vulputate. Morbi euismod molestie tristique. Vestibulum consectetur dolor a vestibulum pharetra. Donec interdum placerat urna nec pharetra. Etiam eget dapibus orci, eget aliquet urna. Nunc at consequat diam. Nunc et felis ut nisl commodo dignissim. In hac habitasse platea dictumst. Praesent imperdiet accumsan ex sit amet facilisis. 
          </div>
        </div>
      </div>
      <!-- /.card -->
    </div>
  </div>
</div>