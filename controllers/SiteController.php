<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use app\controllers\SecureController;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\VUserRole;

use app\models\User;

class SiteController extends SecureController
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        $session = Yii::$app->session;
        $session->open();
        if(!$session['session.user']['login']){
            $session->close();
            return $this->redirect(['site/login']);
        }else{
            $session->close();
            return $this->redirect(['site/portal']);
        }
    }

    public function actionLogin()
    {
        $model = new LoginForm();
        $postData = Yii::$app->request->post();
        if ($model->load($postData) && $model->login()) {
            $userData = VUserRole::find()->where(["id_user"=>Yii::$app->user->getId()])->asArray()->all();
            $tmp = array();
            foreach ($userData as $key => $value) {
                $tmp[$value['module']] =$value['hak_akses'];
            }

            $session = Yii::$app->session;
            $session->open();
            $session['session.user'] = array(
                    "login"=>true,
                    "username"=>Yii::$app->user->identity->username,
                    "email"=>Yii::$app->user->identity->email,
                    "user_type"=>$userData[0]['user_type'],
                    "hak_akses"=>$tmp,
                );
            $session->close();
            return $this->redirect(['site/portal']);
        }

        $this->layout = 'login_layout';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionPortal()
    {
        $this->layout = "portal_layout";
        return $this->render('portal');
    }
}
