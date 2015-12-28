<?php

namespace app\controllers;

use Yii;
use app\controllers\SecureController;

class SecurityController extends SecureController{
	public $layout = "security_layout";

	public function actionIndex(){
		return $this->render('index');
	}

	public function actionRoleManagement(){
		return $this->render('role_list');
	}
}

?>