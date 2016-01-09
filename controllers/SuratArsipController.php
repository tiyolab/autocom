<?php

namespace app\controllers;

use Yii;
use app\controllers\SecureController;

class SuratArsipController extends SecureController{

	public function actionIndex(){
		return $this->render('index');
	}

	public function actionTes(){
		return $this->render('index');
	}
}

?>