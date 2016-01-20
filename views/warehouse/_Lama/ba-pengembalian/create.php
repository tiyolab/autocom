<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\BaPengembalian */

$this->title = 'Create Ba Pengembalian';
$this->params['breadcrumbs'][] = ['label' => 'Ba Pengembalians', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ba-pengembalian-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
