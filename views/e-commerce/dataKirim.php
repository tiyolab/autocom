<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

use app\models\ecommerceDataKirim;

$dataKirimModel = new ecommerceDataKirim();

$this->title = 'Transaksi & Pengiriman';
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
									<th>Id Order</th>
									<th>Kode Pengiriman</th>
									<th>Tgl Pengiriman</th>
									<th>Tgl Terima</th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody>
						<?php $i=1; foreach ( $dataKirimModel->findDataKirim() as $key => $value) { ?>
							<tr>
								<td><?=$i?></td>
								<td><?=$value['id_order']?></td>
								<td><?=$value['kode']?></td>
								<td><?=$value['tgl_pengiriman']?></td>
								<td><?=$value['tgl_terima']?></td>
								<?php
								if($value['status_pengiriman']=='0'){
									$status = "Pending";
								}else if($value['status_pengiriman']=='1'){
									$status = "Proses Pengiriman";
								}else{
									$status = "Telah diterima";
								}?>
								<td><?php echo $status;?></td>
								<td>
									<?= Html::a("detail order",Yii::$app->urlManager->createUrl(['e-commerce/detail_order',"id"=>$value['id_order']]), [])?> | 
									<?= Html::a("invoice", Yii::$app->urlManager->createUrl(['e-commerce/invoice',"id"=>$value['id_order']]),[])?>
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
