<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

use app\models\Module;
use app\models\User;

$module = Module::find()->asArray()->all();
$datauser = new User();

$session = Yii::$app->session;
$session->open();
$user_session = $session['session.user'];

$session->close();
?>

<h3>Buat Memo</h3>

<?php

$form = ActiveForm::begin([
    'id' => 'create-role-form',
    'options' => ['class' => 'form-horizontal', 'data-toggle'=>'validator'],
    'fieldConfig' => 	[
        'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
        'labelOptions' => ['class' => 'col-lg-1 control-label'],
    ],
]);

?>
<br>
<?= Html::input("hidden", "id_pengirim", $user_session['id'], ["required"=>"required"]) ?><br>
<select name="id_penerima">
    <option>pilih</option>
<?php
    foreach($datauser -> showalluser($user_session['id']) as $item => $value){
        echo "<option value=".$value['id'].">".$value['username']." - ".$value['email']."</option>";
    }
?>
</select>
<br><br>
<?= Html::textarea("isi", null, ["placeholder"=>"isi memo", "required"=>"required"]) ?><br>

<br>

<?= Html::submitButton('Kirim', ['class' => 'btn btn-primary', 'name' => 'send-button']) ?>

<?php ActiveForm::end(); ?>

<br>
