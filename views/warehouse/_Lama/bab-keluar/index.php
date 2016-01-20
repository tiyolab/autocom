<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BabKeluarSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bab Keluars';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bab-keluar-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Bab Keluar', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID_Bab_Keluar',
            'NO_Surat_Jalan',
            'ID_SO',
            'Tanggal_Surat',
            'Tanggal_Keluar',
            'Kondisi',
            'User_Id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
