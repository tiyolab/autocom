<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\logistic\LgPengiriman */

$this->title = 'Update Pengiriman: ' . ' ' . $model->kode;
$this->params['breadcrumbs'][] = ['label' => 'Lg Pengirimen', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->kode, 'url' => ['view', 'id' => $model->kode]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="lg-pengiriman-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
