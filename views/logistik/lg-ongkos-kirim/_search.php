<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\logistic\LgOngkosKirimSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lg-ongkos-kirim-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'kode') ?>

    <?= $form->field($model, 'tujuan') ?>

    <?= $form->field($model, 'day') ?>

    <?= $form->field($model, 'harga') ?>

    <?php // echo $form->field($model, 'harga_perweight') ?>

    <?php // echo $form->field($model, 'dimension') ?>

    <?php // echo $form->field($model, 'harga_perdimension') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
