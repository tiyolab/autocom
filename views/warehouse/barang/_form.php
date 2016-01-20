<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\grid\GridView;
use app\models\warehouse\JenisBarang;
use app\models\warehouse\Kemasan;
use app\models\warehouse\Blok;

/* @var $this yii\web\View */
/* @var $model app\models\Barang */
/* @var $form yii\widgets\ActiveForm */

//dropdown value=>text
?>

<div class="barang-form">


    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'Kode_Barang')->textInput(['disabled' => false]) ?>

    <?= $form->field($model, 'Nama_Barang')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Jenis_Barang')->dropDownList(
        ArrayHelper::map(JenisBarang::find()->all(),'Jenis_Barang_ID','Nama'),
        ['prompt'=>'Select Jenis Barang']
    )?>

    <?= $form->field($model, 'Kemasan_ID')->dropDownList(
        ArrayHelper::map(Kemasan::find()->all(),'Kemasan_ID','Qty','Nama'),
        ['prompt'=>'Select Kemasan']
    )?>

    <?= $form->field($model, 'Blok_ID')->dropDownList(
        ArrayHelper::map(Blok::find()->all(),'Blok_ID','Nama'),
        ['prompt'=>'Select Blok']
    )?>

    <?= $form->field($model, 'Kadaluarsa')->textInput(['maxlength' => 255, 'class' => 'form-control input-datepicker class'])->label('Kadaluarsa');
    ?>

    <?= $form->field($model, 'Status')->textInput() ?>

    <?= $form->field($model, 'Harga_Satuan')->textInput() ?>

    <?= $form->field($model, 'Stock')->textInput() ?>

    <?= $form->field($model, 'file')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
