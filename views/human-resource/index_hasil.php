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

use app\models\HrdHasil;

$HrdHasil = new HrdHasil();

$this->title = 'Hasil Tes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="side">
	<div class="sub-sidebar-wrapper">
	  <ul class="nav">
		<?php
			echo Nav::widget([
					'items' => [
					['label' => 'Lowongan Tawaran', 'url' => [Yii::$app->urlManager->createUrl(['../../human-resource/rekrut'])]],
					['label' => 'Data Pelamar Lowongan', 'url' => [Yii::$app->urlManager->createUrl(['../../human-resource/pelamar'])]],
					['label' => 'Materi Tes', 'url' => [Yii::$app->urlManager->createUrl(['../../human-resource/materi'])]],
					['label' => 'Jadwal Tes', 'url' => [Yii::$app->urlManager->createUrl(['../../human-resource/jadwal'])]],
					['label' => 'Hasil Tes', 'url' => [Yii::$app->urlManager->createUrl(['../../human-resource/hasil'])]],
					['label' => 'Pelamar Lolos Tes', 'url' => [Yii::$app->urlManager->createUrl(['../../human-resource/lolos'])]],
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
						<a href="<?= Yii::$app->urlManager->createUrl(['human-resource/create-hasil'])?>" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-plus"></i></a>
						<table class="table">
							<thead>
								<tr>
									<th>No</th>
									<th>Nama Pelamar</th>
									<th>Department Lowongan</th>
									<th>Jabatan Lowongan</th>
									<th>Materi Tes</th>
									<th>Jadwal Tes</th>
									<th>Hasil Tes</th>
									<th width="100px">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php $i=1; foreach ( $HrdHasil->findHasil() as $key => $value) { ?>
									<tr>
										<td><?=$i?></td>
										<td><?=$value['nama']?></td>
										<td><?=$value['nama_departement']?></td>
										<td><?=$value['materi_tes']?></td>
										<td><?=$value['nama_jabatan']?></td>
										<td><?=DateToIndo($value['jadwal_tes'])?></td>
										<td><?=$value['hasil_tes']?></td>
										<td>
											<a href="<?= Yii::$app->urlManager->createUrl(['human-resource/update-hasil',"id"=>$value['id_hasil_tes']])?>" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-pencil"></i></a>
											
											<a href="<?= Yii::$app->urlManager->createUrl(['human-resource/delete-hasil',"id"=>$value['id_hasil_tes']])?>" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash"></i></a>
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