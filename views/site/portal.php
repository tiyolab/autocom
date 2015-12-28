<?php

use app\models\Module;

use yii\helpers\Html;

$module = Module::find()->asArray()->all();

$session = Yii::$app->session;
$session->open();
$user_session = $session['session.user'];
$session->close();
?>

<label>Welcome <?=$user_session['username']?>, You're Login as <?=$user_session['user_type']?></label><br>

<?php foreach ($module as $key => $value) {
	if(isset($user_session['hak_akses'][$value['id']]) && !empty(isset($user_session['hak_akses'][$value['id']]))){
		echo Html::a($value['name'], Yii::$app->urlManager->createUrl(strtolower($value['name'])), ["disabled"=>false, "class"=>["btn", "btn-primary"], "style"=>["color"=>"white"]]);
	}else{
		echo Html::a($value['name'], null, ["disabled"=>true, "class"=>["btn", "btn-primary"], "style"=>["color"=>"black"]]);
	}
}
?>