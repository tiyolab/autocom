<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Module;

class SecureController extends Controller{
	public $baseModule;
	public $myModule;
	public $mySite;

	public function init(){
		$session = Yii::$app->session;
		$session->open();

		if(isset($session['session.user']) && $session['session.user']['login']){
			$model = new Module();
			$this->mySite = str_replace(array(" ","-","_"), "", $this->id);

			//$this->baseModule = Module::find()->where(["name"=>$this->mySite])->asArray()->one();
			$this->baseModule = $model->findModuleByName($this->mySite);

			if($this->baseModule){
				if(!isset($session['session.user']['hak_akses'][$this->baseModule['id']]) && empty($session['session.user']['hak_akses'][$this->baseModule['id']])){
						echo "you are not allowed access this module";die;
				}else{
					$this->myModule = $session['session.user']['hak_akses'][$this->baseModule['id']];
				}
			}else if($this->mySite != "site"){
				echo "there is no module with name ".$this->mySite;die;
			}
		}

		$session->close();

		parent::init();
	}

	public function isInsertAllowed(){
		if(in_array(1, explode(",", $this->myModule))){
			return true;
		}else{
			return false;
		}
	}

	public function isUpdateAllowed(){
		if(in_array(2, explode(",", $this->myModule))){
			return true;
		}else{
			return false;
		}	
	}

	public function isDeleteAllowed(){
		if(in_array(3, explode(",", $this->myModule))){
			return true;
		}else{
			return false;
		}	
	}

	public function isSelectAllowed(){
		if(in_array(4, explode(",", $this->myModule))){
			return true;
		}else{
			return false;
		}	
	}
}
?>