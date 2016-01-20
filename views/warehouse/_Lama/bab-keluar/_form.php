<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BabKeluar */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bab-keluar-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ID_Bab_Keluar')->textInput() ?>

    <?= $form->field($model, 'NO_Surat_Jalan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ID_SO')->textInput() ?>

    <?= $form->field($model, 'Tanggal_Surat')->textInput() ?>

    <?= $form->field($model, 'Tanggal_Keluar')->textInput() ?>

    <?= $form->field($model, 'Kondisi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'User_Id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
