<?php

namespace app\controllers;

use Yii;
use app\controllers\SecureController;

class AccountingController extends SecureController{
	public function actionIndex(){
		echo "index of Accounting";
	}
}

?>