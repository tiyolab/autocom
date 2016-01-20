<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

/* @var $this yii\web\View */
/* @var $model app\models\Kemasan */

$this->title = 'Update Kemasan: ' . ' ' . $model->Kemasan_ID;
$this->params['breadcrumbs'][] = ['label' => 'Kemasans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Kemasan_ID, 'url' => ['view', 'id' => $model->Kemasan_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="side">
    <div class="sub-sidebar-wrapper">
      <ul class="nav">
       <?php
            echo Nav::widget([
                    'items' => [
                    ['label' => 'Barang', 'url' => ['/warehouse/barangindex']],
                    ['label' => 'Kemasan', 'url' => ['/warehouse/kemasanindex']],
                    ['label' => 'Jenis Barang', 'url' => ['/warehouse/jenisbarangindex']],                  
                    ['label' => 'Gudang', 'url' => ['/warehouse/gudangindex']],
                    ['label' => 'Blok', 'url' => ['/warehouse/blokindex']],
                    ['label' => 'Distributor', 'url' => ['warehouse/distributorindex']],
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
						<div class="kemasan-update">

						    <h1><?= Html::encode($this->title) ?></h1>

						    <?= $this->render('_form', [
						        'model' => $model,
						    ]) ?>

						</div>

                    </div>

                    </div>
                </div>
            </div>
    </div>
</div>

