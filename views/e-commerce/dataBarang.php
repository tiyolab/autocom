<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

use app\models\ecommerceDataBarang;

$dataBarangModel = new ecommerceDataBarang();

$this->title = 'Data Barang';
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
									<th>ID</th>
									<th>Kode Barang</th>
									<th>Nama Barang</th>
									<th>Jenis Barang</th>
									<th>Kadaluarsa</th>
									<th>Harga Satuan</th>
									<th>Stock</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
						<?php $i=1; foreach ( $dataBarangModel->findDataBarang() as $key => $value) { ?>
							<tr>
								<td><?=$i?></td>
								<td><?=$value['ID']?></td>
								<td><?=$value['Kode_Barang']?></td>
								<td><?=$value['Nama_Barang']?></td>
								<td><?=$value['Jenis_Barang']?></td>
								<td><?=$value['Kadaluarsa']?></td>
								<td><?=$value['Harga_Satuan']?></td>
								<td><?=$value['Stock']?></td>
								<td>
									<?= Html::a("detail",Yii::$app->urlManager->createUrl(['e-commerce/detail_barang',"id"=>$value['Kode_Barang']]), [])?>
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
