<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

/* @var $this yii\web\View */
/* @var $model app\models\Barang */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="barang-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Kode_Barang')->textInput() ?>

    <?= $form->field($model, 'Nama_Barang')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Jenis_Barang')->textInput() ?>

    <?= $form->field($model, 'Kemasan_ID')->textInput() ?>

    <?= $form->field($model, 'Blok_ID')->textInput() ?>

    <?= $form->field($model, 'Kadaluarsa')->textInput() ?>

    <?= $form->field($model, 'Status')->textInput() ?>

    <?= $form->field($model, 'Harga_Satuan')->textInput() ?>

    <?= $form->field($model, 'Stock')->textInput() ?>

    <?= $form->field($model, 'Gambar')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
