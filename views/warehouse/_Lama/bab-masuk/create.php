<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\BabMasuk */

$this->title = 'Create Bab Masuk';
$this->params['breadcrumbs'][] = ['label' => 'Bab Masuks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bab-masuk-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
