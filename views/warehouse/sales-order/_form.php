<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\warehouse\Barang;

/* @var $this yii\web\View */
/* @var $model app\models\SalesOrder */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sales-order-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Kode_SO')->textInput() ?>

    <?= $form->field($model, 'Kode_Barang')->dropDownList(
        ArrayHelper::map(Barang::find()->all(),'Kode_Barang','Nama_Barang'),
        ['prompt'=>'Select Barang']
    )?>

    <?= $form->field($model, 'Jumlah')->textInput() ?>

    <?= $form->field($model, 'SuratJalan_ID')->textInput() ?>

	 <?= $form->field($model, 'Tanggal_Order')->textInput(['maxlength' => 255, 'class' => 'form-control input-datepicker class'])->label('Tanggal Order');
    ?>

    <?= $form->field($model, 'Status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
