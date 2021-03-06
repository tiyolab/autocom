<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\bootstrap\ActiveForm;

use app\models\HrdMateri;
use app\models\HrdJadwal;
use app\models\HrdPelamar;
use app\models\HrdHasil;

$HrdHasil = new HrdHasil();
$HrdMateri = new HrdMateri();
$HrdJadwal = new HrdJadwal();
$HrdPelamar = new HrdPelamar();
$HrdHasil = new HrdHasil();
$this->title = 'Tambah Hasil Tes';
$this->params['breadcrumbs'][] = $this->title;
?>
					
<?php $form = ActiveForm::begin([
	'id' => 'create-hasil',
	'options' => ['class' => 'form-horizontal', 'data-toggle'=>'validator'],
	'fieldConfig' => [
		'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
		'labelOptions' => ['class' => 'col-lg-1 control-label'],
	],
]); ?>
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
						<div class="form-group">
							</br><?= Html::label( "Nama Pelamar", ["class"=>"form-control"]) ?>
							</br><select name="id_pelamar">
									<option value=NULL>Pilih</option>
							<?php foreach ( $HrdPelamar->findPelamar() as $key => $value) { ?>
									<option value=<?=$value['id_calon']?>><?=$value['nama']?></option>
							<?php } ?></br>					
							</select></br>
							</br><?= Html::label( "Lowongan", ["class"=>"form-control"]) ?>
							</br><select name="id_lowongan">
									<option value=NULL>Pilih</option>
							<?php foreach ( $HrdHasil->findLowongan() as $key => $value) { ?>
									<option value=<?=$value['id_lowongan']?>><?=$value['nama_departement']?> | <?=$value['nama_jabatan']?></option>
							<?php } ?></br>					
							</select></br>
							</br><?= Html::label( "Materi Tes", ["class"=>"form-control"]) ?>
							</br><select name="id_materi_tes">
									<option value=NULL>Pilih</option>
							<?php foreach ( $HrdMateri->findMateri() as $key => $value) { ?>
									<option value=<?=$value['id_materi_tes']?>><?=$value['materi_tes']?></option>
							<?php } ?></br>					
							</select></br>
							</br><?= Html::label( "Jadwal Tes", ["class"=>"form-control"]) ?>
							</br><select name="id_jadwal_tes">
									<option value=NULL>Pilih</option>
							<?php foreach ( $HrdJadwal->findJadwal() as $key => $value) { ?>
									<option value=<?=$value['id_jadwal_tes']?>><?=$value['jadwal_tes']?></option>
							<?php } ?></br>					
							</select></br>
							</br><?= Html::label( "Hasil Tes", ["class"=>"form-control"]) ?>						
							<?= Html::input("number", "hasil_tes", null, ["placeholder"=>"Hasil Tes", "required"=>"required", "class"=>"form-control"]) ?>
						</div>
						<div class="form-group">
							<?= Html::submitButton('Save', ['class' => 'btn btn-primary', 'name' => 'save-button']) ?>
						</div>
					</div>
				</div>
			</div>
	</div>
</div>	
<?php ActiveForm::end(); ?>