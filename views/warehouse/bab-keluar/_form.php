<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\warehouse\SalesOrder;

/* @var $this yii\web\View */
/* @var $model app\models\BabKeluar */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bab-keluar-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ID_Bab_Keluar')->textInput() ?>

    <?= $form->field($model, 'NO_Surat_Jalan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ID_SO')->dropDownList(
        ArrayHelper::map(SalesOrder::findBySql("Select * from salesorder where status='On The Way'")->all(),'ID_SO','ID_SO'),
        ['prompt'=>'Select Sales Order']
    )?>

    <?= $form->field($model, 'Tanggal_Surat')->textInput(['maxlength' => 255, 'class' => 'form-control input-datepicker class'])->label('Tanggal_Surat');
    ?>

    <?= $form->field($model, 'Tanggal_Keluar')->textInput(['maxlength' => 255, 'class' => 'form-control input-datepicker class'])->label('Tanggal_Keluar');
    ?>

    <?= $form->field($model, 'Kondisi')->dropDownList(['Baik'=>'Baik','Buruk'=>'Buruk'],['prompt'=>'Select Kondisi']) ?>

    <?= $form->field($model, 'User_Id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
