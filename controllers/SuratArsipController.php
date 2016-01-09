<?php

namespace app\controllers;

use Yii;
use app\controllers\SecureController;

class SuratArsipController extends SecureController{

	public $layout = "suratarsip_layout";

	public function actionIndex() {
		return $this->render('index');
	}

	// Membuat surat
	public function actionBuatSurat(){
		if($this->isSelectAllowed()){
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

}

?>