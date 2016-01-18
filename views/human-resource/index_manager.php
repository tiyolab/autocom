<?php

function DateToIndo($date) {
		$BulanIndo = array("Januari", "Februari", "Maret",
						   "April", "Mei", "Juni",
						   "Juli", "Agustus", "September",
						   "Oktober", "November", "Desember");
	
		$tahun = substr($date, 0, 4);
		$bulan = substr($date, 5, 2);
		$tgl   = substr($date, 8, 2);
		
		$result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;
		return($result);
}

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

use app\models\HrdManager;

$HrdManager = new HrdManager();
$this->title = 'Data Manager';
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
					['label' => 'Data Manager ', 'url' => [Yii::$app->urlManager->createUrl(['../../human-resource/manager'])]],
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
						<a href="<?= Yii::$app->urlManager->createUrl(['human-resource/create-manager'])?>" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-plus"></i></a>
						<table class="table">
							<thead>
								<tr>
									<th>No</th>
									<th>NIP</th>
									<th width="150px">Nama Lengkap</th>
									<th>Nama Departemen</th>
									<th>Tanggal Dilantik</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php $i=1; foreach ( $HrdManager->findManager() as $key => $value) { ?>
									<tr>
										<td><?=$i?></td>
										<td><?=$value['nip']?></td>
										<td><?=$value['nama_lengkap']?></td>
										<td><?=$value['nama_departement']?></td>
										<td><?=DateToIndo($value['tgl_lantik'])?></td>
										<td>
											<a href="<?= Yii::$app->urlManager->createUrl(['human-resource/update-manager',"id"=>$value['id_manager']])?>" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-pencil"></i></a>
											
											<a href="<?= Yii::$app->urlManager->createUrl(['human-resource/delete-manager',"id"=>$value['id_manager']])?>" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash"></i></a>
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