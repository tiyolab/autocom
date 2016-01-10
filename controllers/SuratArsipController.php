<?php

namespace app\controllers;

use Yii;
use app\controllers\SecureController;
use mPDF;
use app\models\Surat;

class SuratArsipController extends SecureController{

	public $layout = "suratarsip_layout";
//	public $data = new Surat();

	public function actionIndex() {
		return $this->render('index');

//		$mpdf = new mPDF;
//		$mpdf->WriteHTML('<p>Hallo World</p>');
//		$mpdf->Output();
	}

	// Membuat surat
	public function actionBuatSurat(){
		if($this->isInsertAllowed()){
			if(Yii::$app->request->post()){
				$suratModel = new Surat();
				$suratModel->insertSurat(Yii::$app->request->post()['Surat']);
				echo "berhasil";
			}
			return $this->render('buat_surat');
		}else{
			echo "You don't have access here";die;
		}
	}

	// Melihat surat masuk
	public function actionSuratMasuk(){
		if($this->isSelectAllowed()){
			return $this->render('surat_masuk');
		}else{
			echo "You don't have access here";die;
		}
	}

	// Melihat surat keluar
	public function actionSuratKeluar(){
		if($this->isSelectAllowed()){
			return $this->render('surat_keluar');
		}else{
			echo "You don't have access here";die;
		}
	}

	// Fitur persetujuan surat untuk manajer
	public function actionPersetujuanSurat(){
		if($this->isSelectAllowed()){
			return $this->render('persetujuan_surat');
		}else{
			echo "You don't have access here";die;
		}
	}

	// Melihat memo masuk dan terdapat tombol Buat Memo
	public function actionMemoMasuk(){
		if($this->isSelectAllowed()){
			return $this->render('memo_masuk');
		}else{
			echo "You don't have access here";die;
		}
	}

	// Membuat memo
	public function actionBuatMemo(){
		if($this->isSelectAllowed()){
			return $this->render('buat_memo');
		}else{
			echo "You don't have access here";die;
		}
	}

	// Melihat memo masuk dan terdapat tombol Buat Memo
	public function actionMemoKeluar(){
		if($this->isSelectAllowed()){
			return $this->render('memo_keluar');
		}else{
			echo "You don't have access here";die;
		}
	}

	// Melihat daftar arsip sesuai user rule
	public function actionArsip(){
		if($this->isSelectAllowed()){
			return $this->render('arsip');
		}else{
			echo "You don't have access here";die;
		}
	}

	// Membuat arsip
	public function actionBuatArsip(){
		if($this->isSelectAllowed()){
			return $this->render('buat_arsip');
		}else{
			echo "You don't have access here";die;
		}
	}

	public function actionDelete($id){
		if($this->isDeleteAllowed()){
			if(Yii::$app->request->get()){
				Surat::deleteAll('nomor_surat='.Yii::$app->request->get()['id'] );
				$this->redirect('surat-masuk');
			}
		}
	}

	public function actionPrint(){
		if($this->isSelectAllowed()){
			$mpdf = new mPDF;
			$mpdf->WriteHTML($this->renderPartial('printsurat'));
			$mpdf->Output();
		}else{
			echo "You don't have access here";die;
		}
	}
}

?>