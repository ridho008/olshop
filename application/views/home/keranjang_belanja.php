<div class="container">
  <div class="row mt-5">
    <div class="col-lg-12">
    <h3>Keranjang Belanja</h3>
    <?= $this->session->flashdata('pesan'); ?>
      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body">
          <div class="row">
            <div class="col-lg-12">
              
              <?php echo form_open('belanja/update'); ?>

              <div class="table-responsive">
                <table class="table table-bordered table-striped">
                  <tr>
                    <th width="100px">QTY</th>
                    <th>Nama Barang</th>
                    <th style="text-align:right">Harga</th>
                    <th style="text-align:right">Sub-Total</th>
                    <th style="text-align:center;">Berat</th>
                    <th style="text-align:center;"><i class="fas fa-cogs"></i></th>
                  </tr>

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
                    <td><?php echo form_input(array('name' => $i.'[qty]', 'value' => $items['qty'], 'maxlength' => '3', 'size' => '5', 'type' => 'number', 'min' => '0', 'class' => 'form-control')); ?></td>
                    <td><?php echo $items['name']; ?></td>
                    <td style="text-align:right">Rp.<?php echo number_format($items['price'],0,',','.'); ?></td>
                    <td style="text-align:right">Rp.<?php echo number_format($items['subtotal'],0,',','.'); ?></td>
                    <td class="text-center"><?= $berat; ?> Gram</td>
                    <td class="text-center">
                      <a href="<?= base_url('belanja/delete/' . $items['rowid']); ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                    </td>
                  </tr>

                <?php $i++; ?>

                <?php endforeach; ?>


                  <tr>
                    <td colspan="2"> </td>
                    <td class="right"><strong>Total</strong></td>
                    <td class="right"><strong>Rp.<?php echo number_format($this->cart->total(),0,',','.'); ?></strong></td>
                    <td colspan="2"><strong>Total Berat <?= $totalBerat; ?> Gram</strong></td>
                  </tr>

                </table>
              </div>

              <!-- <p><?php echo form_submit('', 'Update your Cart'); ?></p> -->

              <div class="row">
                <div class="col-lg-2 offset-lg-6">
                  <a href="<?= base_url('belanja/delall') ?>" class="btn btn-danger"><i class="fas fa-recycle"></i> Clear Cart</a>
                </div>
                <div class="col-lg-2">
                  <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Update Keranjang</button>
                </div>
                <div class="col-lg-2">
                  <a href="<?= base_url('belanja/checkout'); ?>" class="btn btn-success"><i class="fas fa-check"></i> Checkout</a>
                </div>
              </div>
            <?php form_close(); ?>
            </div>
          </div>
          
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
</div>