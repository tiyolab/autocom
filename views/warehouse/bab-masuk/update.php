<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BabMasuk */

$this->title = 'Update Bab Masuk: ' . ' ' . $model->ID_Bab_masuk;
$this->params['breadcrumbs'][] = ['label' => 'Berita Acara Barang Masuk', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID_Bab_masuk, 'url' => ['view', 'id' => $model->ID_Bab_masuk]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bab-masuk-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
