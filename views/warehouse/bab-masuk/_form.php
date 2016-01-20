<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\warehouse\PurchaseOrder;

/* @var $this yii\web\View */
/* @var $model app\models\BabMasuk */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bab-masuk-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ID_Bab_masuk')->textInput() ?>

    <?= $form->field($model, 'No_Faktur')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'No_Surat_Jalan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ID_PO')->dropDownList(
        ArrayHelper::map(PurchaseOrder::findBySql("Select * from purchaseorder where status='On The Way'")->all(),'ID_PO','ID_PO'),
        ['prompt'=>'Select Purchase Order']
    )?>

    <?= $form->field($model, 'Tanggal_Surat')->textInput(['maxlength' => 255, 'class' => 'form-control input-datepicker class'])->label('Tanggal_Surat');
    ?>

    <?= $form->field($model, 'Tanggal_Terima')->textInput(['maxlength' => 255, 'class' => 'form-control input-datepicker class'])->label('Tanggal_Terima');
    ?>

    <?= $form->field($model, 'Kondisi')->dropDownList(['Baik'=>'Baik','Buruk'=>'Buruk'],['prompt'=>'Select Kondisi']) ?>

    <?= $form->field($model, 'User_Id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
