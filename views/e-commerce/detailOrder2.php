<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use app\models\ecommerceDataPesan;

$dataPesanModel = new ecommerceDataPesan();
$id = Yii::$app->request->get()['id'];
$detailOrder = $dataPesanModel->findDetailOrder($id);
$itemOrder = $dataPesanModel->findItemOrder($id);
$this->title = 'Detail Order #'.$id;
$this->params['breadcrumbs'][] = $this->title;
?>
    <ol class="breadcrumb">
  <li><a href="#">Home</a></li>
  <li><a href="#">Bread</a></li>
  <li class="active">Detail Oreder #<?=$id?></li>
</ol>
    <div class="order-details">
      <div class="row">
        <div class="col-sm-8">
          <h1 class="page-title page-title-hard-bordered">
            <i class="fa fa-file-text-o"></i>
            Order #<?=$id?>
			
			<?php $i=1; foreach ( $detailOrder as $key => $value) { ?>
			<?php
								if($value['order_status_code']=='0'){
									$status = "belum dibayar";
								}else if($value['order_status_code']=='1'){
									$status = "sudah dibayar";
								}else{
									$status = "telah diproses";
								}?>
            <span class="title-price"><?=$value['total_price']?></span>
          </h1>
          <h4 class="section-title">Order Information</h4>
          <ul class="order-info-list">
            <li><i class="fa fa-calendar"></i> <strong>Tanggal: </strong> <?=$value['date_order_placed']?></li>
            <li><i class="fa fa-money"></i> <strong>Status order: </strong><?php echo $status;?></li>
            <li><i class="fa fa-clock-o"></i> <strong>Alamat pengiriman: </strong><?=$value['shipping_address']?> <?=$value['shipping_zip_code']?>, <?=$value['shipping_city']?>, <?=$value['shipping_province']?>, <?=$value['shipping_country']?></li>
			
		  </ul>
          <h4 class="section-title">Customer Information</h4>
          <ul class="order-info-list">
            <li><i class="fa fa-user"></i> <strong>Nama: </strong><a href="#"><?=$value['first_name']?> <?=$value['middle_name']?> <?=$value['last_name']?> <i class="fa fa-external-link-square"></i></a></li>
			<li><i class="fa fa-map-marker"></i> <strong>Organisasi: </strong><?=$value['organization_name']?></li>
            <li><i class="fa fa-money"></i> <strong>Nama Login: </strong><?=$value['login_name']?></li>
            <li><i class="fa fa-phone"></i> <strong>Telpon: </strong><?=$value['shipping_phone']?></li>
            <li><i class="fa fa-map-marker"></i> <strong>email_address: </strong><?=$value['email_address']?></li>
            
          </ul>
        </div>
        <div class="col-sm-4">
          <div class="merchant-info">
            <a href="#" class="top-right-control-link"><i class="fa fa-pencil-square-o"></i></a>
            <h3>Autocom Inc.s</h3>
            <p>
              jl Raya ITSSukolilo, Surabaya 61110, Indonesia<br>
              Phone: <strong>086 666 888 999</strong><br>
              Email: <strong>tiyo@autocom.com</strong>
            </p>
          </div>
          <div class="map-label"><i class="fa fa-map-marker"></i> Customer Location</div>
          
        </div>
      </div>
	  <?php 
	  $TP=$value['shipping_price'];
	  $i++; } ?>
	  
      <div class="row bottom-margin">
        <div class="col-sm-12">
          <h4 class="section-title">Ordered Items</h4>
          <table class="table table-bordered table-striped cart-contents-table">
            <thead>
              <tr>
              <th>Nama barang</th>
			  <th class="text-right">Harga Satuan</th>
              <th class="text-right">Jumlah Barang</th>
              <th class="text-right">Harga</th>
              </tr>
            </thead>
            <tbody>
			<?php 
			$i=1; $total=0;
			foreach ( $itemOrder as $key => $value) {
				 $total+=$value['Harga_Satuan']*$value['order_item_quantity'];
				echo ' 
			  <tr>
                <td>
                  <div class="item-name">'.$value['Nama_Barang'].'</div>
                </td>
                <td class="text-right">'.$value['Harga_Satuan'].'</td>
                <td class="text-right">'.$value['order_item_quantity'].'</td>
                <td class="text-right">'.$value['Harga_Satuan']*$value['order_item_quantity'].'</td>
              </tr>';
			
			$i++; } ?>
             
              <tr>
                <td colspan="3" class="text-right">Subtotal:</td>
                <td colspan="3" class="text-right"><?=$total?></td>
              </tr>
              <tr>
                <td colspan="3" class="text-right">Ongkos Kirim:</td>
                <td colspan="3" class="text-right"><?=$TP?></td>
              </tr>
              <tr>
                <td colspan="3" class="text-right grand-total-label">Grand Total:</td>
                <td colspan="3" class="text-right grand-total-value"><?=$TP+$total?></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      
  </div>
