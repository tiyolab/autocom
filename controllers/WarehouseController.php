<?php

namespace app\controllers;

use Yii;
use yii\web\UploadedFile;
use app\controllers\SecureController;
use app\models\warehouse\BabKeluar;
use app\models\warehouse\BabKeluarSearch;
use app\models\warehouse\BabMasuk;
use app\models\warehouse\BabMasukSearch;
use app\models\warehouse\BaPengembalian;
use app\models\warehouse\BaPengembalianSearch;
use app\models\warehouse\Barang;
use app\models\warehouse\BarangSearch;
use app\models\warehouse\Blok;
use app\models\warehouse\BlokSearch;
use app\models\warehouse\Distributor;
use app\models\warehouse\DistributorSearch;
use app\models\warehouse\Gudang;
use app\models\warehouse\GudangSearch;
use app\models\warehouse\JenisBarang;
use app\models\warehouse\JenisBarangSearch;
use app\models\warehouse\Kemasan;
use app\models\warehouse\KemasanSearch;
use app\models\warehouse\PurchaseOrder;
use app\models\warehouse\PurchaseOrderSearch;
use app\models\warehouse\Roles;
use app\models\warehouse\RolesSearch;
use app\models\warehouse\SalesOrder;
use app\models\warehouse\SalesOrderSearch;
use app\models\warehouse\User;
use app\models\warehouse\UserSearch;
use app\models\warehouse\Report;
use mPDF;

class WarehouseController extends SecureController{
	
	public function actionIndex(){
		$this->layout= $this->CheckSession();
		return $this->render('index');		
		//$this->layout='warehouse_layout';
		//return $this->render('index');
	}
	
	public function actionDatamaster(){
		$this->layout='warehouse_layout';
		return $this->render('data_master');
	}
	
	public function actionBeritaacara(){
		$this->layout='warehouse_layout';
		return $this->render('berita_acara');
	}
	
	public function actionOrder(){
		$this->layout='warehouse_layout';
		return $this->render('order');
	}

	public function actionReport(){
		$this->layout= 'warehouse_layout';
		return $this->render('report_layout');
	}
	//----------------------------------Sales Order-----------------------------------------
	public function actionSalesorderindex(){
		$searchModel = new SalesOrderSearch();
		$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		
		$this->layout= $this->CheckSession();

		return $this->render('sales-order/index',[
			'searchModel' => $searchModel,
			'dataProvider' => $dataProvider]
			);
	}

	public function actionSalesordercreate(){
		$model = new SalesOrder();
		
		$this->layout= $this->CheckSession();
		
		if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['warehouse/salesorderindex', 'id' => $model->ID_SO]);
        } else {
        	$id = $model->getLastIdSO();
        	$model->Kode_SO = $id+1;
            return $this->render('sales-order/create', [
                'model' => $model,
            ]);
        }
	}

	public function actionSalesorderedit($id){
		$model = SalesOrder::findOne($id);

		$this->layout= $this->CheckSession();

		if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['warehouse/salesorderindex', 'id' => $model->ID_SO]);
        } else {
            return $this->render('sales-order/update', [
                'model' => $model,
            ]);
        }
	}

	public function actionSalesorderview($id){
		$model = SalesOrder::findOne($id);
		$this->layout= $this->CheckSession();
		return $this->render('sales-order/view',['model'=>$model,]);
	}
	
	public function actionSalesorderdelete($id){
		$model = SalesOrder::findOne($id)->delete();

		$this->layout= $this->CheckSession();

		return $this->redirect(['warehouse/salesorderindex']);
	}
	//----------------------------------Purchase Order-----------------------------------------
	public function actionPurchaseorderindex(){
		$searchModel = new PurchaseOrderSearch();
		$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		
		$this->layout= $this->CheckSession();
		
		return $this->render('purchase-order/index',[
			'searchModel' => $searchModel,
			'dataProvider' => $dataProvider]
			);
	}

	public function actionPurchaseordercreate(){
		$model = new PurchaseOrder();

		$this->layout= $this->CheckSession();

		if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['warehouse/purchaseorderindex', 'id' => $model->ID_PO]);
        } else {
        	$id = $model->getLastIdPO();
        	$model->Kode_PO = $id+1;
            return $this->render('purchase-order/create', [
                'model' => $model,
            ]);
        }
	}

	public function actionPurchaseorderedit($id){
        /*$model = PurchaseOrder::findOne($id);
		
		$this->layout= $this->CheckSession();
		
		if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['warehouse/purchaseorderindex', 'id' => $model->ID_PO]);
        } else {
            return $this->render('purchase-order/update', [
                'model' => $model,
            ]);
        }*/
        $model = new PurchaseOrder();
        $model->updateStatus($id);
        return $this->redirect(['warehouse/purchaseorderindex']);
	}

	public function actionPurchaseorderview($id){
		$model = PurchaseOrder::findOne($id);
		$this->layout= $this->CheckSession();
		return $this->render('purchase-order/view',['model'=>$model,]);
	}

	public function actionPurchaseorderdelete($id){
		$model = PurchaseOrder::findOne($id)->delete();

		$this->layout= $this->CheckSession();

		return $this->redirect(['warehouse/purchaseorderindex']);
	}
	//----------------------------------Barang-----------------------------------------
	public function actionBarangindex(){	
		$searchModel = new BarangSearch();
		$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		
		$this->layout= $this->CheckSession();
		
		return $this->render('barang/index',[
			'searchModel' => $searchModel,
			'dataProvider' => $dataProvider]
			);
	}

	public function actionBarangcreate(){	
		$model = new Barang();
		
		$this->layout= $this->CheckSession();
		
		if ($model->load(Yii::$app->request->post())) {
			$imageName = $model->Kode_Barang;
			$model->file = UploadedFile::getInstance($model,'file');
			$model->file->saveAs('Barang/'.$imageName.'.'.$model->file->extension);

			$model->Gambar='Barang/'.$imageName.'.'.$model->file->extension;

			$model->Stock_temp = $model->Stock;
			if($model->save()){
				$model->save();
	            return $this->redirect(['warehouse/barangindex', 'id' => $model->Kode_Barang]);
        	}
        } else {
        	$id = $model->getLastIdBarang();
        	$model->Kode_Barang = $id+1;
            return $this->render('barang/create', [
                'model' => $model,
            ]);
        }
	}

	public function actionBarangedit($id){	
		$model = Barang::findOne($id);
		
		$this->layout= $this->CheckSession();
		
		if ($model->load(Yii::$app->request->post())) {
			$imageName = $model->Kode_Barang;
			$model->file = UploadedFile::getInstance($model,'file');
			$model->file->saveAs('Barang/'.$imageName.'.'.$model->file->extension);

			$model->Gambar='Barang/'.$imageName.'.'.$model->file->extension;

			$model->Stock_temp = $model->Stock;
			if($model->save()){
				//print_r($model->Gambar);
				//die;
				$model->save();
	            return $this->redirect(['warehouse/barangindex', 'id' => $model->Kode_Barang]);
        	}
        }else {
            return $this->render('barang/update', [
                'model' => $model,
            ]);
        }
	}
 
	public function actionBarangview($id){
		$model = Barang::findOne($id);
		$this->layout= $this->CheckSession();
		return $this->render('barang/view',['model'=>$model,]);
	}

	public function actionBarangdelete($id){
		$model = Barang::findOne($id)->delete();

		$this->layout= $this->CheckSession();

		return $this->redirect(['warehouse/barangindex']);
	}
	//----------------------------------Kemasan-----------------------------------------
	public function actionKemasanindex(){	
		$searchModel = new KemasanSearch();
		$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		
		$this->layout= $this->CheckSession();
		
		return $this->render('kemasan/index',[
			'searchModel' => $searchModel,
			'dataProvider' => $dataProvider]
			);
	}

	public function actionKemasancreate(){	
		$model = new Kemasan();
		
		$this->layout= $this->CheckSession();
		
		if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['warehouse/kemasanindex', 'id' => $model->Kemasan_ID]);
        } else {
        	$id = $model->getLastIdKemasan();
        	$model->Kemasan_ID= $id+1;
            return $this->render('kemasan/create', [
                'model' => $model,
            ]);
        }
	}

	public function actionKemasanedit($id){	
		$model = Kemasan::findOne($id);
		
		$this->layout= $this->CheckSession();
		
		if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['warehouse/kemasanindex', 'id' => $model->Kemasan_ID]);
        } else {
            return $this->render('kemasan/update', [
                'model' => $model,
            ]);
        }
	}
 
	public function actionKemasanview($id){
		$model = Kemasan::findOne($id);
		$this->layout= $this->CheckSession();
		return $this->render('kemasan/view',['model'=>$model,]);
	}

	public function actionKemasandelete($id){
		$model = Kemasan::findOne($id)->delete();

		$this->layout= $this->CheckSession();

		return $this->redirect(['warehouse/kemasanindex']);
	}

	//----------------------------------Jenis Barang-----------------------------------------
	public function actionJenisbarangindex(){	
		$searchModel = new JenisBarangSearch();
		$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		
		$this->layout= $this->CheckSession();
		
		return $this->render('jenisbarang/index',[
			'searchModel' => $searchModel,
			'dataProvider' => $dataProvider]
			);
	}

	public function actionJenisbarangcreate(){	
		$model = new JenisBarang();
		
		$this->layout= $this->CheckSession();
		
		if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['warehouse/jenisbarangindex', 'id' => $model->Jenis_Barang_ID]);
        } else {
        	$id = $model->getLastIdJenisBarang();
        	$model->Jenis_Barang_ID= $id+1;
            return $this->render('jenisbarang/create', [
                'model' => $model,
            ]);
        }
	}

	public function actionJenisbarangedit($id){	
		$model = JenisBarang::findOne($id);
		
		$this->layout= $this->CheckSession();
		
		if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['warehouse/jenisbarangindex', 'id' => $model->Jenis_Barang_ID]);
        } else {
            return $this->render('jenisbarang/update', [
                'model' => $model,
            ]);
        }
	}
 
	public function actionJenisbarangview($id){
		$model = JenisBarang::findOne($id);
		$this->layout= $this->CheckSession();
		return $this->render('jenisbarang/view',['model'=>$model,]);
	}

	public function actionJenisbarangdelete($id){
		$model = JenisBarang::findOne($id)->delete();

		$this->layout= $this->CheckSession();

		return $this->redirect(['warehouse/jenisbarangindex']);
	}

	//----------------------------------Gudang -----------------------------------------
	public function actionGudangindex(){	
		$searchModel = new GudangSearch();
		$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		
		$this->layout= $this->CheckSession();
		
		return $this->render('Gudang/index',[
			'searchModel' => $searchModel,
			'dataProvider' => $dataProvider]
			);
	}

	public function actionGudangcreate(){	
		$model = new Gudang();
		
		$this->layout= $this->CheckSession();
		
		if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['warehouse/gudangindex', 'id' => $model->Gudang_ID]);
        } else {
        	$id = $model->getLastIdGudang();
        	$model->Gudang_ID= $id+1;
            return $this->render('gudang/create', [
                'model' => $model,
            ]);
        }
	}

	public function actionGudangedit($id){	
		$model = Gudang::findOne($id);
		
		$this->layout= $this->CheckSession();
		
		if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['warehouse/gudangindex', 'id' => $model->Gudang_ID]);
        } else {
            return $this->render('gudang/update', [
                'model' => $model,
            ]);
        }
	}
 
	public function actionGudangview($id){
		$model = Gudang::findOne($id);
		$this->layout= $this->CheckSession();
		return $this->render('gudang/view',['model'=>$model,]);
	}

	public function actionGudangdelete($id){
		$model = Gudang::findOne($id)->delete();

		$this->layout= $this->CheckSession();

		return $this->redirect(['warehouse/gudangindex']);
	}

	//----------------------------------Blok -----------------------------------------

	public function actionBlokindex(){	
		$searchModel = new BlokSearch();
		$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		
		$this->layout= $this->CheckSession();
		
		return $this->render('blok/index',[
			'searchModel' => $searchModel,
			'dataProvider' => $dataProvider]
			);
	}

	public function actionBlokcreate(){	
		$model = new Blok();
		
		$this->layout= $this->CheckSession();
		
		if ($model->load(Yii::$app->request->post()) && $model->save()) {
			//print_r($model->Blok_ID);
			//die;
            return $this->redirect(['warehouse/blokindex', 'id' => $model->Blok_ID]);
        } else {
        	$id = $model->getLastIdBlok();
        	$model->Blok_ID = $id+1;
            return $this->render('blok/create', [
                'model' => $model,
            ]);
        }
	}
	public function actionBlokedit($id){	
		$model = Blok::findOne($id);
		
		$this->layout= $this->CheckSession();
		
		if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['warehouse/blokindex', 'id' => $model->Blok_ID]);
        } else {
            return $this->render('blok/update', [
                'model' => $model,
            ]);
        }
	}
 
	public function actionBlokview($id){
		$model = Blok::findOne($id);
		$this->layout= $this->CheckSession();
		return $this->render('blok/view',['model'=>$model,]);
	}

	public function actionBlokdelete($id){
		$model = Blok::findOne($id)->delete();

		$this->layout= $this->CheckSession();

		return $this->redirect(['warehouse/blokindex']);
	}

	//----------------------------------Distributor -----------------------------------------

	public function actionDistributorindex(){	
		$searchModel = new DistributorSearch();
		$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		
		$this->layout= $this->CheckSession();
		
		return $this->render('distributor/index',[
			'searchModel' => $searchModel,
			'dataProvider' => $dataProvider]
			);
	}

	public function actionDistributorcreate(){	
		$model = new Distributor();
		
		$this->layout= $this->CheckSession();
		
		if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['warehouse/distributorindex', 'id' => $model->ID_Distributor]);
        } else {
        	$id = $model->getLastIdDistributor();
        	$model->ID_Distributor= $id+1;
            return $this->render('distributor/create', [
                'model' => $model,
            ]);
        }
	}

	public function actionDistributoredit($id){	
		$model = Distributor::findOne($id);
		
		$this->layout= $this->CheckSession();
		
		if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['warehouse/distributorindex', 'id' => $model->ID_Distributor]);
        } else {
            return $this->render('distributor/update', [
                'model' => $model,
            ]);
        }
	}
 
	public function actionDistributorview($id){
		$model = Distributor::findOne($id);
		$this->layout= $this->CheckSession();
		return $this->render('distributor/view',['model'=>$model,]);
	}

	public function actionDistributordelete($id){
		$model = Distributor::findOne($id)->delete();

		$this->layout= $this->CheckSession();

		return $this->redirect(['warehouse/distributorindex']);
	}

	//----------------------------------Berita Acara Masuk -----------------------------------------

	public function actionBabmasukindex(){	
		$searchModel = new BabMasukSearch();
		$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		
		$this->layout= $this->CheckSession();
		
		return $this->render('bab-masuk/index',[
			'searchModel' => $searchModel,
			'dataProvider' => $dataProvider]
			);
	}

	public function actionBabmasukcreate(){	
		$model = new BabMasuk();
		
		$this->layout= $this->CheckSession();
		
		$session=Yii::$app->session;
		$session->open();
		$ss = $session['session.user']['user_id'];

		if ($model->load(Yii::$app->request->post()) && $model->save()) {
			$model->updateStock($model->ID_PO);
            return $this->redirect(['warehouse/babmasukindex', 'id' => $model->ID_Bab_masuk]);
        } else {
        	$id = $model->getLastIdBabMasuk();
        	$model->ID_Bab_masuk= $id+1;
        	$model->User_Id = $ss;
            return $this->render('bab-masuk/create', [
                'model' => $model,
            ]);
        }
	}

	public function actionBabmasukedit($id){	
		$model = BabMasuk::findOne($id);
		
		$this->layout= $this->CheckSession();
		
		if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['warehouse/babmasukindex', 'id' => $model->ID_Bab_masuk]);
        } else {
            return $this->render('bab-masuk/update', [
                'model' => $model,
            ]);
        }
	}
 
	public function actionBabmasukview($id){
		$model = BabMasuk::findOne($id);
		$this->layout= $this->CheckSession();
		return $this->render('bab-masuk/view',['model'=>$model,]);
	}
	
	public function actionBabmasukdelete($id){
		$model = BabMasuk::findOne($id)->delete();

		$this->layout= $this->CheckSession();

		return $this->redirect(['warehouse/babmasukindex']);
	}
	
	//----------------------------------Berita Acara Keluar -----------------------------------------

	public function actionBabkeluarindex(){	
		$searchModel = new BabKeluarSearch();
		$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		
		$this->layout= $this->CheckSession();
		
		return $this->render('bab-keluar/index',[
			'searchModel' => $searchModel,
			'dataProvider' => $dataProvider]
			);
	}

	public function actionBabkeluarcreate(){	
		$model = new BabKeluar();
		
		$this->layout= $this->CheckSession();
		
		if ($model->load(Yii::$app->request->post()) && $model->save()) {
			$model->updateStock($model->ID_SO);
            return $this->redirect(['warehouse/babkeluarindex', 'id' => $model->ID_Bab_Keluar]);
        } else {
        	$id = $model->getLastIdBabKeluar();
        	$model->ID_Bab_Keluar= $id+1;
            return $this->render('bab-keluar/create', [
                'model' => $model,
            ]);
        }
	}

	public function actionBabkeluaredit($id){	
		$model = BabKeluar::findOne($id);
		
		$this->layout= $this->CheckSession();
		
		if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['warehouse/babkeluarindex', 'id' => $model->ID_Bab_Keluar]);
        } else {
            return $this->render('bab-keluar/update', [
                'model' => $model,
            ]);
        }
	}
 
	public function actionBabkeluarview($id){
		$model = BabKeluar::findOne($id);
		$this->layout= $this->CheckSession();
		return $this->render('bab-keluar/view',['model'=>$model,]);
	}

	public function actionBabkeluardelete($id){
		$model = BabKeluar::findOne($id)->delete();

		$this->layout= $this->CheckSession();

		return $this->redirect(['warehouse/babkeluarindex']);
	}

	//----------------------------------Berita Acara Pengembalian -----------------------------------------

	public function actionBapengembalianindex(){	
		$searchModel = new BaPengembalianSearch();
		$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		
		$this->layout= $this->CheckSession();
		
		return $this->render('ba-pengembalian/index',[
			'searchModel' => $searchModel,
			'dataProvider' => $dataProvider]
			);
	}

	public function actionBapengembaliancreate(){	
		$model = new BaPengembalian();
		
		$this->layout= $this->CheckSession();
		
		if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['warehouse/bapengembalianindex', 'id' => $model->ID_Bab]);
        } else {
			$id = $model->getLastIDBabPengembalian();
			$model->ID_Bab = $id+1;
            return $this->render('ba-pengembalian/create', [
                'model' => $model,
            ]);
        }
	}

	public function actionBapengembalianedit($id){	
		$model = BaPengembalian::findOne($id);
		
		$this->layout= $this->CheckSession();
		
		if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['warehouse/bapengembalianindex', 'id' => $model->ID_Bab]);
        } else {
            return $this->render('ba-pengembalian/update', [
                'model' => $model,
            ]);
        }
	}
 
	public function actionBapengembalianview($id){
		$model = BaPengembalian::findOne($id);
		$this->layout= $this->CheckSession();
		return $this->render('ba-pengembalian/view',['model'=>$model,]);
	}

	public function actionBapengembaliandelete($id){
		$model = BaPengembalian::findOne($id)->delete();

		$this->layout= $this->CheckSession();

		return $this->redirect(['warehouse/bapengembalianindex']);
	}

	//----------------------------------Report -----------------------------------------

	public function actionReportmasukindex(){
		//$model = new Report();
		//$model->search($date);

		$this->layout= $this->CheckSession();
		$model = new Report();
		if($model->load(Yii::$app->request->post())){
			return $this->render('report/indexmasuk',['hasil'=>$model->searchMasuk($model->date)]);
		}else{
			return $this->render('report/indexmasuk',['hasil'=>$model->findReportBarangMasuk()]);
		}
	}

	public function actionReportkeluarindex(){
		//$model = new Report();
		//$model->search($date);

		$this->layout= $this->CheckSession();
		$model = new Report();
		if($model->load(Yii::$app->request->post())){
			return $this->render('report/indexkeluar',['hasil'=>$model->searchKeluar($model->date)]);
		}else{
			return $this->render('report/indexkeluar',['hasil'=>$model->findReportBarangKeluar()]);
		}
	}

	public function actionReportkembaliindex(){
		//$model = new Report();
		//$model->search($date);

		$this->layout= $this->CheckSession();
		$model = new Report();
		if($model->load(Yii::$app->request->post())){
			return $this->render('report/indexkembali',['hasil'=>$model->searchKembali($model->date)]);
		}else{
			return $this->render('report/indexkembali',['hasil'=>$model->findReportBarangKembali()]);
		}
	}
	//fpdf
	  public function actionPdfbarangmasuk()
    {        
        $mpdf = new mPDF;
        $mpdf->AddPage('L');
        $mpdf->WriteHTML($this->renderPartial('barang_masuk'));
        $mpdf->Output();
        exit;
    }
      public function actionPdfbarangkeluar()
    {        
        $mpdf = new mPDF;
        $mpdf->AddPage('L');
        $mpdf->WriteHTML($this->renderPartial('barang_keluar'));
        $mpdf->Output();
        exit;
    }
      public function actionPdfbarangkembali()
    {        
        $mpdf = new mPDF;
        $mpdf->AddPage('L');
        $mpdf->WriteHTML($this->renderPartial('barang_kembali'));
        $mpdf->Output();
        exit;
    }

	//----------------------------------Cek Session -----------------------------------------

	public function CheckSession(){
		$session=Yii::$app->session;
		$session->open();
		$ss = $session['session.user']['user_type'];

		if($ss == 'super admin'){
			return 'warehouse_layout_kepalagudang';
		}
		else if($ss == 'kepalagudang'){
			$this->layout = 'warehouse_layout_kepalagudang';
		}
		else if($ss == 'supervisor'){
			$this->layout = 'warehouse_layout_supervisor';
		}
		else if($ss == 'operator'){
			$this->layout = 'warehouse_layout_operator';
		}

		return $this;
	}
}

?>