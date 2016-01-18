<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\logistic\LgUser */

$this->title = 'Create Lg User';
$this->params['breadcrumbs'][] = ['label' => 'Lg Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lg-user-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
