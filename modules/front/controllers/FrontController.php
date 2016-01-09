<?php

namespace app\modules\front\controllers;

use Yii;
use yii\web\Controller;

class FrontController extends Controller{

	public function actionIndex(){
		$this->layout = "main_layout";
		return $this->render('index');
	}
}

?>