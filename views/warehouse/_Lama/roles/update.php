<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

/* @var $this yii\web\View */
/* @var $model app\models\Roles */

$this->title = 'Update Roles: ' . ' ' . $model->Roles_Id;
$this->params['breadcrumbs'][] = ['label' => 'Roles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Roles_Id, 'url' => ['view', 'id' => $model->Roles_Id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="side">
    <div class="sub-sidebar-wrapper">
      <ul class="nav">
        <?php
            echo Nav::widget([
                    'items' => [
                    ['label' => 'Barang', 'url' => ['barang/index']],
                    ['label' => 'Kemasan', 'url' => ['/kemasan/index']],
                    ['label' => 'Jenis Barang', 'url' => ['/jenisbarang/index']],                   
                    ['label' => 'Gudang', 'url' => ['/gudang/index']],
                    ['label' => 'Blok', 'url' => ['/blok/index']],
                    ['label' => 'User', 'url' => ['/user/index']],
                    ['label' => 'Roles', 'url' => ['/roles/index']],
                    ['label' => 'Distributor', 'url' => ['/distributor/index']],
                ],
            ]);
        ?>
      </ul>
    </div>
</div>
<div class="col-md-12">
    <div class="widget widget-green">
        <div class="widget-title">
            <div class="widget-controls">
                <a href="#" class="widget-control widget-control-full-screen" data-toggle="tooltip" data-placement="top" title="" data-original-title="Full Screen"><i class="fa fa-expand"></i></a>
                <a href="#" class="widget-control widget-control-full-screen widget-control-show-when-full" data-toggle="tooltip" data-placement="left" title="" data-original-title="Exit Full Screen"><i class="fa fa-expand"></i></a>
                <a href="#" class="widget-control widget-control-refresh" data-toggle="tooltip" data-placement="top" title="" data-original-title="Refresh"><i class="fa fa-refresh"></i></a>
                <a href="#" class="widget-control widget-control-minimize" data-toggle="tooltip" data-placement="top" title="" data-original-title="Minimize"><i class="fa fa-minus-circle"></i></a>
            </div>
            <h3><i class="fa fa-ok-circle"></i>Data Form</h3>
        </div>
            <div class="widget-content">
                <div class="row">
                    <div class="col-md-12">
						<div class="user-form">

						    <?php $form = ActiveForm::begin(); ?>

						    <?= $form->field($model, 'User_ID')->textInput() ?>

						    <?= $form->field($model, 'Nama')->textInput(['maxlength' => true]) ?>

						    <?= $form->field($model, 'Roles_ID')->textInput() ?>

						    <div class="form-group">
						        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
						    </div>

						    <?php ActiveForm::end(); ?>

						</div>
                    </div>

                    </div>
                </div>
            </div>
    </div>
</div>

<div class="roles-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
