<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PurchaseOrderSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="purchase-order-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID_PO') ?>

    <?= $form->field($model, 'Kode_PO') ?>

    <?= $form->field($model, 'Kode_Barang') ?>

    <?= $form->field($model, 'Nama_Barang') ?>

    <?= $form->field($model, 'Kemasan_ID') ?>

    <?php // echo $form->field($model, 'Jumlah') ?>

    <?php // echo $form->field($model, 'HargaSatuan') ?>

    <?php // echo $form->field($model, 'Distributor_ID') ?>

    <?php // echo $form->field($model, 'Tanggal_Order') ?>

    <?php // echo $form->field($model, 'Status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
