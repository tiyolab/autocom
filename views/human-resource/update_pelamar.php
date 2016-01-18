<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\bootstrap\ActiveForm;

use app\models\HrdLowongan;
use app\models\Hrdaktivitas;
use app\models\HrdPelamar;

$HrdLowongan = new HrdLowongan();
$myData = HrdPelamar::find()->where(['id_calon'=>Yii::$app->request->get()['id']])->asArray()->one();
$this->title = 'Edit Data Pelamar : '.$myData['nama'];
$this->params['breadcrumbs'][] = $this->title;
?>
					
<?php $form = ActiveForm::begin([
	'id' => 'create-pelamar',
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
							<?= Html::input("text", "nama", $myData['nama'], ["placeholder"=>"Nama Pelamar", "required"=>"required", "class"=>"form-control"]) ?>
							</br><?= Html::label( "Tempat Lahir", ["class"=>"form-control"]) ?>						
							<?= Html::input("text", "tempat_lahir", $myData['tempat_lahir'], ["placeholder"=>"Tempat Lahir", "required"=>"required", "class"=>"form-control"]) ?>
							</br><?= Html::label( "Tanggal Lahir", ["class"=>"form-control"]) ?>						
							<?= Html::input("date", "tgl_lahir", $myData['tgl_lahir'], ["placeholder"=>"Tanggal Lahir", "required"=>"required", "class"=>"form-control"]) ?>
							</br><?= Html::label( "Pendidikan Terakhir", ["class"=>"form-control"]) ?>						
							<?= Html::input("text", "pend", $myData['pend'], ["placeholder"=>"Pendidikan Terakhir", "required"=>"required", "class"=>"form-control"]) ?>
							</br><?= Html::label( "Alamat", ["class"=>"form-control"]) ?>						
							<?= Html::input("text", "alamat", $myData['alamat'], ["placeholder"=>"Alamat", "required"=>"required", "class"=>"form-control"]) ?>
							</br><?= Html::label( "No HP", ["class"=>"form-control"]) ?>						
							<?= Html::input("number", "hp", $myData['hp'], ["placeholder"=>"No Hp", "required"=>"required", "class"=>"form-control"]) ?>
							</br><?= Html::label( "Email", ["class"=>"form-control"]) ?>						
							<?= Html::input("email", "email", $myData['email'], ["placeholder"=>"Email", "required"=>"required", "class"=>"form-control"]) ?>
							</br><?= Html::label( "Melamar Jabatan", ["class"=>"form-control"]) ?>
							</br><select name="id_lowongan">
									<option value=null>Pilih</option>
							<?php foreach ( $HrdLowongan->findLowongan() as $key => $value) { ?>
									<option value=<?=$value['id_lowongan']?>><?=$value['jabatan']?></option>
							<?php } ?></br>					
							</select></br>
							</br><?= Html::label( "Status Perkawinan", ["class"=>"form-control"]) ?>		
							<li>
								<?= Html::radio("perkawinan", false, ["label"=>"Menikah", "value"=>"Menikah"]);?>
							</li>
							<li>
								<?= Html::radio("perkawinan", false, ["label"=>"Belum Menikah", "value"=>"Belum Menikah"]);?>
							</li>
							</br><?= Html::label( "Pas Foto", ["class"=>"form-control"]) ?>			
							<li>
								<?= Html::radio("pasfoto", false, ["label"=>"Terlampir", "value"=>"1"]);?>
							</li>
							<li>
								<?= Html::radio("pasfoto", false, ["label"=>"Tidak terlampir", "value"=>"0"]);?>
							</li>
							</br><?= Html::label( "Surat Lamaran", ["class"=>"form-control"]) ?>	
							<li>
								<?= Html::radio("surat_lamaran", false, ["label"=>"Terlampir", "value"=>"1"]);?>
							</li>
							<li>
								<?= Html::radio("surat_lamaran", false, ["label"=>"Tidak terlampir", "value"=>"0"]);?>
							</li>
							</br><?= Html::label( "Fotokopi Riwayat", ["class"=>"form-control"]) ?>	
							<li>
								<?= Html::radio("ft_riwayat", false, ["label"=>"Terlampir", "value"=>"1"]);?>
							</li>
							<li>
								<?= Html::radio("ft_riwayat", false, ["label"=>"Tidak terlampir", "value"=>"0"]);?>
							</li>
							</br><?= Html::label( "Fotokopi Sertifikat", ["class"=>"form-control"]) ?>	
							<li>
								<?= Html::radio("ft_sertifikat", false, ["label"=>"Terlampir", "value"=>"1"]);?>
							</li>
							<li>
								<?= Html::radio("ft_sertifikat", false, ["label"=>"Tidak terlampir", "value"=>"0"]);?>
							</li>
							</br><?= Html::label( "Fotokopi KTP", ["class"=>"form-control"]) ?>		
							<li>
								<?= Html::radio("ft_ktp", false, ["label"=>"Terlampir", "value"=>"1"]);?>
							</li>
							<li>
								<?= Html::radio("ft_ktp", false, ["label"=>"Tidak terlampir", "value"=>"0"]);?>
							</li>
							</br><?= Html::label( "Fotokopi Transkrip", ["class"=>"form-control"]) ?>					
							<li>
								<?= Html::radio("ft_transkrip", false, ["label"=>"Terlampir", "value"=>"1"]);?>
							</li>
							<li>
								<?= Html::radio("ft_transkrip", false, ["label"=>"Tidak terlampir", "value"=>"0"]);?>
							</li>
							</br><?= Html::label( "Surat Keterangan Catatan Kepolisian", ["class"=>"form-control"]) ?>	
							<li>
								<?= Html::radio("skck", false, ["label"=>"Terlampir", "value"=>"1"]);?>
							</li>
							<li>
								<?= Html::radio("skck", false, ["label"=>"Tidak terlampir", "value"=>"0"]);?>
							</li>
							</br><?= Html::label( "Surat Sehat", ["class"=>"form-control"]) ?>	
							<li>
								<?= Html::radio("surat_sehat", false, ["label"=>"Terlampir", "value"=>"1"]);?>
							</li>
							<li>
								<?= Html::radio("surat_sehat", false, ["label"=>"Tidak terlampir", "value"=>"0"]);?>
							</li>
							</br><?= Html::label( "Tanggal Daftar", ["class"=>"form-control"]) ?>						
							<?= Html::input("date", "tgl_daftar", $myData['tgl_daftar'], ["required"=>"required", "class"=>"form-control"]) ?>
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