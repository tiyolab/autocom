<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\bootstrap\ActiveForm;

use app\models\UserType;

$UserType = new UserType();
$this->title = 'Pilih Tipe User';
$this->params['breadcrumbs'][] = $this->title;
?>
					
<?php $form = ActiveForm::begin([
	'id' => 'create-profil',
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
							<?php foreach ( $UserType->getPegawai() as $key => $value) { ?>				
							<?= Html::input("hidden", "id_pegawai", $value['id_pegawai'], ["ReadOnly"=>"true", "required"=>"required", "class"=>"form-control"]) ?>					
							<?php } ?>
							<?php foreach ( $UserType->getPegawai() as $key => $value) { ?>				
							<?= Html::input("hidden", "username", $value['nip'], ["ReadOnly"=>"true", "required"=>"required", "class"=>"form-control"]) ?>					
							<?php } ?>
							<?php foreach ( $UserType->getPegawai() as $key => $value) { ?>				
							<?= Html::input("hidden", "password", $value['nip'], ["ReadOnly"=>"true", "required"=>"required", "class"=>"form-control"]) ?>					
							<?php } ?>
							<?= Html::input("hidden", "sec_question", "projek apa ?", ["ReadOnly"=>"true", "required"=>"required", "class"=>"form-control"]) ?>
							<?= Html::input("hidden", "sec_answer", "sim", ["ReadOnly"=>"true", "required"=>"required", "class"=>"form-control"]) ?>
							</br><?= Html::label( "NIP", ["class"=>"form-control"]) ?>		
							<?php foreach ( $UserType->getPegawai() as $key => $value) { ?>				
							<?= Html::input("text", "nip", $value['nip'], ["ReadOnly"=>"true", "required"=>"required", "class"=>"form-control"]) ?>					
							<?php } ?>
							</br><?= Html::label( "Nama Pegawai", ["class"=>"form-control"]) ?>		
							<?php foreach ( $UserType->getPegawai() as $key => $value) { ?>				
							<?= Html::input("text", "nama_lengkap", $value['nama_lengkap'], ["ReadOnly"=>"true", "required"=>"required", "class"=>"form-control"]) ?>				
							<?php } ?>
							</br><?= Html::label( "Email", ["class"=>"form-control"]) ?>		
							<?php foreach ( $UserType->getPegawai() as $key => $value) { ?>				
							<?= Html::input("text", "email", $value['email'], ["ReadOnly"=>"true", "required"=>"required", "class"=>"form-control"]) ?>				
							<?php } ?>
							</br><?= Html::label( "Tipe User", ["class"=>"form-control"]) ?>
							</br><select name="user_type">
									<option value=NULL>Pilih</option>
							<?php foreach ( $UserType->getType() as $key => $value) { ?>
									<option value=<?=$value['id']?>><?=$value['name']?></option>
							<?php } ?></br>
							</select></br>	
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