<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PurchaseOrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Purchase Orders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="purchase-order-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Purchase Order', ['/warehouse/purchaseordercreate'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID_PO',
            'Kode_PO',
            'Kode_Barang',
            'Nama_Barang',
            'Kemasan_ID',
            'Jumlah',
            'HargaSatuan',
            'Distributor_ID',
            'Tanggal_Order',
            'Status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
