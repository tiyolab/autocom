<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

use app\models\HrdDepartement;

$HrdDepartement = new HrdDepartement();
$detaiDepartement = $HrdDepartement->findDepartementWithDetail(Yii::$app->request->get()['id']);
$this->title = 'Detail data departemen : '.$detaiDepartement[0]['nama_departement'];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="side">
	<div class="sub-sidebar-wrapper">
	  <ul class="nav">
		<?php
			echo Nav::widget([
					'items' => [
					['label' => 'Data Pribadi Pegawai', 'url' => [Yii::$app->urlManager->createUrl(['../../human-resource/profil'])]],
					['label' => 'Data Penempatan Pegawai', 'url' => [Yii::$app->urlManager->createUrl(['../../human-resource/posisi'])]],
					['label' => 'Data Departemen Perusahaan', 'url' => [Yii::$app->urlManager->createUrl(['../../human-resource/departement'])]],
					['label' => 'Data Prestasi Pegawai', 'url' => [Yii::$app->urlManager->createUrl(['../../human-resource/prestasi'])]],
				],
			]);
		?>
	  </ul>
	</div>
</div>
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
							<?php $i=1; foreach ( $detaiDepartement as $key => $value) { ?>
								<tr>
									<td><strong>Nama Departemen</strong></td>
									<td width="100px"></td>
									<td>:</td>
									<td><?=$value['nama_departement']?></td>
								</tr>
								<tr>
									<td><strong>NIP Manager</strong></td>
									<td width="100px"></td>
									<td>:</td>
									<td><?=$value['nip']?></td>
								</tr>
								<tr>
									<td><strong>Manager</strong></td>
									<td width="100px"></td>
									<td>:</td>
									<td><?=$value['nama_lengkap']?></td>
								</tr>
								<tr>
									<td><strong>Kodepos</strong></td>
									<td width="100px"></td>
									<td>:</td>
									<td><?=$value['kodepos']?></td>
								</tr>
								<tr>
									<td><strong>Alamat</strong></td>
									<td width="100px"></td>
									<td>:</td>
									<td><?=$value['jalan']?></td>
								</tr>
								<tr>
									<td><strong>Kecamatan</strong></td>
									<td width="100px"></td>
									<td>:</td>
									<td><?=$value['kecamatan']?></td>
								</tr>
								<tr>
									<td><strong>Kabupaten</strong></td>
									<td width="100px"></td>
									<td>:</td>
									<td><?=$value['kabupaten']?></td>
								</tr>
								<tr>
									<td><strong>Provinsi</strong></td>
									<td width="100px"></td>
									<td>:</td>
									<td><?=$value['propinsi']?></td>
								</tr>
							<?php $i++; }?>
						</thead>
						</table>	
						<a href="<?= Yii::$app->urlManager->createUrl(['human-resource/departement'])?>" class="btn btn-primary btn-sm">Back</a>				
					</div>
				</div>
			</div>
	</div>
</div>	