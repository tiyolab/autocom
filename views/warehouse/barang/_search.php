<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

/* @var $this yii\web\View */
/* @var $model app\models\BarangSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="barang-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID') ?>

    <?= $form->field($model, 'Kode_Barang') ?>

    <?= $form->field($model, 'Nama_Barang') ?>

    <?= $form->field($model, 'Jenis_Barang') ?>

    <?= $form->field($model, 'Kemasan_ID') ?>

    <?php // echo $form->field($model, 'Blok_ID') ?>

    <?php // echo $form->field($model, 'Kadaluarsa') ?>

    <?php // echo $form->field($model, 'Status') ?>

    <?php // echo $form->field($model, 'Harga_Satuan') ?>

    <?php // echo $form->field($model, 'Stock') ?>

    <?php // echo $form->field($model, 'Gambar') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
