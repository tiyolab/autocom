<?php

namespace app\controllers;

use Yii;
use app\controllers\SecureController;
use mPDF;
use app\models\Surat;
use app\models\Arsip;
use app\models\Memo;

class SuratArsipController extends SecureController{

	public $layout = "suratarsip_layout";
//	public $data = new Surat();

	public function actionIndex() {
		return $this->render('index');
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
		if($this->isInsertAllowed()) {
			if(Yii::$app->request->post()){
				$memoModel = new Memo();
				$memoModel->saveMemo(Yii::$app->request->post());
				return $this->render('memo_keluar');
			}
			return $this->render('buat_memo');
		} else {
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
			if(Yii::$app->request->get()){
				$mpdf = new mPDF('utf-8', 'A4', 12, 'Times New Roman', 0, 0, 0, 0, 0, 0, 'P');
				$mpdf->WriteHTML($this->renderPartial('satuarsip'));
				$mpdf->Output();
//				return $this->render('satuarsip');
			}
			return $this->render('arsip');
		}else{
			echo "You don't have access here";die;
		}
	}

	// Membuat arsip
	public function actionBuatArsip(){
		if($this->isInsertAllowed()){
			if(Yii::$app->request->post()){
				$arsipModel = new Arsip();
				$arsipModel->insertSurat(Yii::$app->request->post()['Arsip']);

			}
			return $this->render('buat_arsip');
		}else{
			echo "You don't have access here";die;
		}
	}


	//hapus surat masuk
	public function actionDelete($id){
		if($this->isDeleteAllowed()){
			if(Yii::$app->request->get()){
				Surat::deleteAll('nomor_surat='.Yii::$app->request->get()['id'] );
				$this->redirect('surat-masuk');
			}
		}
	}

	//print surat
	public function actionPrint(){
		if($this->isSelectAllowed()){
			$mpdf = new mPDF('utf-8', 'A4', 12, 'Times New Roman', 30, 30, 30, 30, 0, 0, 'P');
			$mpdf->WriteHTML($this->renderPartial('printsurat'));
			$mpdf->Output();
//			return $this->render('printsurat');
		}else{
			echo "You don't have access here";die;
		}
	}
}

?>