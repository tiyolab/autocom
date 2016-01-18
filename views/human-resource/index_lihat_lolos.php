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

use app\models\HrdLowongan;
use app\models\HrdLolos;
$HrdLolos = new HrdLolos();

$HrdLowongan = new HrdLowongan();
$myData = HrdLowongan::find()->where(['id_lowongan'=>Yii::$app->request->get()['id']])->asArray()->one();
$jml = $myData['jumlah_tempat'];
$data=0;
foreach ( $HrdLolos->LihatIdLowongan() as $key => $value) {
	$data=1;
	$pindah = $value['id_lowongan'];
	//print_r ($pindah);die;
}
if($data == 0){
	//print_r ($pindah);die;
	//$HrdLolos->InsertLolos($jml);
}
//print_r ($jml);die;
$this->title = 'Data Pelamar Lolos';
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
						<table class="table">
							<thead>
								<tr>
									<th>No</th>
									<th>Nama_Pelamar</th>
									<th>Lowongan Departement</th>
									<th>Lowongan Jabatan</th>
									<th>Materi Tes</th>
									<th>Hasil Tes</th>
									<th>Persetujuan Lolos</th>
									<th width="100px">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php $i=1; foreach ( $HrdLolos->findLolos($jml) as $key => $value) { ?>
									<tr>
										<td><?=$i?></td>
										<td><?=$value['nama']?></td>
										<td><?=$value['nama_departement']?></td>
										<td><?=$value['nama_jabatan']?></td>
										<td><?=$value['materi_tes']?></td>
										<td><?=$value['hasil_tes']?></td>
										<td><?php 
											if($value['persetujuan_lolos']==1){
												echo "Disetujui";
											}else if($value['persetujuan_lolos']==2){
												echo "Ditolak";
											}else{
												echo "Pending";
											}
										?></td>
										<td>
											<a href="<?= Yii::$app->urlManager->createUrl(['human-resource/delete-lolos',"id"=>$value['id_hasil_tes']])?>" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash"></i></a>
										</td>
									</tr>
								<?php $i++; } ?>
							</tbody>
						</table>
							<a href="<?= Yii::$app->urlManager->createUrl(['human-resource/lolos'])?>" class="btn btn-primary btn-sm">Back</a>
					</div>
				</div>
			</div>
	</div>
</div>	