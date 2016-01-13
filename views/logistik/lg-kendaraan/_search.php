<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\logistic\LgKendaraanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lg-kendaraan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'kode') ?>

    <?= $form->field($model, 'nomor_polisi') ?>

    <?= $form->field($model, 'tahun_pembelian') ?>

    <?= $form->field($model, 'jenis_transportasi') ?>

    <?= $form->field($model, 'penanggung_jawab') ?>

    <?php // echo $form->field($model, 'bahan_bakar') ?>

    <?php // echo $form->field($model, 'berat_muatan') ?>

    <?php // echo $form->field($model, 'status_pemakaian') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
