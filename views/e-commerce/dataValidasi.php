<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\ActiveForm;

use app\models\ecommerceDataValidasi;

$dataValidasiModel = new ecommerceDataValidasi();

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
							<thead>
								<tr>
									<th>No</th>
									<th>Order ID</th>
									<th>Customer ID</th>
									<th>Bukti</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
						<?php $i=1; foreach ( $dataValidasiModel->findDataValidasi() as $key => $value) { ?>
							<tr>
								<td><?=$i?></td>
								<td><?=$value['order_id']?></td>
								<td><?=$value['customers_id']?></td>
								<td><img width="350" height="350" src="data:image/jpeg;base64,<?=base64_encode( $value['bukti_bayar'] )?>"></td>
								<td>
									<?= Html::a("Validasi", Yii::$app->urlManager->createUrl(['e-commerce/validate-order',"id"=>$value['order_id'],"sp"=>$value['shipping_price']]),[])?> | 
									<?= Html::a("Detail",Yii::$app->urlManager->createUrl(['e-commerce/detail_order',"id"=>$value['order_id']]), [])?> 
									
								</td>
							</tr>
						<?php $i++; } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
	</div>
</div>	
