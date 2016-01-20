<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\logistic\LgPengiriman */

$this->title = $model->kode;
$this->params['breadcrumbs'][] = ['label' => 'Lg Pengirimen', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lg-pengiriman-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->kode], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->kode], [
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
            'kode',
            'tgl_order',
            'tgl_pengiriman',
            'tgl_terima',
            'tujuan',
            'barang',
            'kendaraan',
            'kurir',
            'status_approve',
            'status_pengiriman',
            'ongkir',
        ],
    ]) ?>

</div>
