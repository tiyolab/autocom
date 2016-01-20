<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BaPengembalian */

$this->title = 'Update Ba Pengembalian: ' . ' ' . $model->ID_Bab;
$this->params['breadcrumbs'][] = ['label' => 'Ba Pengembalians', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID_Bab, 'url' => ['view', 'id' => $model->ID_Bab]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ba-pengembalian-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
