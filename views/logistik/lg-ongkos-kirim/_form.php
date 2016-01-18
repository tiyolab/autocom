<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\logistic\LgOngkosKirim */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lg-ongkos-kirim-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tujuan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'day')->textInput() ?>

    <?= $form->field($model, 'harga')->textInput() ?>

    <?= $form->field($model, 'harga_perweight')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
