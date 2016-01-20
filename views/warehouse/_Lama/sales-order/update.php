<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SalesOrder */

$this->title = 'Update Sales Order: ' . ' ' . $model->ID_SO;
$this->params['breadcrumbs'][] = ['label' => 'Sales Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID_SO, 'url' => ['view', 'id' => $model->ID_SO]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sales-order-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
