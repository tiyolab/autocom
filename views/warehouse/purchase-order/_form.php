<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\warehouse\Barang;
use app\models\warehouse\Distributor;

/* @var $this yii\web\View */
/* @var $model app\models\PurchaseOrder */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="purchase-order-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Kode_PO')->textInput() ?>

    <?= $form->field($model, 'Kode_Barang')->dropDownList(
        ArrayHelper::map(Barang::find()->all(),'Kode_Barang','Nama_Barang'),
        ['prompt'=>'Select Barang']
    )?>

    <?= $form->field($model, 'Jumlah')->textInput() ?>

    <?= $form->field($model, 'Distributor_ID')->dropDownList(
        ArrayHelper::map(Distributor::find()->all(),'ID_Distributor','Nama'),
        ['prompt'=>'Select Distributor']
    )?>

   
 <?= $form->field($model, 'Tanggal_Order')->textInput(['maxlength' => 255, 'class' => 'form-control input-datepicker class'])->label('Tanggal Order');?>
    <?= $form->field($model, 'Status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
