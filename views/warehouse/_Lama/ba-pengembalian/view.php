<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\BaPengembalian */

$this->title = $model->ID_Bab;
$this->params['breadcrumbs'][] = ['label' => 'Ba Pengembalians', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ba-pengembalian-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ID_Bab], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ID_Bab], [
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
            'ID_Bab',
            'No_Faktur',
            'No_Surat_Jalan',
            'ID_PO',
            'Tanggal_Surat',
            'Tanggal_Terima',
            'Kondisi',
            'User_Id',
        ],
    ]) ?>

</div>
