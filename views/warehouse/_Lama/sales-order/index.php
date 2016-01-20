<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SalesOrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sales Orders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sales-order-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Sales Order', ['warehouse/salesordercreate'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

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

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
