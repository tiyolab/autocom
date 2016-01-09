<?php
use yii\helpers\Html;
?>

<?= Html::a("Buat Memo", Yii::$app->urlManager->createUrl(['surat-arsip/buat-memo']), ["class"=>["btn","btn-primary"]])?>
<br> Melihat daftar memo masuk