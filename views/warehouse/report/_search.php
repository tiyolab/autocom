<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\logistic\LgPengirimanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lg-pengiriman-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'kode') ?>

    <?= $form->field($model, 'tgl_order') ?>

    <?= $form->field($model, 'tgl_pengiriman') ?>

    <?= $form->field($model, 'tgl_terima') ?>

    <?= $form->field($model, 'tujuan') ?>

    <?php // echo $form->field($model, 'barang') ?>

    <?php // echo $form->field($model, 'kendaraan') ?>

    <?php // echo $form->field($model, 'kurir') ?>

    <?php // echo $form->field($model, 'status_approve') ?>

    <?php // echo $form->field($model, 'status_pengiriman') ?>

    <?php // echo $form->field($model, 'ongkir') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
