<?php

namespace app\controllers;

use Yii;
use app\controllers\SecureController;

use app\models\Role;
use app\models\RoleModule;
use app\models\UserType;

class SecurityController extends SecureController{
	public $layout = "security_layout";

	public function actionIndex(){
		return $this->render('index');
	}

	public function actionRoleManagement(){
		if($this->isSelectAllowed()){
			return $this->render('role_list');	
		}else{
			echo "You don't have access here";die;
		}
		
	}

	public function actionDetailRole(){
		if($this->isSelectAllowed()){
			return $this->render('detail_role');	
		}else{
			echo "You don't have access here";die;
		}
	}

	public function actionCreateRole(){
		if($this->isInsertAllowed()){
			if(Yii::$app->request->post()){
				$roleModel = new Role();
				$roleModel->saveRole(Yii::$app->request->post());
				return $this->render('role_list');
			}

        	return $this->render('create_role');
        }else{
        	echo "You don't have access here";die;	
        }
	}

	public function actionUpdateRole(){
		if($this->isUpdateAllowed()){
			if(Yii::$app->request->post()){
				$role = Role::findOne(Yii::$app->request->get()['id']);
				$role->name = Yii::$app->request->post()['role'];
				$role->update();

				$rowsDeleted = RoleModule::deleteAll('role = '.Yii::$app->request->get()['id']);

				$roleModel = new Role();
				$roleModel->updateRole(Yii::$app->request->get()['id'], Yii::$app->request->post());

				return $this->render('role_list');
			}

        	return $this->render('update_role');
        }else{
        	echo "You don't have access here";die;	
        }
	}

	public function actionDeleteRole(){
		if($this->isDeleteAllowed()){
			if(Yii::$app->request->get()){
				RoleModule::deleteAll('role = '.Yii::$app->request->get()['id']);
				Role::deleteAll('id = '.Yii::$app->request->get()['id']);

				return $this->render('role_list');
			}

        	return $this->render('role_list');
        }else{
        	echo "You don't have access here";die;	
        }
	}

	/**
	* start for handling user type management
	*/

	public function actionUserTypeManagement(){
		if($this->isSelectAllowed()){
			return $this->render('user_type_list');	
		}else{
			echo "You don't have access here";die;
		}
		
	}

	public function actionCreateUserType(){
		if($this->isInsertAllowed()){
			if(Yii::$app->request->post()){
				$userTypeModel = new UserType();
				$userTypeModel->name = Yii::$app->request->post()['name'];
				$userTypeModel->role = Yii::$app->request->post()['role'];
				$userTypeModel->save();

				return $this->render('user_type_list');
			}

        	return $this->render('create_user_type');
        }else{
        	echo "You don't have access here";die;	
        }
	}

	public function actionUpdateUserType(){
		if($this->isUpdateAllowed()){
			if(Yii::$app->request->post()){
				$userTypeModel = UserType::findOne(Yii::$app->request->get()['id']);
				$userTypeModel->name = Yii::$app->request->post()['name'];
				$userTypeModel->role = Yii::$app->request->post()['role'];
				$userTypeModel->update();

				return $this->render('user_type_list');
			}

        	return $this->render('update_user_type');
        }else{
        	echo "You don't have access here";die;	
        }
	}

	public function actionDeleteUserType(){
		if($this->isDeleteAllowed()){
			if(Yii::$app->request->get()){
				UserType::deleteAll('id = '.Yii::$app->request->get()['id']);

				return $this->render('user_type_list');
			}

        	return $this->render('user_type_list');
        }else{
        	echo "You don't have access here";die;	
        }
	}
}

?>