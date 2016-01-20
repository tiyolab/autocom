<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SalesOrder */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sales-order-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Kode_SO')->textInput() ?>

    <?= $form->field($model, 'Kode_Barang')->textInput() ?>

    <?= $form->field($model, 'Nama_Barang')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Kemasan_ID')->textInput() ?>

    <?= $form->field($model, 'Jumlah')->textInput() ?>

    <?= $form->field($model, 'HargaSatuan')->textInput() ?>

    <?= $form->field($model, 'SuratJalan_ID')->textInput() ?>

    <?= $form->field($model, 'Tanggal_Order')->textInput() ?>

    <?= $form->field($model, 'Status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
