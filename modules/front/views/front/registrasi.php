<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Sign Up';
$this->params['breadcrumbs'][] = $this->title;


?>
<div class="container">
	  <ol class="breadcrumb">
		  <li><a href="<?=Yii::$app->urlManager->createUrl('/front/front/home')?>">Home</a></li>
		  <li class="active">Account</li>
		 </ol>
	 <div class="registration">
		 <div class="registration_left">
			 <h2>new user? <span> create an account </span></h2>
			 <!-- [if IE] 
				< link rel='stylesheet' type='text/css' href='ie.css'/>  
			 [endif] -->  
			  
			 <!-- [if lt IE 7]>  
				< link rel='stylesheet' type='text/css' href='ie6.css'/>  
			 <! [endif] -->  
			 <script>
				(function() {
			
				// Create input element for testing
				var inputs = document.createElement('input');
				
				// Create the supports object
				var supports = {};
				
				supports.autofocus   = 'autofocus' in inputs;
				supports.required    = 'required' in inputs;
				supports.placeholder = 'placeholder' in inputs;
			
				// Fallback for autofocus attribute
				if(!supports.autofocus) {
					
				}
				
				// Fallback for required attribute
				if(!supports.required) {
					
				}
			
				// Fallback for placeholder attribute
				if(!supports.placeholder) {
					
				}
				
				// Change text inside send button on submit
				var send = document.getElementById('register-submit');
				if(send) {
					send.onclick = function () {
						this.innerHTML = '...Sending';
					}
				}
			
			 })();
			 </script>
			 <div class="registration_form">
			 <!-- Form -->
				<?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'options' => ['class' => 'form-horizontal'],
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>
					<div>
						<label>
							<input placeholder="organization name" type="text"  name="organization_name" required>
						</label>
					</div>
					<div>
						<label>
							<input placeholder="first name" type="text" name="first_name" required>
						</label>
					</div>
					<div>
						<label>
							<input placeholder="middle name" type="text"  name="middle_name" required>
						</label>
					</div>
					<div>
						<label>
							<input placeholder="last name" type="text"  name="last_name" required>
						</label>
					</div>
					<div>
						<label>
							<input placeholder="email address" type="email" name="email_address" required>
						</label>
					</div>
					<div>
						<label>
							<input placeholder="login name" type="text" name="login_name" required>
						</label>
					</div>
					<div>
						<label>
							<input placeholder="login password" type="password" name="login_password" required>
						</label>
					</div>
					<div>
						<label>
							<input placeholder="phone number" type="text" name="phone_number" required>
						</label>
					</div>
					<div>
						<label>
							<input placeholder="city" type="text" name="city" required>
						</label>
					</div>	
					<div>
						<label>
							<input placeholder="country" type="text" name="country" required>
						</label>
					</div>				
					<div>
						 <?= Html::submitButton('Create Account', ['class' => 'btn btn-primary', 'name' => 'send-button']) ?>
					</div>
					<div class="sky-form">
						<label class="checkbox"><input type="checkbox" name="checkbox" ><i></i>i agree Terms & conditions &nbsp;<a class="terms" href="#"> terms of service</a> </label>
					</div>
				</form>
				<!-- /Form -->
			 </div>
		 </div>
		 </div>
		 </div>
		  <?php ActiveForm::end(); ?>
		  <div class="clearfix"> </div>
		
