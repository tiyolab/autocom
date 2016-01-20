<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

/* @var $this yii\web\View */
/* @var $model app\models\Blok */

$this->title = $model->Blok_ID;
$this->params['breadcrumbs'][] = ['label' => 'Data Blok', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
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
                        <div class="blok-view">
                            <h1><?= Html::encode($this->title) ?></h1>

                            <p>
                                <?= Html::a('Update', ['update', 'id' => $model->Blok_ID], ['class' => 'btn btn-primary']) ?>
                                <?= Html::a('Delete', ['delete', 'id' => $model->Blok_ID], [
                                    'class' => 'btn btn-danger',
                                    'data' => [
                                        'confirm' => 'Are you sure you want to delete this item?',
                                        'method' => 'post',
                                    ],
                                ]) ?>
                            </p>

                            <?= DetailView::widget([
                                'model' => $model,
                                'attributes' => [
                                    'Blok_ID',
                                    'Nama',
                                    'Gudang_ID',
                                ],
                            ]) ?>

                        </div>
                    </div>

                    </div>
                </div>
            </div>
    </div>
</div>

