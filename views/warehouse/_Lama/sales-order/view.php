<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\SalesOrder */

$this->title = $model->ID_SO;
$this->params['breadcrumbs'][] = ['label' => 'Sales Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sales-order-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ID_SO], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ID_SO], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID_SO',
            'Kode_SO',
            'Kode_Barang',
            'Nama_Barang',
            'Kemasan_ID',
            'Jumlah',
            'HargaSatuan',
            'SuratJalan_ID',
            'Tanggal_Order',
            'Status',
        ],
    ]) ?>

</div>
