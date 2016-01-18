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

use app\models\HrdPelamar;

$HrdPelamar = new HrdPelamar();
$detailPelamar = $HrdPelamar->findPelamarDetail(Yii::$app->request->get()['id']);
$this->title = 'Detail data Pelamar : '.$detailPelamar[0]['nama'];
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
							<?php $i=1; foreach ( $detailPelamar as $key => $value) { ?>
								<tr>
									<td><strong>Nama Pelamar</strong></td>
									<td width="100px"></td>
									<td>:</td>
									<td><?=$value['nama']?></td>
								</tr>
								<tr>
									<td><strong>Department Lowongan
									</strong></td>
									<td width="100px"></td>
									<td>:</td>
									<td><?=$value['nama_departement']?></td>
								</tr>
								<tr>
									<td><strong>Jabatan Lowongan</strong></td>
									<td width="100px"></td>
									<td>:</td>
									<td><?=$value['jabatan']?></td>
								</tr>
								<tr>
									<td><strong>No HP</strong></td>
									<td width="100px"></td>
									<td>:</td>
									<td><?=$value['hp']?></td>
								</tr>
								<tr>
									<td><strong>Email</strong></td>
									<td width="100px"></td>
									<td>:</td>
									<td><?=$value['email']?></td>
								</tr>
								<tr>
									<td><strong>Tempat, Tanggal Lahir</strong></td>
									<td width="100px"></td>
									<td>:</td>
									<td><?=$value['tempat_lahir']?>, <?=$value['tgl_lahir']?></td>
								</tr>
								<tr>
									<td><strong>Pendidikan Terakhir</strong></td>
									<td width="100px"></td>
									<td>:</td>
									<td><?=$value['pend']?></td>
								</tr>
								<tr>
									<td><strong>Status Perkawinan</strong></td>
									<td width="100px"></td>
									<td>:</td>
									<td><?=$value['perkawinan']?></td>
								</tr>
								<tr>
									<td><strong>Tanggal Mendaftar</strong></td>
									<td width="100px"></td>
									<td>:</td>
									<td><?=$value['tgl_daftar']?></td>
								</tr>
								<tr>
									<td><strong>Lampiran Pasfoto</strong></td>
									<td width="100px"></td>
									<td>:</td>
									<td><?php 
									if($value['pasfoto'] == 1){
										echo "Terlampir";
									}else{
										echo "Tidak Terlampir";									
									}?></td>
								</tr>
								<tr>
									<td><strong>Lampiran Surat Lamaran</strong></td>
									<td width="100px"></td>
									<td>:</td>
									<td><?php 
									if($value['surat_lamaran'] == 1){
										echo "Terlampir";
									}else{
										echo "Tidak Terlampir";									
									}?></td>
								</tr>
								<tr>
									<td><strong>Lampiran Fotocopy Riwayat Hidup</strong></td>
									<td width="100px"></td>
									<td>:</td>
									<td><?php 
									if($value['ft_riwayat'] == 1){
										echo "Terlampir";
									}else{
										echo "Tidak Terlampir";									
									}?></td>
								</tr>
								<tr>
									<td><strong>Lampiran Fotocopy Sertifikat</strong></td>
									<td width="100px"></td>
									<td>:</td>
									<td><?php 
									if($value['ft_sertifikat'] == 1){
										echo "Terlampir";
									}else{
										echo "Tidak Terlampir";									
									}?></td>
								</tr>
								<tr>
									<td><strong>Lampiran Fotocopy KTP</strong></td>
									<td width="100px"></td>
									<td>:</td>
									<td><?php 
									if($value['ft_ktp'] == 1){
										echo "Terlampir";
									}else{
										echo "Tidak Terlampir";									
									}?></td>
								</tr>
								<tr>
									<td><strong>Lampiran Fotocopy Transkrip Nilai</strong></td>
									<td width="100px"></td>
									<td>:</td>
									<td><?php 
									if($value['ft_transkrip'] == 1){
										echo "Terlampir";
									}else{
										echo "Tidak Terlampir";									
									}?></td>
								</tr>
								<tr>
									<td><strong>Lampiran Surat Sehat</strong></td>
									<td width="100px"></td>
									<td>:</td>
									<td><?php 
									if($value['surat_sehat'] == 1){
										echo "Terlampir";
									}else{
										echo "Tidak Terlampir";									
									}?></td>
								</tr>
							<?php $i++; } ?>
						</thead>
						</table>			
						<a href="<?= Yii::$app->urlManager->createUrl(['human-resource/pelamar'])?>" class="btn btn-primary btn-sm">Back</a>	
					</div>
				</div>
			</div>
	</div>
</div>	