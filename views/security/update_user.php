<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

use app\models\UserType;
use app\models\User;

$user = User::find()->where(['id'=>Yii::$app->request->get()['id']])->asArray()->one();
?>
<h3>Update user <?=$user['username']?></h3>
<?php $form = ActiveForm::begin([
	'id' => 'create-user-type-form',
	'options' => ['class' => 'form-horizontal', 'data-toggle'=>'validator'],
	'fieldConfig' => [
	'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
	'labelOptions' => ['class' => 'col-lg-1 control-label'],
	],
]); ?>

	<div class="form-group">
		<div class="col-lg-offset-1 col-lg-11">
			<?= Html::input("text", "username", $user['username'], ["placeholder"=>"Username", "required"=>"required"]) ?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-lg-offset-1 col-lg-11">
			<?= Html::input("email", "email", $user['email'], ["placeholder"=>"Email", "required"=>"required"]) ?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-lg-offset-1 col-lg-11">
			<?= Html::input("text", "sec_question", $user['sec_question'], ["required"=>"required"]) ?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-lg-offset-1 col-lg-11">
			<?= Html::input("text", "sec_answer", $user['sec_answer'], ["required"=>"required"]) ?>
		</div>
	</div>

	<label>User type will be attached</label>

	<div class="form-group">
		<div class="col-lg-offset-1 col-lg-11">
			<ul>
			<?php
				foreach (UserType::find()->asArray()->all() as $key => $value) {
					echo "<li>";
					if($value["id"] == $user['user_type'])
						echo Html::radio("user_type", true, ["label"=>$value["name"], "value"=>$value["id"]]);
					else
						echo Html::radio("user_type", false, ["label"=>$value["name"], "value"=>$value["id"]]);
					echo "</li>";
				}
			?>
			</ul>
		</div>
	</div>

	<div class="form-group">
		<div class="col-lg-offset-1 col-lg-11">
			<?= Html::submitButton('Save', ['class' => 'btn btn-primary']) ?>
		</div>
	</div>

<?php ActiveForm::end(); ?>