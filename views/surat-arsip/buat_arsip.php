<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$session = Yii::$app->session;
$session->open();
$user_session = $session['session.user'];
$session->close();

$id = $user_session['id'];
?>

<div class="item-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'nama') ?>
    <?= $form->field($model, 'imageFile')->fileInput() ?>
    <input type="hidden" id="arsip-id_user" class="form-control" name="Arsip[id_user]" value="<?= $id ?>">
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>