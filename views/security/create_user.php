<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

use app\models\UserType;
?>
<h3>Create new user type</h3>
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
			<?= Html::input("text", "username", null, ["placeholder"=>"Username", "required"=>"required"]) ?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-lg-offset-1 col-lg-11">
			<?= Html::input("password", "password", null, ["placeholder"=>"Password", "required"=>"required"]) ?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-lg-offset-1 col-lg-11">
			<?= Html::input("email", "email", null, ["placeholder"=>"Email", "required"=>"required"]) ?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-lg-offset-1 col-lg-11">
			<?= Html::input("text", "sec_question", "nama project?", ["required"=>"required"]) ?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-lg-offset-1 col-lg-11">
			<?= Html::input("text", "sec_answer", "autocom", ["required"=>"required"]) ?>
		</div>
	</div>

	<label>User type will be attached</label>

	<div class="form-group">
		<div class="col-lg-offset-1 col-lg-11">
			<ul>
			<?php
				foreach (UserType::find()->asArray()->all() as $key => $value) {
					echo "<li>";
						echo Html::radio("user_type", false, ["label"=>$value["name"], "value"=>$value["id"]]);
					echo "</li>";
				}
			?>
			</ul>
		</div>
	</div>

	<div class="form-group">
		<div class="col-lg-offset-1 col-lg-11">
			<?= Html::submitButton('Save', ['class' => 'btn btn-primary', 'name' => 'save-button']) ?>
		</div>
	</div>

<?php ActiveForm::end(); ?>