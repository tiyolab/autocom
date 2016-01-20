<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\BabKeluar */

$this->title = $model->ID_Bab_Keluar;
$this->params['breadcrumbs'][] = ['label' => 'Berita Acara Barang Keluar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bab-keluar-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ID_Bab_Keluar], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ID_Bab_Keluar], [
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
            'ID_Bab_Keluar',
            'NO_Surat_Jalan',
            'ID_SO',
            'Tanggal_Surat',
            'Tanggal_Keluar',
            'Kondisi',
            'User_Id',
        ],
    ]) ?>

</div>
