<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\bootstrap\ActiveForm;

use app\models\HrdPegawai;

$HrdPegawai = new HrdPegawai();
$this->title = 'Tambah Data Pelanggaran Pegawai';
$this->params['breadcrumbs'][] = $this->title;
?>
					
<?php $form = ActiveForm::begin([
	'id' => 'create-pelanggran',
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
							</br><?= Html::label( "Nama Pegawai", ["class"=>"form-control"]) ?>
							</br><select name="id_pegawai">
									<option value=NULL>Pilih</option>
							<?php foreach ( $HrdPegawai->findPegawaiNama() as $key => $value) { ?>
									<option value=<?=$value['id_pegawai']?>><?=$value['nama_lengkap']?></option>
							<?php } ?></br>
							</select></br>
							</br><?= Html::label( "Pelanggaran", ["class"=>"form-control"]) ?>						
							<?= Html::input("text", "pelanggaran", null, ["placeholder"=>"Pelanggaran", "required"=>"required", "class"=>"form-control"]) ?>
							</br><?= Html::label( "Tanggal Melanggar", ["class"=>"form-control"]) ?>						
							<?= Html::input("date", "tgl_melanggar", null, [ "required"=>"required", "class"=>"form-control"]) ?>
							</br><?= Html::label( "Tindakan", ["class"=>"form-control"]) ?>						
							<?= Html::input("text", "tindakan", null, ["placeholder"=>"Tindakan", "required"=>"required", "class"=>"form-control"]) ?>				
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