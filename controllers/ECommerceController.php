<?php

namespace app\controllers;

use Yii;
use mPDF;
use yii\filters\AccessControl;
use app\controllers\SecureController;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use app\models\ecommerceDataUser;
use app\models\ecommerceDataBarang;
use app\models\ecommerceDataPesan;
use app\models\ecommerceDataValidasi;
use app\models\ecommerceReportPenjualan;

class ECommerceController extends SecureController{
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
	public function actionIndex(){
		$this->layout = 'e-commerceHome';
        return $this->render('index');
	}
	public function actionData(){
		$this->layout = 'e-commerceHome';
        return $this->render('dataUser');
	}
	public function actionData_barang(){
		$this->layout = 'e-commerceHome';
        return $this->render('dataBarang');
	}
    public function actionData_pesan(){
        $this->layout = 'e-commerceHome';
        return $this->render('dataPesan');
    }
	public function actionData_validasi(){
        $this->layout = 'e-commerceHome';
        return $this->render('dataValidasi');
    }
    public function actionData_kirim(){
        $this->layout = 'e-commerceHome';
        return $this->render('dataKirim');
    }

    public function actionDetail_data($id){
        $this->layout = 'e-commerceHome';

        return $this->render('detailUser', [
            'model' => $this->findModel_user($id),
        ]);
    }

    public function actionDelete_data($id){
        $this->layout = 'e-commerceHome';
        if($this->isDeleteAllowed()){
            if(Yii::$app->request->get()){
                ecommerceDataUser::deleteAll('customers_id = '.Yii::$app->request->get()['id']);

                return $this->render('dataUser');
            }

            return $this->render('dataUser');
        }else{
            echo "You don't have access here";die;  
        }
    }

    public function actionDetail_barang($id){
        $this->layout = 'e-commerceHome';

        return $this->render('detailBarang', [
            'model' => $this->findModel_barang($id),
        ]);
    }
	
	public function actionDetail_order($id){
        $this->layout = 'e-commerceHome';

        return $this->render('detailOrder2', [
            'model' => $this->findModel_order($id),
        ]);
    }

    protected function findModel_user($id)
    {
        if (($model = ecommerceDataUser::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function findModel_barang($id)
    {
        if (($model = ecommerceDataBarang::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
	protected function findModel_order($id)
    {
        if (($model = ecommerceDataPesan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
	public function actionInvoice($id)
    {
        $this->layout = 'e-commerceHome';
		
        return $this->render('invoice');
    }
	public function actionValidateOrder($id,$sp)
    {
        $this->layout = 'e-commerceHome';
		$dataValidasiModel = new ecommerceDataValidasi();

        return $this->render('dataValidasi', [
            'model' => $dataValidasiModel->validating($id),
			'model2' => $dataValidasiModel->insert_pengiriman($id,$sp),
			'model2' => $dataValidasiModel->insert_so($id),
        ]);
    }
	public function actionReport(){
		$model = new ecommerceReportPenjualan();
		if ($model->load(Yii::$app->request->post())) {
			
            // do something meaningful here about $model ...

           $this->layout = 'e-commerceHome';
			return $this->render('report', ['hasil' => $model->search($model->date)]);
        } else{
			$this->layout = 'e-commerceHome';
			return $this->render('report',['hasil' => $model->thisdayReport()]);
		}
	}
	
	public function actionPrint($id){
		if($this->isSelectAllowed()){
			$mpdf = new mPDF('utf-8', 'A4', 8, '', 0,0,0,0,0,0);
			$style = file_get_contents('http://localhost:8080/autocomv1/web/assets/css/app.css');
			$style1 = file_get_contents('http://localhost:8080/autocomv1/web/assets/f2476afc/css/bootstrap.css');
			$mpdf->WriteHTML($style, 1);
			$mpdf->WriteHTML($style1, 1);
			$mpdf->WriteHTML($this->renderPartial('printinvoice'), 2);
			$mpdf->Output();
			//return $this->render('printinvoice');
		}else{
			echo "You don't have access here";die;
		}
	}
}

?>