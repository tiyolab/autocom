<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BaPengembalianSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ba Pengembalians';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ba-pengembalian-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Ba Pengembalian', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID_Bab',
            'No_Faktur',
            'No_Surat_Jalan',
            'ID_PO',
            'Tanggal_Surat',
            'Tanggal_Terima',
            'Kondisi',
            'User_Id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
