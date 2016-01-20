<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BabKeluarSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bab-keluar-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID_Bab_Keluar') ?>

    <?= $form->field($model, 'NO_Surat_Jalan') ?>

    <?= $form->field($model, 'ID_SO') ?>

    <?= $form->field($model, 'Tanggal_Surat') ?>

    <?= $form->field($model, 'Tanggal_Keluar') ?>

    <?php // echo $form->field($model, 'Kondisi') ?>

    <?php // echo $form->field($model, 'User_Id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
