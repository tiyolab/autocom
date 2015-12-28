<?php

namespace app\controllers;

use Yii;
use app\controllers\SecureController;

class HumanResourceController extends SecureController{
	public function actionIndex(){
		echo "index of HumanResource";
	}
}

?>