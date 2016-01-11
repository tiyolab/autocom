<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Arsip;

$model = new Arsip();

$form = ActiveForm::begin([
    'id' => 'buatarsip',
    'options' => ['class' => 'form'],
]) ?>

<?= $form->field($model, 'id_arsip')?>
<?= $form->field($model, 'nama') ?>
<?= $form->field($model, 'file') ?>

<?= Html::submitButton('Simpan', ['class' => 'btn btn-success', 'name' => 'send-button ' ]) ?>

<?php
ActiveForm::end()
?>
