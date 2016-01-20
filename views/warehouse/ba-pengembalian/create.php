<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;


/* @var $this yii\web\View */
/* @var $model app\models\BaPengembalian */

$this->title = 'Tambah Data Pengembalian Barang';
$this->params['breadcrumbs'][] = ['label' => 'Ba Pengembalians', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="side">
    <div class="sub-sidebar-wrapper">
      <ul class="nav">
        <?php
            echo Nav::widget([
                    'items' => [
                    ['label' => 'Berita Acara Masuk', 'url' => ['/warehouse/babmasukindex']],
                    ['label' => 'Berita Acara Keluar', 'url' => ['warehouse/babkeluarindex']],
                    ['label' => 'Berita Acara Pengembalian', 'url' => ['warehouse/bapengembalianindex']],
                ],
            ]);
        ?>
      </ul>
    </div>
</div>
<div class="ba-pengembalian-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
