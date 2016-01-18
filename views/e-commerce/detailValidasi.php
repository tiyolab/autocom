<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use app\models\ecommerceDataValidasi;

$dataValidasiModel = new ecommerceDataValidasi();
$detailValidasi = $dataValidasiModel->findDetailValidasi(Yii::$app->request->get()['id']);
$this->title = 'Data Validasi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-md-12">
    <div class="widget widget-green">
        <div class="widget-title">
            <div class="widget-controls">
				<a href="#" class="widget-control widget-control-full-screen" data-toggle="tooltip" data-placement="top" title="" data-original-title="Full Screen"><i class="fa fa-expand"></i></a>
				<a href="#" class="widget-control widget-control-full-screen widget-control-show-when-full" data-toggle="tooltip" data-placement="left" title="" data-original-title="Exit Full Screen"><i class="fa fa-expand"></i></a>
				<a href="#" class="widget-control widget-control-refresh" data-toggle="tooltip" data-placement="top" title="" data-original-title="Refresh"><i class="fa fa-refresh"></i></a>
				<a href="#" class="widget-control widget-control-minimize" data-toggle="tooltip" data-placement="top" title="" data-original-title="Minimize"><i class="fa fa-minus-circle"></i></a>
			</div>
            <h3><i class="fa fa-ok-circle"></i><?= Html::encode($this->title) ?></h3>
        </div>
			<div class="widget-content">
				<div class="row">
					<div class="col-md-12">
						<table class="table">
							<tbody>
						
							<?php $i=1; foreach ( $detailValidasi as $key => $value) { ?>
							<tr>
								<th>Order ID</th>
								<th>:</th>
								<td><?=$value['order_id']?></td>
							</tr>
							<tr>
								<th>Customer ID</th>
								<th>:</th>
								<td><?=$value['customers_id']?></td>
							</tr>
							<tr>
								<th>Date Order</th>
								<th>:</th>
								<td><?=$value['date_order_placed']?></td>
							</tr>
							<tr>
								<th>Shipping Adress</th>
								<th>:</th>
								<td><?=$value['shipping_address']?></td>
							</tr>
							<tr>
								<th>Shipping Zip Code</th>
								<th>:</th>
								<td><?=$value['shipping_zip_code']?></td>
							</tr>
							<tr>
								<th>Shipping City</th>
								<th>:</th>
								<td><?=$value['shipping_city']?></td>
							</tr>
							<tr>
								<th>Shipping Province</th>
								<th>:</th>
								<td><?=$value['shipping_province']?></td>
							</tr>
							<tr>
								<th>Shipping Country</th>
								<th>:</th>
								<td><?=$value['shipping_country']?></td>
							</tr>
							<tr>
								<th>Shipping_Phone</th>
								<th>:</th>
								<td><?=$value['shipping_phone']?></td>
							</tr>
							
						<?php $i++; } ?>
					</tbody>
					<td>
						<?= Html::a("Back",Yii::$app->urlManager->createUrl(['e-commerce/data']))?> 
					</td>
						</table>
					</div>
				</div>
			</div>
	</div>
</div>	
