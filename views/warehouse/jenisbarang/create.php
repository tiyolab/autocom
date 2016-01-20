<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;


/* @var $this yii\web\View */
/* @var $model app\models\JenisBarang */

$this->title = 'Create Jenis Barang';
$this->params['breadcrumbs'][] = ['label' => 'Jenis Barangs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
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
            <div class="widget-content">
                <div class="row">
                    <div class="col-md-12">
						<div class="jenis-barang-create">

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


