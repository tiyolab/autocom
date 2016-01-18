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

use app\models\HrdAktivitas;

$HrdAktivitas = new HrdAktivitas();

$this->title = 'Data Aktivitas Pegawai';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="side">
	<div class="sub-sidebar-wrapper">
	  <ul class="nav">
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
						<a href="<?= Yii::$app->urlManager->createUrl(['human-resource/create-aktivitas'])?>" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-plus"></i></a>
						<table class="table">
							<thead>
								<tr>
									<th>No</th>
									<th>NIP</th>
									<th width="150px">Nama Lengkap</th>
									<th>Jabatan</th>
									<th>Tingkat Jabatan</th>
									<th>Aktivitas</th>
									<th>Hasil Aktivitas</th>
									<th>Tanggal Aktivitas</th>
									<th width="100px">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php $i=1; foreach ( $HrdAktivitas->findAktivitas() as $key => $value) { ?>
									<tr>
										<td><?=$i?></td>
										<td><?=$value['nip']?></td>
										<td><?=$value['nama_lengkap']?></td>
										<td><?=$value['jabatan']?></td>
										<td><?=$value['tingkatan']?></td>
										<td><?=$value['aktivitas']?></td>
										<td><?=$value['hasil_aktivitas']?></td>
										<td><?=DateToIndo($value['tanggal'])?></td>
										<td>
											<a href="<?= Yii::$app->urlManager->createUrl(['human-resource/update-aktivitas',"id"=>$value['id_aktivitas']])?>" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-pencil"></i></a>
											
											<a href="<?= Yii::$app->urlManager->createUrl(['human-resource/delete-aktivitas',"id"=>$value['id_aktivitas']])?>" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash"></i></a>
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