<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\bootstrap\ActiveForm;

use app\models\HrdPegawai;
use app\models\HrdDepartement;

$HrdDepartement = new HrdDepartement();
$HrdPegawai = new HrdPegawai();
$myData = HrdPegawai::find()->where(['id_pegawai'=>Yii::$app->request->get()['id']])->asArray()->one();
$this->title = 'Edit Data Pribadi Pegawai : '.$myData['nama_lengkap'];
$this->params['breadcrumbs'][] = $this->title;
?>
					
<?php $form = ActiveForm::begin([
	'id' => 'update-profil',
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
							</br><?= Html::label( "NIP", ["class"=>"form-control"]) ?>						
							<?= Html::input("number", "nip", $myData['nip'], ["placeholder"=>"NIP", "required"=>"required", "class"=>"form-control"]) ?>						
							</br><?= Html::label( "Nama", ["class"=>"form-control"]) ?>
							<?= Html::input("text", "nama_lengkap", $myData['nama_lengkap'], ["placeholder"=>"Nama", "required"=>"required", "class"=>"form-control"]) ?>						
							</br><?= Html::label( "Gelar Depan", ["class"=>"form-control"]) ?>
							<?= Html::input("text", "gelar_dpn", $myData['gelar_dpn'], ["placeholder"=>"Gelar Depan", "required"=>"required", "class"=>"form-control"]) ?>
							</br><?= Html::label( "Gelar Belakang", ["class"=>"form-control"]) ?>
							<?= Html::input("text", "gelar_blk", $myData['gelar_blk'], ["placeholder"=>"Gelar Belakang", "required"=>"required", "class"=>"form-control"]) ?>
							</br><?= Html::label( "Agama", ["class"=>"form-control"]) ?>
							<?= Html::input("text", "agama", $myData['agama'], ["placeholder"=>"Agama", "required"=>"required", "class"=>"form-control"]) ?>							
							</br><?= Html::label( "Jenis Kelamin", ["class"=>"form-control"]) ?>
							<li>
								<?= Html::radio("sex", false, ["label"=>"Laki-Laki", "value"=>"Laki-Laki"]);?>
							</li> 
							<li>
								<?= Html::radio("sex", false, ["label"=>"Perempuan", "value"=>"Perempuan"]);?>
							</li>
							</br><?= Html::label( "Golongan Darah", ["class"=>"form-control"]) ?>
							<li>
								<?= Html::radio("gol_dar", false, ["label"=>"A", "value"=>"A"]);?>
							</li>
							<li>
								<?= Html::radio("gol_dar", false, ["label"=>"B", "value"=>"B"]);?>
							</li>
							<li>
								<?= Html::radio("gol_dar", false, ["label"=>"O", "value"=>"O"]);?>
							</li>
							<li>
								<?= Html::radio("gol_dar", false, ["label"=>"AB", "value"=>"AB"]);?>
							</li>
							</br><?= Html::label( "Tinggi", ["class"=>"form-control"]) ?>
							<?= Html::input("number", "tinggi",  $myData['tinggi'], ["placeholder"=>"Tinggi (Kg)", "required"=>"required", "class"=>"form-control"]) ?>
							</br><?= Html::label( "Berat", ["class"=>"form-control"]) ?>
							<?= Html::input("number", "berat",  $myData['berat'], ["placeholder"=>"Berat (Kg)", "required"=>"required", "class"=>"form-control"]) ?>
							</br><?= Html::label( "Status Nikah", ["class"=>"form-control"]) ?>
							<li>
								<?= Html::radio("status_nikah", false, ["label"=>"Menikah", "value"=>"Menikah"]);?>
							</li>
							<li>
								<?= Html::radio("status_nikah", false, ["label"=>"Belum Menikah", "value"=>"Belum Menikah"]);?>
							</li>
							</br><?= Html::label( "Alamat", ["class"=>"form-control"]) ?>
							<?= Html::input("textarea", "alamat",  $myData['alamat'], ["placeholder"=>"Alamat", "required"=>"required", "class"=>"form-control"]) ?>
							</br><?= Html::label( "Email", ["class"=>"form-control"]) ?>
							<?= Html::input("email", "email",  $myData['email'], ["placeholder"=>"Email", "required"=>"required", "class"=>"form-control"]) ?>
							</br><?= Html::label( "Nomor Telepon", ["class"=>"form-control"]) ?>
							<?= Html::input("number", "nomor_telepon",  $myData['nomor_telepon'], ["placeholder"=>"Nomor Telepon", "required"=>"required", "class"=>"form-control"]) ?>
							</br><?= Html::label( "Jumlah Tanggungan", ["class"=>"form-control"]) ?>
							<?= Html::input("number", "jml_tanggungan",  $myData['jml_tanggungan'], ["placeholder"=>"Jumlah Tanggungan", "required"=>"required", "class"=>"form-control"]) ?>
							</br><?= Html::label( "Pendidikan Terakhir", ["class"=>"form-control"]) ?>
							<?= Html::input("text", "pendidikan_terakhir",  $myData['pendidikan_terakhir'], ["placeholder"=>"Pendidikan Terakhir", "required"=>"required", "class"=>"form-control"]) ?>	
						
							</br><?= Html::label( "Nama Departement", ["class"=>"form-control"]) ?>
							</br><select name="id_departement">
									<option value=NULL>Pilih</option>
							<?php foreach ( $HrdDepartement->findDepartement() as $key => $value) { ?>
									<option value=<?=$value['id_departement']?>><?=$value['nama_departement']?></option>
							<?php } ?></br>					
							</select></br>
							
							</br><?= Html::label( "Jabatan", ["class"=>"form-control"]) ?>
							</br><select name="id_jabatan">
									<option value=NULL>Pilih</option>
							<?php foreach ( $HrdPegawai->findJabatan() as $key => $value) { ?>
									<option value=<?=$value['id_jabatan']?>><?=$value['nama_jabatan']?></option>
							<?php } ?></br>
							</select></br>							
							
							</br><?= Html::label( "Tingkatan", ["class"=>"form-control"]) ?>
							</br><select name="id_tingkatan">
									<option value=NULL>Pilih</option>
							<?php foreach ( $HrdPegawai->findTingkatan() as $key => $value) { ?>
									<option value=<?=$value['id_tingkatan']?>><?=$value['tingkatan']?></option>
							<?php } ?></br>
							</select></br>					
							
							</br><?= Html::label( "Gaji", ["class"=>"form-control"]) ?>
							</br><select name="id_gaji">
									<option value=NULL>Pilih</option>
							<?php foreach ( $HrdPegawai->findGaji() as $key => $value) { ?>
									<option value=<?=$value['id_gaji']?>><?=$value['gaji']?></option>
							<?php } ?></br>
							</select></br>
							
							</br><?= Html::label( "Tanggal Diterima", ["class"=>"form-control"]) ?>
							<?= Html::input("date", "tanggal_diterima",  $myData['tanggal_diterima'], ["placeholder"=>"Tanggal Diterima", "required"=>"required", "class"=>"form-control"]) ?>
						</div>
						<div class="form-group">
							<?= Html::submitButton('Save', ['class' => 'btn btn-primary', 'name' => 'save-button']) ?>
							<a href="<?= Yii::$app->urlManager->createUrl(['human-resource/profil'])?>" class="btn btn-success btn-sm">Back</a>
						</div>
					</div>
				</div>
			</div>
	</div>
</div>	

<?php ActiveForm::end(); ?>