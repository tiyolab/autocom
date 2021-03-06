<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\logistic\LgKendaraan;

/* @var $this yii\web\View */
/* @var $model app\models\logistic\LgStatusKendaraan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lg-status-kendaraan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'kendaraan')->dropdownList(LgKendaraan::find()->select(['nomor_polisi', 'kode'])->indexBy('kode')->column(),['prompt'=>'Select Kendaraan','disabled' => true]); ?>

    <?= $form->field($model, 'tgl_permasalahan')->textInput(['readonly' => true]) ?>

    <?= $form->field($model, 'permasalahan')->textArea(['maxlength' => true]) ?>

    <?= $form->field($model, 'tanggal_solusi')->textInput(['readonly' => true, 'value' => date("Y-m-h")]) ?>

    <?= $form->field($model, 'solusi')->textArea(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Solusi', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
