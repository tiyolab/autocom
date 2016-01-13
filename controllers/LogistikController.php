<?php

namespace app\controllers;

use Yii;
use mPDF;
use app\controllers\SecureController;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

use app\models\logistic\LgKendaraan;
use app\models\logistic\LgKendaraanSearch;
use app\models\logistic\LgPengiriman;
use app\models\logistic\LgPengirimanSearch;
use app\models\logistic\LgOngkosKirim;
use app\models\logistic\LgOngkosKirimSearch;
use app\models\logistic\LgStatusKendaraan;
use app\models\logistic\LgStatusKendaraan2;
use app\models\logistic\LgStatusKendaraanSearch;
use app\models\logistic\LgJenisKendaraan;
use app\models\logistic\LgJenisKendaraanSearch;
use app\models\logistic\LgApprove;
use app\models\logistic\LgApproveSearch;
use app\models\logistic\LgPenjadwalan;
use app\models\logistic\LgPenjadwalanSearch;
use app\models\logistic\LgReport;
use app\models\logistic\LgReportSearch;
use app\models\logistic\LgPegawai;


class LogistikController extends SecureController{

	public function actionIndex(){
		$session=Yii::$app->session;
		$session->open();
		$ss = $session['session.user']['user_type'];
		if ($ss == 'manager'){
			$this->layout = 'managerLogistik';
			return $this->render('index');
		}
		else if ($ss == 'supir'){
			$this->layout = 'supir_Logistik';
			return $this->render('index');
		}
		else if ($ss == 'kurir'){
			$this->layout = 'kurir_Logistik';
			return $this->render('index');
		}
		else if ($ss == 'super admin'){
			$this->layout = 'operator_Logistik';
			return $this->render('index');
		}
	}

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

	public function actionKendaraan()
	{
		$qw = 'kendaraan';
		$session=Yii::$app->session;
		$session->open();
		$session->set('menu',$qw);
		$session=Yii::$app->session;
		$session->open();
		$ss = $session['session.user']['user_type'];
		if ($ss == 'manager'){
			$this->layout = 'managerLogistik';
		}
		else if ($ss == 'supir'){
			$this->layout = 'supir_Logistik';
		}
		else if ($ss == 'kurir'){
			$this->layout = 'kurir_Logistik';
		}
		else if ($ss == 'super admin'){
			$this->layout = 'operator_Logistik';
		}
		$searchModel = new LgKendaraanSearch();
		$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

		return $this->render('lg-kendaraan/index', [
			'searchModel' => $searchModel,
			'dataProvider' => $dataProvider,
		]);
	}

	public function actionPengiriman()
	{
		$qw = 'pengiriman';
		$session=Yii::$app->session;
		$session->open();
		$session->set('menu',$qw);
		$ss = $session['session.user']['user_type'];
		if ($ss == 'manager'){
			$this->layout = 'managerLogistik';
		}
		else if ($ss == 'supir'){
			$this->layout = 'supir_Logistik';
		}
		else if ($ss == 'kurir'){
			$this->layout = 'kurir_Logistik';
		}
		else if ($ss == 'super admin'){
			$this->layout = 'operator_Logistik';
		}
		$searchModel = new LgPengirimanSearch();
		$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

		return $this->render('lg-pengiriman/index', [
			'searchModel' => $searchModel,
			'dataProvider' => $dataProvider,
		]);
	}

	public function actionStatusKendaraan()
	{
		$qw = 'status-kendaraan';
		$session=Yii::$app->session;
		$session->open();
		$session->set('menu',$qw);
		$ss = $session['session.user']['user_type'];
		if ($ss == 'manager'){
			$this->layout = 'managerLogistik';
		}
		else if ($ss == 'supir'){
			$this->layout = 'supir_Logistik';
		}
		else if ($ss == 'kurir'){
			$this->layout = 'kurir_Logistik';
		}
		else if ($ss == 'super admin'){
			$this->layout = 'operator_Logistik';
		}
		$searchModel = new LgStatusKendaraanSearch();
		$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

		return $this->render('lg-status-kendaraan/index', [
			'searchModel' => $searchModel,
			'dataProvider' => $dataProvider,
		]);
	}

	public function actionOngkosKirim()
	{
		$qw = 'ongkos-kirim';
		$session=Yii::$app->session;
		$session->open();
		$session->set('menu',$qw);
		$ss = $session['session.user']['user_type'];
		if ($ss == 'manager'){
			$this->layout = 'managerLogistik';
		}
		else if ($ss == 'supir'){
			$this->layout = 'supir_Logistik';
		}
		else if ($ss == 'kurir'){
			$this->layout = 'kurir_Logistik';
		}
		else if ($ss == 'super admin'){
			$this->layout = 'operator_Logistik';
		}
		$searchModel = new LgOngkosKirimSearch();
		$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

		return $this->render('lg-ongkos-kirim/index', [
			'searchModel' => $searchModel,
			'dataProvider' => $dataProvider,
		]);
	}

	public function actionJenisKendaraan()
	{
		$qw = 'jenis-kendaraan';
		$session=Yii::$app->session;
		$session->open();
		$session->set('menu',$qw);
		$ss = $session['session.user']['user_type'];
		if ($ss == 'manager'){
			$this->layout = 'managerLogistik';
		}
		else if ($ss == 'supir'){
			$this->layout = 'supir_Logistik';
		}
		else if ($ss == 'kurir'){
			$this->layout = 'kurir_Logistik';
		}
		else if ($ss == 'super admin'){
			$this->layout = 'operator_Logistik';
		}
		$searchModel = new LgJenisKendaraanSearch();
		$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

		return $this->render('lg-jenis-kendaraan/index', [
			'searchModel' => $searchModel,
			'dataProvider' => $dataProvider,
		]);
	}

	public function actionApprove()
	{
		$qw = 'approve';
		$session=Yii::$app->session;
		$session->open();
		$session->set('menu',$qw);
		$ss = $session['session.user']['user_type'];
		if ($ss == 'manager'){
			$this->layout = 'managerLogistik';
		}
		else if ($ss == 'supir'){
			$this->layout = 'supir_Logistik';
		}
		else if ($ss == 'kurir'){
			$this->layout = 'kurir_Logistik';
		}
		else if ($ss == 'super admin'){
			$this->layout = 'operator_Logistik';
		}
		$searchModel = new LgApproveSearch();
		$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

		return $this->render('lg-approve/index', [
			'searchModel' => $searchModel,
			'dataProvider' => $dataProvider,
		]);
	}

	public function actionPenjadwalan()
	{
		$qw = 'penjadwalan';
		$session=Yii::$app->session;
		$session->open();
		$session->set('menu',$qw);
		$ss = $session['session.user']['user_type'];
		if ($ss == 'manager'){
			$this->layout = 'managerLogistik';
		}
		else if ($ss == 'supir'){
			$this->layout = 'supir_Logistik';
		}
		else if ($ss == 'kurir'){
			$this->layout = 'kurir_Logistik';
		}
		else if ($ss == 'super admin'){
			$this->layout = 'operator_Logistik';
		}
		$searchModel = new LgPenjadwalanSearch();
		$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

		return $this->render('lg-penjadwalan/index', [
			'searchModel' => $searchModel,
			'dataProvider' => $dataProvider,
		]);
	}

	public function actionReport()
	{
		$qw = 'report';
		$session=Yii::$app->session;
		$session->open();
		$session->set('menu',$qw);
		$session=Yii::$app->session;
		$session->open();
		$ss = $session['session.user']['user_type'];
		if ($ss == 'manager'){
			$this->layout = 'managerLogistik';
		}
		else if ($ss == 'supir'){
			$this->layout = 'supir_Logistik';
		}
		else if ($ss == 'kurir'){
			$this->layout = 'kurir_Logistik';
		}
		else if ($ss == 'super admin'){
			$this->layout = 'operator_Logistik';
		}
		// $searchModel = new LgReportSearch();
		// $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		// return $this->render('lg-report/index', [
		//     'searchModel' => $searchModel,
		//     'dataProvider' => $dataProvider,
		// ]);
		$model = new LgReport();
		if ($model->load(Yii::$app->request->post())) {
			return $this->render('lg-report/index', ['hasil' => $model->search($model->tgl_terima)]);
		} else{
			return $this->render('lg-report/index',['hasil' => $model->findReport()]);
		}
	}

	public function actionView($id)
	{
		$session=Yii::$app->session;
		$session->open();
		$ss = $session['session.user']['user_type'];
		if ($ss == 'manager'){
			$this->layout = 'managerLogistik';
		}
		else if ($ss == 'supir'){
			$this->layout = 'supir_Logistik';
		}
		else if ($ss == 'kurir'){
			$this->layout = 'kurir_Logistik';
		}
		else if ($ss == 'super admin'){
			$this->layout = 'operator_Logistik';
		}
		$a=$session->get('menu');
		if($a=="kendaraan"){
			return $this->render('lg-kendaraan/view', [
				'model' => $this->findModelKendaraan($id),
			]);
		}else if($a=="pengiriman"){
			return $this->render('lg-pengiriman/view', [
				'model' => $this->findModelPengiriman($id),
			]);
		}else if($a=="status-kendaraan"){
			return $this->render('lg-status-kendaraan/view', [
				'model' => $this->findModelStatusKendaraan($id),
			]);
		}else if($a=="ongkos-kirim"){
			return $this->render('lg-ongkos-kirim/view', [
				'model' => $this->findModelOngkosKirim($id),
			]);
		}else if($a=="jenis-kendaraan"){
			return $this->render('lg-jenis-kendaraan/view', [
				'model' => $this->findModelJenisKendaraan($id),
			]);
		}else if($a=="approve"){
			return $this->render('lg-approve/view', [
				'model' => $this->findModelApprove($id),
			]);
		}else if($a=="penjadwalan"){
			return $this->render('lg-penjadwalan/view', [
				'model' => $this->findModelPenjadwalan($id),
			]);
		}else if($a=="report"){
			return $this->render('lg-report/view', [
				'model' => $this->findModelReport($id),
			]);
		}
		//return print_r($a);
	}

	public function actionCreateKendaraan()
	{
		$session=Yii::$app->session;
		$session->open();
		$ss = $session['session.user']['user_type'];
		if ($ss == 'manager'){
			$this->layout = 'managerLogistik';
		}
		else if ($ss == 'supir'){
			$this->layout = 'supir_Logistik';
		}
		else if ($ss == 'kurir'){
			$this->layout = 'kurir_Logistik';
		}
		else if ($ss == 'super admin'){
			$this->layout = 'operator_Logistik';
		}
		$model = new LgKendaraan();

		if ($model->load(Yii::$app->request->post()) && $model->save()) {
			$model->status_pemakaian = 0;
			$model->save();
			return $this->redirect(['view', 'id' => $model->kode]);
		} else {
			return $this->render('lg-kendaraan/create', [
				'model' => $model,
			]);
		}
	}

	public function actionCreateOngkosKirim()
	{
		$session=Yii::$app->session;
		$session->open();
		$ss = $session['session.user']['user_type'];
		if ($ss == 'manager'){
			$this->layout = 'managerLogistik';
		}
		else if ($ss == 'supir'){
			$this->layout = 'supir_Logistik';
		}
		else if ($ss == 'kurir'){
			$this->layout = 'kurir_Logistik';
		}
		else if ($ss == 'super admin'){
			$this->layout = 'operator_Logistik';
		}
		$model = new LgOngkosKirim();

		if ($model->load(Yii::$app->request->post()) && $model->save()) {
			return $this->redirect(['view', 'id' => $model->kode]);
		} else {
			return $this->render('lg-ongkos-kirim/create', [
				'model' => $model,
			]);
		}
	}

	public function actionCreateJenisKendaraan()
	{
		$session=Yii::$app->session;
		$session->open();
		$ss = $session['session.user']['user_type'];
		if ($ss == 'manager'){
			$this->layout = 'managerLogistik';
		}
		else if ($ss == 'supir'){
			$this->layout = 'supir_Logistik';
		}
		else if ($ss == 'kurir'){
			$this->layout = 'kurir_Logistik';
		}
		else if ($ss == 'super admin'){
			$this->layout = 'operator_Logistik';
		}
		$model = new LgJenisKendaraan();

		if ($model->load(Yii::$app->request->post()) && $model->save()) {
			return $this->redirect(['view', 'id' => $model->kode]);
		} else {
			return $this->render('lg-jenis-kendaraan/create', [
				'model' => $model,
			]);
		}
	}

	public function actionCreatePengiriman()
	{
		$session=Yii::$app->session;
		$session->open();
		$ss = $session['session.user']['user_type'];
		if ($ss == 'manager'){
			$this->layout = 'managerLogistik';
		}
		else if ($ss == 'supir'){
			$this->layout = 'supir_Logistik';
		}
		else if ($ss == 'kurir'){
			$this->layout = 'kurir_Logistik';
		}
		else if ($ss == 'super admin'){
			$this->layout = 'operator_Logistik';
		}
		$model = new LgPengiriman();

		if ($model->load(Yii::$app->request->post()) && $model->save()) {
			return $this->redirect(['view', 'id' => $model->kode]);
		} else {
			return $this->render('lg-pengiriman/create', [
				'model' => $model,
			]);
		}
	}

	public function actionCreateStatusKendaraan()
	{
		$session=Yii::$app->session;
		$session->open();
		$ss = $session['session.user']['user_type'];
		if ($ss == 'manager'){
			$this->layout = 'managerLogistik';
		}
		else if ($ss == 'supir'){
			$this->layout = 'supir_Logistik';
		}
		else if ($ss == 'kurir'){
			$this->layout = 'kurir_Logistik';
		}
		else if ($ss == 'super admin'){
			$this->layout = 'operator_Logistik';
		}
		$model = new LgStatusKendaraan();

		if ($model->load(Yii::$app->request->post()) && $model->save()) {
			Yii::$app->db
				->createCommand("UPDATE lg_kendaraan SET status_pemakaian = 1 WHERE kode=$model->kendaraan")
				->execute();
			return $this->redirect(['view', 'id' => $model->kode]);
		} else {
			return $this->render('lg-status-kendaraan/create', [
				'model' => $model,
			]);
		}
	}


	public function actionCreatePenjadwalan()
	{
		$session=Yii::$app->session;
		$session->open();
		$ss = $session['session.user']['user_type'];
		if ($ss == 'manager'){
			$this->layout = 'managerLogistik';
		}
		else if ($ss == 'supir'){
			$this->layout = 'supir_Logistik';
		}
		else if ($ss == 'kurir'){
			$this->layout = 'kurir_Logistik';
		}
		else if ($ss == 'super admin'){
			$this->layout = 'operator_Logistik';
		}
		$model = new LgPenjadwalan();

		if ($model->load(Yii::$app->request->post()) && $model->save()) {
			return $this->redirect(['view', 'id' => $model->kode]);
		} else {
			return $this->render('lg-penjadwalan/create', [
				'model' => $model,
			]);
		}
	}

	public function actionUpdate($id)
	{
		$session=Yii::$app->session;
		$session->open();
		$ss = $session['session.user']['user_type'];
		if ($ss == 'manager'){
			$this->layout = 'managerLogistik';
		}
		else if ($ss == 'supir'){
			$this->layout = 'supir_Logistik';
		}
		else if ($ss == 'kurir'){
			$this->layout = 'kurir_Logistik';
		}
		else if ($ss == 'super admin'){
			$this->layout = 'operator_Logistik';
		}
		$a=$session->get('menu');

		if($a=="kendaraan"){
			$model = $this->findModelKendaraan($id);
			if ($model->load(Yii::$app->request->post()) && $model->save()) {
				return $this->redirect(['view', 'id' => $model->kode]);
			} else {
				return $this->render('lg-kendaraan/update', [
					'model' => $model,
				]);
			}
		}else if($a=="pengiriman"){
			$date=date('Y-m-d H:i:s');
			Yii::$app->db
				->createCommand("UPDATE lg_pengiriman SET status_pengiriman=2, tgl_terima='$date' WHERE kode='$id'")
				->execute();
			return $this->redirect(['pengiriman']);
		}else if($a=="status-kendaraan"){
			$model = $this->findModelStatusKendaraan2($id);
			if ($model->load(Yii::$app->request->post()) && $model->save()) {
				Yii::$app->db
					->createCommand("UPDATE lg_kendaraan SET status_pemakaian = 0 WHERE kode=$model->kendaraan")
					->execute();
				return $this->redirect(['view', 'id' => $model->kode]);
			} else {
				return $this->render('lg-status-kendaraan/update', [
					'model' => $model,
				]);
			}
		}else if($a=="ongkos-kirim"){
			$model = $this->findModelOngkosKirim($id);
			if ($model->load(Yii::$app->request->post()) && $model->save()) {
				return $this->redirect(['view', 'id' => $model->kode]);
			} else {
				return $this->render('lg-ongkos-kirim/update', [
					'model' => $model,
				]);
			}
		}else if($a=="jenis-kendaraan"){
			$model = $this->findModelJenisKendaraan($id);
			if ($model->load(Yii::$app->request->post()) && $model->save()) {
				return $this->redirect(['view', 'id' => $model->kode]);
			} else {
				return $this->render('lg-jenis-kendaraan/update', [
					'model' => $model,
				]);
			}
		}else if($a=="approve"){
			$model=$this->findModelPengiriman($id);
			$kode=$model->id_order;
			$dates=date('Y/m/d');
			$surat="logistik/".$dates."/K".$id."/O".$kode;
			Yii::$app->db
				->createCommand("UPDATE lg_pengiriman SET status_approve = 1, status_pengiriman=1,surat_jalan='$surat' WHERE kendaraan=$id AND status_approve=0")
				->execute();
			return $this->redirect(['approve']);

		}else if($a=="penjadwalan"){
			$model = $this->findModelPenjadwalan($id);
			if ($model->load(Yii::$app->request->post()) && $model->save()) {
				return $this->redirect(['penjadwalan']);
			} else {
				return $this->render('lg-penjadwalan/update', [
					'model' => $model,
				]);
			}
		}

	}

	public function actionDelete($id)
	{
		$session=Yii::$app->session;
		$session->open();
		$a=$session->get('menu');

		if($a=="kendaraan"){
			$model = $this->findModelKendaraan($id)->delete();
			return $this->redirect(['kendaraan']);
		}else if($a=="pengiriman"){
			//$model = $this->findModelPengiriman($id)->delete();
			Yii::$app->db
				->createCommand("UPDATE lg_pengiriman SET status_pengiriman=3 WHERE kode='$id'")
				->execute();
			return $this->redirect(['pengiriman']);
		}else if($a=="status-kendaraan"){
			$model = $this->findModelKendaraan($id)->delete();
			Yii::$app->db
				->createCommand("DELETE FROM lg_status_kendaraan WHERE kendaraan='$id'")
				->execute();
			return $this->redirect(['status-kendaraan']);
		}else if($a=="ongkos-kirim"){
			$model = $this->findModelOngkosKirim($id)->delete();
			return $this->redirect(['ongkos-kirim']);
		}else if($a=="jenis-kendaraan"){
			$model = $this->findModelJenisKendaraan($id)->delete();
			return $this->redirect(['jenis-kendaraan']);
		}else if($a=="penjadwalan"){
			$model = $this->findModelPenjadwalan($id)->delete();
			return $this->redirect(['penjadwalan']);
		}
	}

	protected function findModelKendaraan($id)
	{
		if (($model = LgKendaraan::findOne($id)) !== null) {
			return $model;
		} else {
			throw new NotFoundHttpException('The requested page does not exist.');
		}
	}

	protected function findModelPengiriman($id)
	{
		if (($model = LgPengiriman::findOne($id)) !== null) {
			return $model;
		} else {
			throw new NotFoundHttpException('The requested page does not exist.');
		}
	}

	protected function findModelStatusKendaraan($id)
	{
		if (($model = LgStatusKendaraan::findOne($id)) !== null) {
			return $model;
		} else {
			throw new NotFoundHttpException('The requested page does not exist.');
		}
	}

	protected function findModelStatusKendaraan2($id)
	{
		if (($model = LgStatusKendaraan2::findOne($id)) !== null) {
			return $model;
		} else {
			throw new NotFoundHttpException('The requested page does not exist.');
		}
	}

	protected function findModelOngkosKirim($id)
	{
		if (($model = LgOngkosKirim::findOne($id)) !== null) {
			return $model;
		} else {
			throw new NotFoundHttpException('The requested page does not exist.');
		}
	}

	protected function findModelJenisKendaraan($id)
	{
		if (($model = LgJenisKendaraan::findOne($id)) !== null) {
			return $model;
		} else {
			throw new NotFoundHttpException('The requested page does not exist.');
		}
	}
	protected function findModelApprove($id)
	{
		if (($model = LgApprove::findOne($id)) !== null) {
			return $model;
		} else {
			throw new NotFoundHttpException('The requested page does not exist.');
		}
	}
	protected function findModelPenjadwalan($id)
	{
		if (($model = LgPenjadwalan::findOne($id)) !== null) {
			return $model;
		} else {
			throw new NotFoundHttpException('The requested page does not exist.');
		}
	}
	protected function findModelReport($id)
	{
		if (($model = LgReport::findOne($id)) !== null) {
			return $model;
		} else {
			throw new NotFoundHttpException('The requested page does not exist.');
		}
	}

	public function actionPdf()
	{
		$mpdf = new mPDF;
		$mpdf->AddPage('L');
		$mpdf->WriteHTML($this->renderPartial('surat_jalan'));
		$mpdf->Output();
		exit;
	}
}

?>