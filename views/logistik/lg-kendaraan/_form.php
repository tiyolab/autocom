<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\logistic\LgJenisKendaraan;
use app\models\logistic\Pegawai;

/* @var $this yii\web\View */
/* @var $model app\models\logistic\LgKendaraan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lg-kendaraan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nomor_polisi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tahun_pembelian')->textInput() ?>

    <?= $form->field($model, 'jenis_transportasi')->dropdownList(LgJenisKendaraan::find()->select(['jenis_kendaraan', 'kode'])->indexBy('kode')->column(),['prompt'=>'Select Jenis Kendaraan']); ?>

    <?= $form->field($model, 'penanggung_jawab')->dropdownList(Pegawai::find()->select(['nama_lengkap', 'id_pegawai'])->indexBy('id_pegawai')->column(),['prompt'=>'Select Penanggung Jawab']); ?>

    <?= $form->field($model, 'bahan_bakar')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'berat_muatan')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
