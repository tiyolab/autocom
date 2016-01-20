<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

/* @var $this yii\web\View */
/* @var $model app\models\PurchaseOrder */

$this->title = 'Tambah Data Purchase Order';
$this->params['breadcrumbs'][] = ['label' => 'Purchase Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="side">
    <div class="sub-sidebar-wrapper">
      <ul class="nav">
        <?php
            echo Nav::widget([
                    'items' => [
                    ['label' => 'Purchase Order', 'url' => ['/warehouse/purchaseorderindex']],
                    ['label' => 'Sales Order', 'url' => ['/warehouse/salesorderindex']],
                ],
            ]);
        ?>
      </ul>
    </div>
</div>

<div class="purchase-order-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
