<div class="container">
  <div class="row mt-5">
    <div class="col-lg-12">
    <h3>Keranjang Belanja</h3>
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
                    <th style="text-align:center;"><i class="fas fa-cogs"></i></th>
                  </tr>

                <?php $i = 1; ?>

                <?php foreach ($this->cart->contents() as $items): ?>
                  <tr>
                    <td><?php echo form_input(array('name' => $i.'[qty]', 'value' => $items['qty'], 'maxlength' => '3', 'size' => '5', 'type' => 'number', 'min' => '1', 'class' => 'form-control')); ?></td>
                    <td><?php echo $items['name']; ?></td>
                    <td style="text-align:right">Rp.<?php echo $this->cart->format_number($items['price']); ?></td>
                    <td style="text-align:right">Rp.<?php echo $this->cart->format_number($items['subtotal']); ?></td>
                    <td class="text-center">
                      <a href="" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                    </td>
                  </tr>

                <?php $i++; ?>

                <?php endforeach; ?>


                  <tr>
                    <td colspan="2"> </td>
                    <td class="right"><strong>Total</strong></td>
                    <td class="right">Rp.<?php echo $this->cart->format_number($this->cart->total()); ?></td>
                  </tr>

                </table>
              </div>

              <!-- <p><?php echo form_submit('', 'Update your Cart'); ?></p> -->

              <div class="row">
                <div class="col-lg-2 offset-lg-8">
                  <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Update Keranjang</button>
                </div>
                <div class="col-lg-2">
                  <a href="" class="btn btn-success"><i class="fas fa-check"></i> Checkout</a>
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