<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SalesOrderSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sales-order-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID_SO') ?>

    <?= $form->field($model, 'Kode_SO') ?>

    <?= $form->field($model, 'Kode_Barang') ?>

    <?php // echo $form->field($model, 'Jumlah') ?>

    <?php // echo $form->field($model, 'HargaSatuan') ?>

    <?php // echo $form->field($model, 'SuratJalan_ID') ?>

    <?php // echo $form->field($model, 'Tanggal_Order') ?>

    <?php // echo $form->field($model, 'Status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
