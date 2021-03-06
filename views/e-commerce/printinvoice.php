<?php

use app\models\ecommercePesan;
use app\models\ecommerceDataPesan;

$dataPesanModel = new ecommerceDataPesan();
$id = Yii::$app->request->get()['id'];
$detailOrder = $dataPesanModel->findDetailOrder($id);
$itemOrder = $dataPesanModel->findItemOrder($id);
$this->title = 'Invoice #'.$id;

?>
 <div class="invoice-w">
      <div class="white-paper">
        <div class="invoice-header">
          <div class="row">
            <div class="col-sm-6">
              <div class="invoice-logo">
                <i class="fa fa-rocket"></i>
              </div>
            </div>
            <div class="col-sm-6">
                <div class="invoice-date-w">
                  <div class="invoice-date">April 5th, 2013</div>
                  <div class="invoice-number">Invoice #<?=$id;?></div>
                </div>
            </div>
          </div>
        </div>
        <div class="invoice-header">
        <div class="row">
          <div class="col-sm-7">
            <div class="invoice-company">
              <div class="ic-name">Autocom Inc.</div>
              <div class="ic-address">jl Raya ITS<br/>Sukolilo, Surabaya 61110<br/>Indonesia</div>
              <ul class="ic-more-info hidden-xs">
                <li><i class="fa fa-male"></i> M.Sulistiyo</li>
                <li><i class="fa fa-envelope-o"></i> tiyo@autocom.com</li>
                <li><i class="fa fa-phone"></i> 086 666 888 999</li>
              </ul>
            </div>
          </div>
          <div class="col-sm-5">
            <div class="invoice-client">
			<?php $i=1; foreach ( $detailOrder as $key => $value) { ?>
              <div class="icl-name">Pemesan: <strong><?=$value['first_name']?> <?=$value['middle_name']?> <?=$value['last_name']?></strong></div>
              <div class="icl-address">
                <?=$value['shipping_address']?><br/><?=$value['shipping_city']?>,<?=$value['shipping_province']?> <?=$value['shipping_zip_code']?><br/><?=$value['shipping_country']?><br/> Phone : <?=$value['shipping_phone']?>
              </div>
            </div>
            <div class="invoice-total-top">
              <div class="label">Total</div>
              <div class="value"><?=$value['total_price']?></div>
            </div>
			<?php 
			$ongkir = $value['shipping_price'];
			$TP=$value['total_price'];;
			$i++; } ?>
          </div>
        </div>
        </div>
        <div class="table-responsive">
        <table class="table invoice-table">
          <thead>
            <tr>
              <th class="text-center">Nama barang</th>
			  <th class="text-center">Harga Satuan</th>
              <th class="text-center">Jumlah Barang</th>
              <th class="text-right">Harga</th>
            </tr>
          </thead>
          <tbody>
		  <?php
		  $total=0;
		  $i=1; foreach ( $itemOrder as $key => $value) { 
		  $total+=$value['Harga_Satuan']*$value['order_item_quantity'];
			echo '<tr>
              <td>
                <div class="ii-name">'.$value['Nama_Barang'].'</div>
              </td>
              <td class="text-center">'.$value['Harga_Satuan'].'</td>
              <td class="text-center">'.$value['order_item_quantity'].'</td>
              <td class="text-right"><strong>'.$value['Harga_Satuan']*$value['order_item_quantity'].'</strong></td>
            </tr>';
		   $i++; } ?>
           
          </tbody>
          <tfoot>
            <tr>
              <td colspan="3" class="text-right">Subtotal:</td>
              <td class="text-right"><strong><?=$total;?></strong></td>
            </tr>
			<tr>
              <td colspan="3" class="text-right">Ongkos Kirim:</td>
              <td class="text-right"><strong class="label label-success"><?php echo $ongkir;?></strong></td>
            </tr>
          </tfoot>
        </table>
        </div>
        <div class="row">
          <div class="col-sm-5 col-sm-offset-7">
            <div class="invoice-total-top invoice-inline-total">
              <span class="label">Total:</span>
              <span class="value"><?=$TP+$ongkir;?></span>
            </div>
          </div>
        </div>

        <div class="invoice-payment-info">
          <strong>Disclaimer:</strong> Efficiently unleash cross-media information without cross-media value. Quickly maximize timely deliverables for real-time schemas. Dramatically maintain clicks-and-mortar solutions without functional solutions. Completely synergize resource sucking relationships via premier niche markets. Professionally cultivate one-to-one customer service with robust ideas. Dynamically innovate resource-leveling customer service for state of the art customer service.
        </div>
      </div>
    </div>