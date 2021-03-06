<?php

namespace app\modules\front\controllers;

use Yii;
use mPDF;
use yii\filters\AccessControl;
use app\controllers\SecureController;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use yii\web\Controller;
use app\controllers\SiteController;
use app\models\User;
use app\modules\front\models\productModel;
use app\modules\front\models\ecommerceDataUser;
use app\modules\front\models\ecommerceDataPesan;
use app\modules\front\models\addToChartModel;
use app\modules\front\models\dataAlamatPengiriman;
use app\modules\front\models\placeOrderModel;
use app\modules\front\models\placeOrderItemModel;
use yii\web\UploadedFile;

class FrontController extends Controller{

	public function actionIndex(){
		$this->layout = "main_layout";
		return $this->render('index');
	}
	public function actionProduct(){
		$this->layout = "main_layout";
		return $this->render('product');
	}
	public function actionContact(){
		$this->layout = "main_layout";
		return $this->render('contact');
	}
	public function actionDetailProduct($id){
		$productM = new productModel();
		$this->layout = "main_layout";
		return $this->render('detail_product', ['hasil' => $productM->findDetail($id)] );
	}
	public function actionAddToChart(){
		$model = new addToChartModel();
		if ($model->load(Yii::$app->request->post())) {
			$session = Yii::$app->session;
			$session->open();
			$user_session = $session['session.user'];
			$status = false;
			for($i=0;$i<$user_session['jml_check_out'];$i++){
				if($user_session['jml_check_out']!=0&&$user_session['check_out'][$i]==$model->kode_barang){
					if($user_session['qty'][$i]+$model->qty<=$model->stok){
						$user_session['qty'][$i]+=$model->qty;
						$user_session['subprice']+=$model->qty*$model->harga;
						$user_session['total_berat']+=$model->qty*$model->berat;
					}
					$status = true;
				}
			}
			if($status==false){
				$user_session['check_out'][$user_session['jml_check_out']]=$model->kode_barang;
				$user_session['qty'][$user_session['jml_check_out']]=$model->qty;
				$user_session['subprice']+=$model->qty*$model->harga;
				$user_session['total_berat']+=$model->qty*$model->berat;
				$user_session['jml_check_out']++;
			}
			if($user_session['zip_code']!=0)
				$user_session['shipping_price']=$model->shipment_price($user_session['zip_code'],$user_session['total_berat']);
			$session['session.user']=$user_session;
			$session->close();
			$this->redirect(['front/product']);
        } else{
			$this->layout = 'main_layout';
			return $this->render('contact');
		}
	}
	
	public function actionEmptyChart(){
		$session = Yii::$app->session;
		$session->open();
		$user_session = $session['session.user'];
		$user_session['check_out']=array();
		$user_session['qty']=array();
		$user_session['subprice']=0;
		$user_session['shipping_price']=0;
		$user_session['total_berat']=0;
		$user_session['jml_check_out']=0;
		$session['session.user']=$user_session;
		$session->close();
		$this->redirect(['front/product']);
	}
	
	public function actionDeleteItemChart($i,$berat,$harga){
		$session = Yii::$app->session;
		$session->open();
		$user_session = $session['session.user'];
		$user_session['jml_check_out']--;
		$user_session['subprice']-=$user_session['qty'][$i]*$harga;
		$user_session['total_berat']-=$user_session['qty'][$i]*$berat;
		$user_session['check_out'][$i]=$user_session['check_out'][$user_session['jml_check_out']];
		$user_session['qty'][$i]=$user_session['qty'][$user_session['jml_check_out']];
		$session['session.user']=$user_session;
		$session->close();
		$this->redirect(['front/checkout']);
	}
	
	public function actionCheckout(){
		$this->layout = 'main_layout';
		return $this->render('checkout');
	}
	
	public function actionIsiAlamatPengiriman(){
		$model = new dataAlamatPengiriman();
		if ($model->load(Yii::$app->request->post())) {
			$session = Yii::$app->session;
			$session->open();
			$user_session = $session['session.user'];
			$user_session['shipping_price']=$model->shipment_price($model->shipping_zip_code,$user_session['total_berat']);
			$user_session['address']=$model->shipping_address;
			$user_session['zip_code']=$model->shipping_zip_code;
			$user_session['city']=$model->shipping_city;
			$user_session['province']=$model->shipping_province;
			$user_session['country']=$model->shipping_country;
			$user_session['phone']=$model->shipping_phone;
			$session['session.user']=$user_session;
			$session->close();
			return $this->redirect(['front/checkout']);
		}else{
			$this->layout = 'main_layout';
			return $this->render('isiData');
		}
		
	}
	
	public function actionPlaceOrder(){
		$model = new placeOrderModel();
		$id = $model->insertOrder();
		$session = Yii::$app->session;
		$session->open();
		$user_session = $session['session.user'];
		for($z=0;$z<$user_session['jml_check_out'];$z++){
			$model2 = new placeOrderItemModel();
			$model2->insertItem($id,$user_session['check_out'][$z],$user_session['qty'][$z]);
			$model2->updateStock($user_session['check_out'][$z],$user_session['qty'][$z]);
		}
		$user_session['check_out']=array();
		$user_session['qty']=array();
		$user_session['jml_check_out']=0;
		$user_session['subprice']=0;
		$user_session['total_berat']=0;
		$session['session.user']=$user_session;
		$session->close();
		return $this->redirect(['front/profile']);
	}
	
	public function actionProfile(){
		$this->layout = 'main_layout';
		return $this->render('profil');
	}
	
	public function actionConfirm($id){
		$this->layout = "main_layout";
		$model = new placeOrderModel();
			if (Yii::$app->request->post()) {
				if($model->caridata($id)){
					$model = placeOrderModel::findOne($id);
					$model->bukti_bayar = UploadedFile::getInstance($model, 'bukti_bayar');
					$model->bukti_bayar = file_get_contents($model->bukti_bayar->tempName);
					$model->order_status_code = 1;
					$model->save();
				}
				$this->redirect(['profile']);
			}
			return $this->render('bukti', [
				'model' => $model,
			]);
	}
	
	public function actionLogin_user(){
        $this->layout = 'main_layout';
		return $this->render('login');
	}
	public function actionCreate_user(){
		$this->layout = "main_layout";
		
		if(Yii::$app->request->post()){
				$UserModel = new ecommerceDataUser();
				$userData = new User();

				$UserModel->saveData_user(Yii::$app->request->post());
				$userData->saveData_userEcommerce(Yii::$app->request->post());
				return $this->render('login');
		
       } else{
		return $this->render('registrasi');       
		 }
	}
	public function actionPrint($id){
		
			$mpdf = new mPDF('utf-8', 'A4', 8, '', 0,0,0,0,0,0);
			$style = file_get_contents('http://localhost:8080/autocomv1/web/assets/css/app.css');
			$style1 = file_get_contents('http://localhost:8080/autocomv1/web/assets/f2476afc/css/bootstrap.css');
			$mpdf->WriteHTML($style, 1);
			$mpdf->WriteHTML($style1, 1);
			$mpdf->WriteHTML($this->renderPartial('printinvoice'), 2);
			$mpdf->Output();
			//return $this->render('printinvoice');
		
	}
	
}

?>
