<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

use app\models\Role;
use app\models\UserType;

$myUserType = UserType::find()->where(['id'=>Yii::$app->request->get()['id']])->asArray()->one();
?>

<h3>Update user type</h3>
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
			<?= Html::input("text", "name", $myUserType['name'], ["placeholder"=>"user type name", "required"=>"required"]) ?>
		</div>
	</div>

	<label>Role will be attached</label>

	<div class="form-group">
		<div class="col-lg-offset-1 col-lg-11">
			<ul>
			<?php
				foreach (Role::find()->asArray()->all() as $key => $value) {
					echo "<li>";
					if($value["id"] == $myUserType['role']){
						echo Html::radio("role", true, ["label"=>$value["name"], "value"=>$value["id"]]);
					}else{
						echo Html::radio("role", false, ["label"=>$value["name"], "value"=>$value["id"]]);
					}
						
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