<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;

use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="login_sec">
	 <div class="container">
		 <ol class="breadcrumb">
		  <li><a href="<?=Yii::$app->urlManager->createUrl('/front/front/home')?>">Home</a></li>
		  <li class="active">Login</li>
		 </ol>
		 <h2>Login</h2>
		 <div class="col-md-6 log">			 
				 <p>Welcome, please enter the folling to continue.</p>
				 <p>If you have previously Login with us, <span>click here</span></p>
				 
    	
    	<?php $form = ActiveForm::begin([
    		'action' => Yii::$app->urlManager->createUrl('site/login-ecommerce'),
			'id' => 'create-role-form',
			'options' => ['class' => 'form-horizontal', 'data-toggle'=>'validator'],
			'fieldConfig' => [
			'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
			'labelOptions' => ['class' => 'col-lg-1 control-label'],
			],
		]); ?>
    	<h5> Username </h5>
    	<input type ="text" placeholder="username" name="LoginForm[username]">
    	<h5> Password </h5>
    	<input type = "password" placeholder="password" type="password" name="LoginForm[password]">
    	<h5> Remember me </h5>
    	<input type = "checkbox" name="LoginForm[rememberMe]" value=0>
      	<?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            
    	<?php ActiveForm::end(); ?>
		 </div>	
				
		 <div class="clearfix"></div>
	 </div>
</div>