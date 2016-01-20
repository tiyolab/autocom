<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Blok */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="blok-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Blok_ID')->textInput() ?>

    <?= $form->field($model, 'Nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Gudang_ID')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
