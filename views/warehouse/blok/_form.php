<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\warehouse\Gudang;

/* @var $this yii\web\View */
/* @var $model app\models\Blok */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="blok-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Blok_ID')->textInput(['disabled' => false]) ?>

    <?= $form->field($model, 'Nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Gudang_ID')->dropDownList(
        ArrayHelper::map(Gudang::find()->all(),'Gudang_ID','Nama'),
        ['prompt'=>'Select Gudang']
    )?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
