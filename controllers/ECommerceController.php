<?php

namespace app\controllers;

use Yii;
use app\controllers\SecureController;

class ECommerceController extends SecureController{
	public function actionIndex(){
		echo "index of ECommerce";
	}
}

?>