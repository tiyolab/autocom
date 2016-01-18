<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\logistic\LgStatusKendaraanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lg-status-kendaraan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'kode') ?>

    <?= $form->field($model, 'kendaraan') ?>

    <?= $form->field($model, 'tgl_permasalahan') ?>

    <?= $form->field($model, 'permasalahan') ?>

    <?= $form->field($model, 'tanggal_solusi') ?>

    <?php // echo $form->field($model, 'solusi') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
