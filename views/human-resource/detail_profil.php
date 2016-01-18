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

use app\models\HrdPegawai;

$HrdPegawai = new HrdPegawai();
$detailPegawai = $HrdPegawai->findPegawaiWithDetail(Yii::$app->request->get()['id']);
$this->title = 'Detail data pegawai : '.$detailPegawai[0]['nama_lengkap'];
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
							<?php $i=1; foreach ( $detailPegawai as $key => $value) { ?>
								<tr>
									<td><strong>NIP</strong></td>
									<td width="100px"></td>
									<td>:</td>
									<td><?=$value['nip']?></td>
								</tr>
								<tr>
									<td><strong>Nama Pegawai</strong></td>
									<td width="100px"></td>
									<td>:</td>
									<td><?=$value['nama_lengkap']?></td>
								</tr>
								<tr>
									<td><strong>Gelar Depan</strong></td>
									<td width="100px"></td>
									<td>:</td>
									<td><?=$value['gelar_dpn']?></td>
								</tr>
								<tr>
									<td><strong>Gelar Belakang</strong></td>
									<td width="100px"></td>
									<td>:</td>
									<td><?=$value['gelar_blk']?></td>
								</tr>
								<tr>
									<td><strong>Agama</strong></td>
									<td width="100px"></td>
									<td>:</td>
									<td><?=$value['agama']?></td>
								</tr>
								<tr>
									<td><strong>Jenis Kelamin</strong></td>
									<td width="100px"></td>
									<td>:</td>
									<td><?=$value['sex']?></td>
								</tr>
								<tr>
									<td><strong>Golongan Darah</strong></td>
									<td width="100px"></td>
									<td>:</td>
									<td><?=$value['gol_dar']?></td>
								</tr>
								<tr>
									<td><strong>Tinggi Badan</strong></td>
									<td width="100px"></td>
									<td>:</td>
									<td><?=$value['tinggi']?> Kg</td>
								</tr>
								<tr>
									<td><strong>Berat Badan</strong></td>
									<td width="100px"></td>
									<td>:</td>
									<td><?=$value['berat']?> Kg</td>
								</tr>
								<tr>
									<td><strong>Status Perkawinan</strong></td>
									<td width="100px"></td>
									<td>:</td>
									<td><?=$value['status_nikah']?></td>
								</tr>
								<tr>
									<td><strong>Alamat</strong></td>
									<td width="100px"></td>
									<td>:</td>
									<td><?=$value['alamat']?></td>
								</tr>
								<tr>
									<td><strong>Email</strong></td>
									<td width="100px"></td>
									<td>:</td>
									<td><?=$value['email']?></td>
								</tr>
								<tr>
									<td><strong>Nomor Telepon</strong></td>
									<td width="100px"></td>
									<td>:</td>
									<td><?=$value['nomor_telepon']?></td>
								</tr>
								<tr>
									<td><strong>Department</strong></td>
									<td width="100px"></td>
									<td>:</td>
									<td><?=$value['nama_departement']?></td>
								</tr>
								<tr>
									<td><strong>Jabatan</strong></td>
									<td width="100px"></td>
									<td>:</td>
									<td><?=$value['nama_jabatan']?></td>
								</tr>
								<tr>
									<td><strong>Tingkat Jabatan</strong></td>
									<td width="100px"></td>
									<td>:</td>
									<td><?=$value['tingkatan']?></td>
								</tr>
								<tr>
									<td><strong>Gaji</strong></td>
									<td width="100px"></td>
									<td>:</td>
									<td>Rp. <?=$value['gaji']?>,-</td>
								</tr>
								<tr>
									<td><strong>Pendidikan Terakhir</strong></td>
									<td width="100px"></td>
									<td>:</td>
									<td><?=$value['pendidikan_terakhir']?></td>
								</tr>
								<tr>
									<td><strong>Tanggal Diterima</strong></td>
									<td width="100px"></td>
									<td>:</td>
									<td><?=DateToIndo($value['tanggal_diterima'])?></td>
								</tr>
							<?php $i++; } ?>
						</thead>
						</table>			
						<a href="<?= Yii::$app->urlManager->createUrl(['human-resource/profil'])?>" class="btn btn-primary btn-sm">Back</a>	
					</div>
				</div>
			</div>
	</div>
</div>	