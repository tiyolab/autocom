<?php

function DateToIndo($date) {
		$BulanIndo = array("Januari", "Februari", "Maret",
						   "April", "Mei", "Juni",
						   "Juli", "Agustus", "September",
						   "Oktober", "November", "Desember");
	
		$tahun = substr($date, 0, 4);
		$bulan = substr($date, 5, 2);
		$tgl   = substr($date, 8, 2);
		
		//$result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;
		$result = $BulanIndo[(int)$bulan-1];
		return($result);
}

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

use app\models\HrdAbsensi;

$HrdAbsensi = new HrdAbsensi();
$id = Yii::$app->request->get()['id'];
foreach ( $HrdAbsensi->findLaporanAbsensiId($id) as $key => $value) {
	$this->title = 'Detail Absensi Pegawai : '.$value['nama_lengkap'];
}
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="side">
	<div class="sub-sidebar-wrapper">
	  <ul class="nav">
		<?php
			echo Nav::widget([
					'items' => [
					['label' => 'Laporan Absensi Pegawai', 'url' => [Yii::$app->urlManager->createUrl(['../../human-resource/laporan-absensi'])]],
					['label' => 'Laporan Lembur Pegawai', 'url' => [Yii::$app->urlManager->createUrl(['../../human-resource/laporan-lembur'])]],
					['label' => 'Laporan Aktivitas Pegawai', 'url' => [Yii::$app->urlManager->createUrl(['../../human-resource/laporan-aktivitas'])]],
					['label' => 'Laporan Perekrutan Pegawai Baru', 'url' => [Yii::$app->urlManager->createUrl(['../../human-resource/laporan-rekrut'])]],
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
									<th>NIP</th>
									<th width="150px">Nama Pegawai</th>
									<th>Jabatan</th>
									<th>Tingkat Jabatan</th>
									<th>Department</th>
									<th>Jam Masuk</th>
									<th>Kehadiran</th>
									<th>Tanggal Kehadiran</th>
								</tr>
							</thead>
							<tbody>
								<?php $i=1; foreach ( $HrdAbsensi->findLaporanAbsensiDetail($id) as $key => $value) { ?>
									<tr>
										<td><?=$i?></td>
										<td><?=$value['nip']?></td>
										<td><?=$value['nama_lengkap']?></td>
										<td><?=$value['jabatan']?></td>
										<td><?=$value['tingkatan']?></td>
										<td><?=$value['nama_departement']?></td>
										<td><?=$value['jam_masuk']?></td>
										<td><?php
											if($value['kehadiran']==1){
												echo "Hadir";
											}else{
												echo "Tidak Hadir";											
											}
										?></td>
										<td><?=DateToIndo($value['tanggal'])?></td>
									</tr>
								<?php $i++; } ?>
							</tbody>
						</table>		
						<a href="<?= Yii::$app->urlManager->createUrl(['human-resource/laporan-absensi'])?>" class="btn btn-primary btn-sm">Back</a>	
					</div>
				</div>
			</div>
	</div>
</div>	