<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Bukti Bayar';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="container">
	  <ol class="breadcrumb">
		  <li class="active">Upload Bukti</li>
		 </ol>
	 <div class="registration">
		 <div class="registration_left">
			 <h2>Upload Bukti Bayar</h2>
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
        'options' => ['enctype' => 'multipart/form-data'],
        'fieldConfig' => [
            'template' => "\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label '],
        ],
    ]); ?>
					
					<div>
						<label>
							<?= $form -> field($model, 'bukti_bayar')->fileInput(); ?>
						</label>
					</div>
					<div>
						 <?= Html::submitButton('Save', ['class' => 'btn btn-primary', 'name' => 'send-button']) ?>
					</div>
				 <?php ActiveForm::end(); ?>
				<!-- /Form -->
				
				
			 </div>
		 </div>
		  <div class="clearfix"> </div>
	</div>	
	 <div class="clearfix"> </div>
	 </div>
		 
		 