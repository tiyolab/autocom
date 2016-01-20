<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\BabKeluar */

$this->title = 'Create Bab Keluar';
$this->params['breadcrumbs'][] = ['label' => 'Bab Keluars', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bab-keluar-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
