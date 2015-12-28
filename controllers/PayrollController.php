<?php

namespace app\controllers;

use Yii;
use app\controllers\SecureController;

class PayrollController extends SecureController{
	public function actionIndex(){
		echo "index of Payroll";
	}
}

?>