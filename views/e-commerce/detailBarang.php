<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use app\models\ecommerceDataBarang;

$dataBarangModel = new ecommerceDataBarang();
$detailBarang = $dataBarangModel->findDetailBarang(Yii::$app->request->get()['id']);

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
							
							<tbody>
							<?php $i=1; foreach ( $detailBarang as $key => $value) { ?>
							<tr>
								<th>ID</th>
								<th>:</th>
								<td><?=$value['ID']?></td>
							</tr>
							<tr>
								<th>Kode Barang</th>
								<th>:</th>
								<td><?=$value['Kode_Barang']?></td>
							</tr>
							<tr>
								<th>Nama Barang</th>
								<th>:</th>
								<td><?=$value['Nama_Barang']?></td>
							</tr>
							<tr>
								<th>Jenis Barang</th>
								<th>:</th>
								<td><?=$value['Jenis_Barang']?></td>
							</tr>
							<tr>
								<th>ID Kemasan</th>
								<th>:</th>
								<td><?=$value['Kemasan_ID']?></td>
							</tr>
							<tr>
								<th>ID Blok</th>
								<th>:</th>
								<td><?=$value['Blok_ID']?></td>
							</tr>
							<tr>
								<th>Kadaluarsa</th>
								<th>:</th>
								<td><?=$value['Kadaluarsa']?></td>
							</tr>
							<tr>
								<th>Status</th>
								<th>:</th>
								<td><?=$value['Status']?></td>
							</tr>
							<tr>
								<th>Harga Satuan</th>
								<th>:</th>
								<td><?=$value['Harga_Satuan']?></td>
							</tr>
							<tr>
								<th>Stock</th>
								<th>:</th>
								<td><?=$value['Stock']?></td>
							</tr>
							<tr>
								<th>Gambar</th>
								<th>:</th>
								<td><img width="30%" height="30%" src="/autocomv1<?=$value['Gambar']?>"></td>
							</tr>
						<?php $i++; } ?>
						
					</tbody>
					
					<td>
						<?= Html::a("Back",Yii::$app->urlManager->createUrl(['e-commerce/data_barang']))?> 
					</td>
						</table>
					</div>
				</div>
			</div>
	</div>
</div>	
