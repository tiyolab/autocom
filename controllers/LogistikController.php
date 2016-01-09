<?php

namespace app\controllers;

use Yii;
use app\controllers\SecureController;

class LogistikController extends SecureController{
	public function actionIndex(){
		echo "index of Logistik";
		print_r($this->getHakAkses());die;
	}
}

?>