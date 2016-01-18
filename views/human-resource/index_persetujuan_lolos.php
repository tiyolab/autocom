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
use app\models\HrdLowongan;

$HrdHasil = new HrdHasil();

$HrdLowongan = new HrdLowongan();
$myData = HrdLowongan::find()->where(['id_lowongan'=>Yii::$app->request->get()['id']])->asArray()->one();
$jml = $myData['jumlah_tempat'];
$this->title = 'Persetujuan Pelamar Lolos Seleksi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="side">
	<div class="sub-sidebar-wrapper">
	  <ul class="nav">
		<?php
			echo Nav::widget([
					'items' => [
					['label' => 'Persetujuan Jadwal Lembur', 'url' => [Yii::$app->urlManager->createUrl(['../../human-resource/persetujuan-lembur'])]],
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
								<tr>
									<th>No</th>
									<th>Nama_Pelamar</th>
									<th>Lowongan Departement</th>
									<th>Lowongan Jabatan</th>
									<th>Materi Tes</th>
									<th>Hasil Tes</th>
									<th width="100px">Persetujuan</th>
								</tr>
							</thead>
							<tbody>
								<?php $i=1; foreach ( $HrdHasil->findLolosPending($jml) as $key => $value) { ?>
									<tr>
										<td><?=$i?></td>
										<td><?=$value['nama']?></td>
										<td><?=$value['nama_departement']?></td>
										<td><?=$value['nama_jabatan']?></td>
										<td><?=$value['materi_tes']?></td>
										<td><?=$value['hasil_tes']?></td>
										<td>
											<a href="<?= Yii::$app->urlManager->createUrl(['human-resource/setuju-lolos',"id"=>$value['id_calon']])?>" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-check"> Setujui</i></a>
											<a href="<?= Yii::$app->urlManager->createUrl(['human-resource/tolak-lolos',"id"=>$value['id_calon']])?>" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-check"> Tolak</i></a>
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