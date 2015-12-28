<?php

namespace app\controllers;

use Yii;
use app\controllers\SecureController;

class WarehouseController extends SecureController{
	public function actionIndex(){
		echo "index of Warehouse";
	}
}

?>