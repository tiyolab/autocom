<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\bootstrap\ActiveForm;

use app\models\HrdPegawai;

$HrdPegawai = new HrdPegawai();
$this->title = 'Tambah Data Gaji Pokok Pegawai';
$this->params['breadcrumbs'][] = $this->title;
?>
					
<?php $form = ActiveForm::begin([
	'id' => 'create-gaji',
	'options' => ['class' => 'form-horizontal', 'data-toggle'=>'validator'],
	'fieldConfig' => [
		'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
		'labelOptions' => ['class' => 'col-lg-1 control-label'],
	],
]); ?>
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
							</br><?= Html::label( "Jabatan", ["class"=>"form-control"]) ?>
							</br><select name="id_jabatan">
									<option value=NULL>Pilih</option>
							<?php foreach ( $HrdPegawai->findJabatan() as $key => $value) { ?>
									<option value=<?=$value['id_jabatan']?>><?=$value['nama_jabatan']?></option>
							<?php } ?></br>					
							</select></br>
							</br><?= Html::label( "Tingkat Jabatan", ["class"=>"form-control"]) ?>						
							<?= Html::input("text", "tingkatan", null, ["placeholder"=>"Tingkat Jabatan", "required"=>"required", "class"=>"form-control"]) ?>										
							</br><?= Html::label( "Gaji Minimal", ["class"=>"form-control"]) ?>						
							<?= Html::input("number", "gaji_min", null, ["placeholder"=>"Gaji Minimal (Rupiah)", "required"=>"required", "class"=>"form-control"]) ?>										
							</br><?= Html::label( "Gaji Maksimal", ["class"=>"form-control"]) ?>						
							<?= Html::input("number", "gaji_max", null, ["placeholder"=>"Gaji Maksimal (Rupiah)", "required"=>"required", "class"=>"form-control"]) ?>							
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