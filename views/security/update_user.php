<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

use app\models\UserType;
use app\models\User;

$user = User::find()->where(['id'=>Yii::$app->request->get()['id']])->asArray()->one();
?>



<div class="col-md-12">
    <div class="widget widget-green">
        <div class="widget-title">
            <div class="widget-controls">
				<a href="#" class="widget-control widget-control-full-screen" data-toggle="tooltip" data-placement="top" title="" data-original-title="Full Screen"><i class="fa fa-expand"></i></a>
				<a href="#" class="widget-control widget-control-full-screen widget-control-show-when-full" data-toggle="tooltip" data-placement="left" title="" data-original-title="Exit Full Screen"><i class="fa fa-expand"></i></a>
				<a href="#" class="widget-control widget-control-refresh" data-toggle="tooltip" data-placement="top" title="" data-original-title="Refresh"><i class="fa fa-refresh"></i></a>
				<a href="#" class="widget-control widget-control-minimize" data-toggle="tooltip" data-placement="top" title="" data-original-title="Minimize"><i class="fa fa-minus-circle"></i></a>
			</div>
            <h3><i class="fa fa-ok-circle"></i>Update user <i><b><?=$user['username']?></b></i></h3>
        </div>
			<div class="widget-content">
				<div class="row">
					<div class="col-md-12">
						
						<?php $form = ActiveForm::begin([
							'id' => 'create-role-form',
							'options' => ['class' => 'form-horizontal', 'data-toggle'=>'validator', 'role'=>'form'],
							'fieldConfig' => [
							'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
							'labelOptions' => ['class' => 'col-lg-1 control-label'],
							],
						]); ?>

								<div class="form-group">
									<label>Username</label>
									<?= Html::input("text", "username", $user['username'], ["placeholder"=>"Username", "required"=>"required", "class"=>"form-control"]) ?>
								</div>

								<div class="form-group">
									<label>Email</label>
									<?= Html::input("email", "email", $user['email'], ["placeholder"=>"Email", "required"=>"required", "class"=>"form-control"]) ?>
								</div>

								<div class="form-group">
									<label>Secuence Question</label>
									<?= Html::input("text", "sec_question", $user['sec_question'], ["required"=>"required", "class"=>"form-control"]) ?>
								</div>

								<div class="form-group">
									<label>Secuence Answer</label>
									<?= Html::input("text", "sec_answer", $user['sec_answer'], ["required"=>"required", "class"=>"form-control"]) ?>
								</div>

								<div class="form-group">
									<label>User type will be attached</label>
									<?php
										foreach (UserType::find()->asArray()->all() as $key => $value) {
									?>
									<div class="radio">
					                  	<label>
					                  		<?php
					                  			if($value["id"] == $user['user_type'])
													echo Html::radio("user_type", true, ["label"=>$value["name"], "value"=>$value["id"]]);
												else
													echo Html::radio("user_type", false, ["label"=>$value["name"], "value"=>$value["id"]]);
					                  		?>
					                  	</label>
					                </div>
									<?php
										}
									?>
								</div>

								<?= Html::submitButton('Save', ['class' => 'btn btn-primary']) ?>

						<?php ActiveForm::end(); ?>

					</div>
				</div>
			</div>
	</div>
</div>	



<!-- 
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
 -->