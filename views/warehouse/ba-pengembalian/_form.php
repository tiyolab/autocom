<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\warehouse\PurchaseOrder;
use app\models\warehouse\Gudang;


/* @var $this yii\web\View */
/* @var $model app\models\BaPengembalian */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ba-pengembalian-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ID_Bab')->textInput() ?>

    <?= $form->field($model, 'No_Faktur')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'No_Surat_Jalan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ID_PO')->dropDownList(
        ArrayHelper::map(PurchaseOrder::findBySql("Select * from purchaseorder")->all(),'ID_PO','ID_PO','Status'),
        ['prompt'=>'Select Purchase Order']
    )?>

    <?= $form->field($model, 'Tanggal_Surat')->textInput(['maxlength' => 255, 'class' => 'form-control input-datepicker class'])->label('Tanggal_Surat');
    ?>

    <?= $form->field($model, 'Tanggal_Terima')->textInput(['maxlength' => 255, 'class' => 'form-control input-datepicker class'])->label('Tanggal_Terima');
    ?>

    <?= $form->field($model, 'Kondisi')->dropDownList(['Buruk'=>'Buruk','Pinjam'=>'Pinjam'],['prompt'=>'Select Kondisi']) ?>
	 <?= $form->field($model, 'Gudang_ID')->dropDownList(
        ArrayHelper::map(Gudang::find()->all(),'Gudang_ID','Nama'),
        ['prompt'=>'Select Gudang']
    )?>
    <?= $form->field($model, 'User_Id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
