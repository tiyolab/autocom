<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BabMasukSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bab-masuk-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID_Bab_masuk') ?>

    <?= $form->field($model, 'No_Faktur') ?>

    <?= $form->field($model, 'No_Surat_Jalan') ?>

    <?= $form->field($model, 'ID_PO') ?>

    <?= $form->field($model, 'Tanggal_Surat') ?>

    <?php // echo $form->field($model, 'Tanggal_Terima') ?>

    <?php // echo $form->field($model, 'Kondisi') ?>

    <?php // echo $form->field($model, 'User_Id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
