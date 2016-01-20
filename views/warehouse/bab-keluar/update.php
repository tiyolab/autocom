<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BabKeluar */

$this->title = 'Update Bab Keluar: ' . ' ' . $model->ID_Bab_Keluar;
$this->params['breadcrumbs'][] = ['label' => 'Berita Acara Keluar', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID_Bab_Keluar, 'url' => ['view', 'id' => $model->ID_Bab_Keluar]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bab-keluar-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
