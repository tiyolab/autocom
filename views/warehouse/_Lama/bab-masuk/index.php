<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BabMasukSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bab Masuks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bab-masuk-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Bab Masuk', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID_Bab_masuk',
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
