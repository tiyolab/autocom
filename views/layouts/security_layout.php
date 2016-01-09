<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<?php
$session = Yii::$app->session;
$session->open();
$user_session = $session['session.user'];
$session->close();
?>

<label>Welcome <?=$user_session['username']?>, You're Login as <?=$user_session['user_type']?></label><br>
 	<div class="container">
 		<div>
 			<?= Html::a("Role Management", Yii::$app->urlManager->createUrl('security/role-management'), array()) ?> |
 			<?= Html::a("User Type Management", Yii::$app->urlManager->createUrl('security/user-type-management'), array()) ?> |
 			<?= Html::a("User Management", Yii::$app->urlManager->createUrl('security/user-management'), array()) ?> |
 		</div>
        <?= $content ?>
    </div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
