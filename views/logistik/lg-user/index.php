<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\logistic\LgUserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lg Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lg-user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Lg User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'kode',
            'username',
            'password',
            'nama_lengkap',
            'jabatan',
            // 'level',
            // 'identitas',
            // 'foto',
            // 'last_login',
            // 'last_logout',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
