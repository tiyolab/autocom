<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\modules\front\models\dataAlamatPengiriman;

$this->title = 'Alamat pengiriman';
$this->params['breadcrumbs'][] = $this->title;

echo $this->context->id;

?>
<div class="container">
	  <ol class="breadcrumb">
		  <li class="active">Alamat pengiriman</li>
		 </ol>
	 <div class="registration">
		 <div class="registration_left">
			 <h2>Place Order</h2>
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
							<input placeholder="Shipping Address" type="text" class="form-control"  name="dataAlamatPengiriman[shipping_address]" required>
						</label>
					</div>
					<div>
						<label>
							<input placeholder="Shipping Zip Code" type="text" name="dataAlamatPengiriman[shipping_zip_code]" required>
						</label>
					</div>
					<div>
						<label>
							<input placeholder="Shipping City" type="text"  name="dataAlamatPengiriman[shipping_city]" required>
						</label>
					</div>
					<div>
						<label>
							<input placeholder="Shipping Province" type="text"  name="dataAlamatPengiriman[shipping_province]" required>
						</label>
					</div>
					<div>
						<label>
							<input placeholder="Shipping Country" type="text" name="dataAlamatPengiriman[shipping_country]" required>
						</label>
					</div>
					<div>
						<label>
							<input placeholder="Phone Number" type="text" name="dataAlamatPengiriman[shipping_phone]" required>
						</label>
					</div>				
					<div>
						<?= Html::submitButton('Save', ['class' => 'btn btn-primary']) ?>
						
		  <?php ActiveForm::end(); ?>
					</div>
				</form>
				<!-- /Form -->
			 </div>
		 </div>
		 <div class="clearfix"></div>
</div>
<!-- /Container -->