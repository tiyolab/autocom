<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\logistic\LgPengiriman */

$this->title = 'Create Lg Pengiriman';
$this->params['breadcrumbs'][] = ['label' => 'Lg Pengirimen', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lg-pengiriman-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
