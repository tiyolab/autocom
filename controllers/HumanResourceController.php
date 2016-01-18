<?php

namespace app\controllers;

use Yii;
use app\controllers\SecureController;
use app\models\HrdAbsensi;
use app\models\HrdAktivitas;
use app\models\HrdDepartement;
use app\models\HrdGaji;
use app\models\HrdHasil;
use app\models\HrdJadwal;
use app\models\HrdLembur;
use app\models\HrdLolos;
use app\models\HrdLowongan;
use app\models\HrdManager;
use app\models\HrdMateri;
use app\models\HrdPegawai;
use app\models\HrdPelamar;
use app\models\HrdPelanggaran;
use app\models\HrdPrestasi;
use app\models\HrdTingkatan;
use app\models\User;
use app\models\UserType;

class HumanResourceController extends SecureController{

	//----------------------------------------------- SELECT DATA -------------------------------------------------------------//
	//Dashboard
	public function actionIndex(){
        $this->layout = 'home'; 
		return $this->render('index');
	}
	
	//Pribadi
	public function actionProfil(){
        $this->layout = 'hrd'; 
		return $this->render('index_profil');
	}
	
	//Penempatan
	public function actionPosisi(){
        $this->layout = 'hrd'; 
		return $this->render('index_posisi');
	}
	
	//Manager
	public function actionManager(){
        $this->layout = 'hrd'; 
		return $this->render('index_manager');
	}
	
	//Prestasi
	public function actionPrestasi(){
        $this->layout = 'hrd'; 
		return $this->render('index_prestasi');
	}
	
	//Departemen
	public function actionDepartement(){
        $this->layout = 'hrd'; 
		return $this->render('index_departement');
	}
	
	//Absensi
	public function actionAbsensi(){
        $this->layout = 'home'; 
		return $this->render('index_absensi');
	}
	public function actionAbsensiHarian(){
        $this->layout = 'home'; 
		return $this->render('index_absensiHarian');
	}
	public function actionAbsensiBulanan(){
        $this->layout = 'home'; 
		return $this->render('index_absensiBulanan');
	}
	
	//Aktivitas
	public function actionAktivitas(){
        $this->layout = 'home'; 
		return $this->render('index_aktivitas');
	}
	
	//Lembur
	public function actionLembur(){
        $this->layout = 'home'; 
		return $this->render('index_lembur');
	}
	
	//Rekruitment
	public function actionRekrut(){
        $this->layout = 'hrd'; 
		return $this->render('index_rekrut');
	}
	
	//Pelamar
	public function actionPelamar(){
        $this->layout = 'hrd'; 
		return $this->render('index_pelamar');
	}
	
	//Materi
	public function actionMateri(){
        $this->layout = 'hrd'; 
		return $this->render('index_materi');
	}
	
	//Jadwal
	public function actionJadwal(){
        $this->layout = 'hrd'; 
		return $this->render('index_jadwal');
	}
	
	//Hasil
	public function actionHasil(){
        $this->layout = 'hrd'; 
		return $this->render('index_hasil');
	}
	
	//Lolos
	public function actionLolos(){
        $this->layout = 'hrd'; 
		return $this->render('index_lolos');
	}
	public function actionLihatLolos(){
        $this->layout = 'home'; 
		return $this->render('index_lihat_lolos');
	}
	
	//Gaji pokok
	public function actionGaji(){
        $this->layout = 'home'; 
		return $this->render('index_gaji');
	}
	
	//Pelanggan
	public function actionPelanggaran(){
        $this->layout = 'home'; 
		return $this->render('index_pelanggaran');
	}
	
	//Persetujuan
	public function actionPersetujuan(){
        $this->layout = 'hrd'; 
		return $this->render('index_persetujuan');
	}
	
	//Persetujuan lembur
	public function actionPersetujuanLembur(){
        $this->layout = 'hrd'; 
		return $this->render('index_persetujuan_lembur');
	}
	
	//Persetujuan Lolos
	public function actionPersetujuanLolos(){
        $this->layout = 'hrd'; 
		return $this->render('index_persetujuan_lolos');
	}
	
	//Laporan absensi
	public function actionLaporanAbsensi(){
        $this->layout = 'hrd'; 
		return $this->render('index_laporan_absensi');
	}
	
	//Laporan lembur
	public function actionLaporanLembur(){
        $this->layout = 'hrd'; 
		return $this->render('index_laporan_lembur');
	}
	
	//Laporan aktivitas
	public function actionLaporanAktivitas(){
        $this->layout = 'hrd'; 
		return $this->render('index_laporan_aktivitas');
	}
	
	//Laporan lolos
	public function actionLaporanLolos(){
        $this->layout = 'hrd'; 
		return $this->render('index_laporan_lolos');
	}
	
	//Laporan rekrut
	public function actionLaporanRekrut(){
        $this->layout = 'hrd'; 
		return $this->render('index_laporan_rekrut');
	}
	
	//------------------------------------------------------- DELETE DATA ---------------------------------------------------------//
	//Pegawai
	public function actionDeleteProfil(){
		if($this->isDeleteAllowed()){
			$this->layout = 'hrd';
			if(Yii::$app->request->get()){
				HrdPegawai::deleteAll('id_pegawai = '.Yii::$app->request->get()['id']);
				HrdManager::deleteAll('id_pegawai = '.Yii::$app->request->get()['id']);
				HrdPrestasi::deleteAll('id_pegawai = '.Yii::$app->request->get()['id']);
				HrdPelanggaran::deleteAll('id_pegawai = '.Yii::$app->request->get()['id']);
				HrdAktivitas::deleteAll('id_pegawai = '.Yii::$app->request->get()['id']);
				HrdLembur::deleteAll('id_pegawai = '.Yii::$app->request->get()['id']);
				HrdAbsensi::deleteAll('id_pegawai = '.Yii::$app->request->get()['id']);
				return $this->render('index_profil');
			}
			return $this->render('index_profil');
        }else{
        	echo "You don't have access here";die;	
        }
	}
	
	//Departement
	public function actionDeleteDepartement(){
		if($this->isDeleteAllowed()){
			$this->layout = 'hrd';
			if(Yii::$app->request->get()){
				HrdDepartement::deleteAll('id_Departement = '.Yii::$app->request->get()['id']);
					return $this->render('index_Departement');
			}
			return $this->render('index_Departement');
        }else{
        	echo "You don't have access here";die;	
        }
	}
		
	//Prestasi
	public function actionDeletePrestasi(){
		if($this->isDeleteAllowed()){
			$this->layout = 'hrd';
			if(Yii::$app->request->get()){
				HrdPrestasi::deleteAll('id_Prestasi = '.Yii::$app->request->get()['id']);
					return $this->render('index_Prestasi');
			}
			return $this->render('index_Prestasi');
        }else{
        	echo "You don't have access here";die;	
        }
	}
		
	//Manager
	public function actionDeleteManager(){
		if($this->isDeleteAllowed()){
			$this->layout = 'hrd';
			if(Yii::$app->request->get()){
				HrdManager::deleteAll('id_Manager = '.Yii::$app->request->get()['id']);
					return $this->render('index_Manager');
			}
			return $this->render('index_Departement');
        }else{
        	echo "You don't have access here";die;	
        }
	}
		
	//Aktivitas
	public function actionDeleteAktivitas(){
		if($this->isDeleteAllowed()){
			$this->layout = 'home';
			if(Yii::$app->request->get()){
				HrdAktivitas::deleteAll('id_Aktivitas = '.Yii::$app->request->get()['id']);
					return $this->render('index_Aktivitas');
			}
			return $this->render('index_Aktivitas');
        }else{
        	echo "You don't have access here";die;	
        }
	}
		
	//Lembur
	public function actionDeleteLembur(){
		if($this->isDeleteAllowed()){
			$this->layout = 'home';
			if(Yii::$app->request->get()){
				HrdLembur::deleteAll('id_Lembur = '.Yii::$app->request->get()['id']);
					return $this->render('index_Lembur');
			}
			return $this->render('index_Lembur');
        }else{
        	echo "You don't have access here";die;	
        }
	}
		
	//Lowongan
	public function actionDeleteLowongan(){
		if($this->isDeleteAllowed()){
			$this->layout = 'hrd';
			if(Yii::$app->request->get()){
				HrdLowongan::deleteAll('id_Lowongan = '.Yii::$app->request->get()['id']);
					return $this->render('index_rekrut');
			}
			return $this->render('index_rekrut');
        }else{
        	echo "You don't have access here";die;	
        }
	}
		
	//Pelamar
	public function actionDeletePelamar(){
		if($this->isDeleteAllowed()){
			$this->layout = 'hrd';
			if(Yii::$app->request->get()){
				HrdPelamar::deleteAll('id_calon = '.Yii::$app->request->get()['id']);
					return $this->render('index_Pelamar');
			}
			return $this->render('index_Pelamar');
        }else{
        	echo "You don't have access here";die;	
        }
	}
		
	//Materi
	public function actionDeleteMateri(){
		if($this->isDeleteAllowed()){
			$this->layout = 'hrd';
			if(Yii::$app->request->get()){
				HrdMateri::deleteAll('id_materi_tes = '.Yii::$app->request->get()['id']);
					return $this->render('index_materi');
			}
			return $this->render('index_materi');
        }else{
        	echo "You don't have access here";die;	
        }
	}
		
	//Jadwal
	public function actionDeleteJadwal(){
		if($this->isDeleteAllowed()){
			$this->layout = 'hrd';
			if(Yii::$app->request->get()){
				HrdJadwal::deleteAll('id_Jadwal_tes = '.Yii::$app->request->get()['id']);
					return $this->render('index_Jadwal');
			}
			return $this->render('index_Jadwal');
        }else{
        	echo "You don't have access here";die;	
        }
	}
		
	//Hasil
	public function actionDeleteHasil(){
		if($this->isDeleteAllowed()){
			$this->layout = 'hrd';
			if(Yii::$app->request->get()){
				HrdHasil::deleteAll('id_hasil_tes = '.Yii::$app->request->get()['id']);
					return $this->render('index_hasil');
			}
			return $this->render('index_hasil');
        }else{
        	echo "You don't have access here";die;	
        }
	}
		
	//Lolos
	public function actionDeleteLolos(){
		if($this->isDeleteAllowed()){
			$this->layout = 'hrd';
			if(Yii::$app->request->get()){
				HrdLolos::deleteAll('id_Lolos = '.Yii::$app->request->get()['id']);
					return $this->render('index_Lolos');
			}
			return $this->render('index_Lolos');
        }else{
        	echo "You don't have access here";die;	
        }
	}
		
	//Gaji
	public function actionDeleteGaji(){
		if($this->isDeleteAllowed()){
			$this->layout = 'home';
			if(Yii::$app->request->get()){
				HrdGaji::deleteAll('id_Gaji = '.Yii::$app->request->get()['id']);
					return $this->render('index_Gaji');
			}
			return $this->render('index_Gaji');
        }else{
        	echo "You don't have access here";die;	
        }
	}
	
	//Pelanggaran
	public function actionDeletePelanggaran(){
		if($this->isDeleteAllowed()){
			$this->layout = 'home';
			if(Yii::$app->request->get()){
				HrdPelanggaran::deleteAll('id_pelanggaran = '.Yii::$app->request->get()['id']);
					return $this->render('index_pelanggaran');
			}
			return $this->render('index_pelanggaran');
        }else{
        	echo "You don't have access here";die;	
        }
	}
	
	//------------------------------------------------------- INSERT DATA ---------------------------------------------------------//

	//Pribadi
	public function actionCreateProfil(){
		if($this->isInsertAllowed()){
			$this->layout = 'home'; 
			
			if(Yii::$app->request->post()){
				$ProfilModel = new hrdPegawai();
				$ProfilModel->saveProfil(Yii::$app->request->post());
				$AbsensiModel = new hrdAbsensi();
				$UserType = new UserType();
				$AbsensiModel->saveAbsensiUser($UserType->getPegawaiId());
				$UserModel = new User();
				$UserModel->saveUser($UserType->getPegawai(),Yii::$app->request->post());
					return $this->redirect('profil');
			}
			return $this->render('insert_profil');
        }else{
        	echo "You don't have access here";die;	
        }
	}
	
	//User
	public function actionCreateUser(){
		if($this->isInsertAllowed()){
			$this->layout = 'home'; 
			if(Yii::$app->request->post()){
				$UserModel = new User();
				$UserModel->saveUser(Yii::$app->request->post());
					return $this->redirect('profil');
			}
			return $this->render('insert_user');
        }else{
        	echo "You don't have access here";die;	
        }
	}
	
	//Penempatan
	public function actionCreatePosisi(){
        $this->layout = 'home'; 
		return $this->render('insert_posisi');
	}
	
	//Prestasi
	public function actionCreatePrestasi(){
		if($this->isInsertAllowed()){
			$this->layout = 'home'; 
			
			if(Yii::$app->request->post()){
				$PrestasiModel = new hrdPrestasi();
				$PrestasiModel->savePrestasi(Yii::$app->request->post());
					return $this->redirect('prestasi');
			}
			return $this->render('insert_prestasi');
        }else{
        	echo "You don't have access here";die;	
        }
	}
	
	//Manager
	public function actionCreateManager(){
		if($this->isInsertAllowed()){
			$this->layout = 'home'; 
			
			if(Yii::$app->request->post()){
				$ManagerModel = new hrdManager();
				$ManagerModel->saveManager(Yii::$app->request->post());
					return $this->redirect('manager');
			}
			return $this->render('insert_Manager');
        }else{
        	echo "You don't have access here";die;	
        }
	}
	
	//Departemen
	public function actionCreateDepartement(){
		if($this->isInsertAllowed()){
			$this->layout = 'home'; 
			
			if(Yii::$app->request->post()){
				$DepartementModel = new hrdDepartement();
				$DepartementModel->saveDepartement(Yii::$app->request->post());
					return $this->redirect('departement');
			}
			return $this->render('insert_departement');
        }else{
        	echo "You don't have access here";die;	
        }
	}
	
	//Absensi
	public function actionCreateAbsensi(){
		if($this->isInsertAllowed()){
			$this->layout = 'home'; 
			
			if(Yii::$app->request->post()){
				$id = Yii::$app->request->post()['id_absen'];
				$jam_masuk = Yii::$app->request->post()['jam_masuk'];
				$tanggal = Yii::$app->request->post()['tanggal'];
				Yii::$app->db->createCommand("Update absensi SET kehadiran = 1,jam_masuk='$jam_masuk',tanggal='$tanggal' WHERE id_absen=:id")->bindValue(':id',$id)->execute();				
					return $this->redirect('absensi');
			}
			return $this->render('insert_absensi');
        }else{
        	echo "You don't have access here";die;	
        }
	}
	public function actionCreateAbsensiBulanan(){
        $this->layout = 'home'; 
		return $this->render('insert_absensiBulanan');
	}
	
	//Aktivitas
	public function actionCreateAktivitas(){
		if($this->isInsertAllowed()){
			$this->layout = 'home'; 
			
			if(Yii::$app->request->post()){
				$AktivitasModel = new hrdAktivitas();
				$AktivitasModel->saveAktivitas(Yii::$app->request->post());
					return $this->redirect('aktivitas');
			}
			return $this->render('insert_aktivitas');
        }else{
        	echo "You don't have access here";die;	
        }
	}
	
	//Lembur
	public function actionCreateLembur(){
		if($this->isInsertAllowed()){
			$this->layout = 'home'; 
			
			if(Yii::$app->request->post()){
				$LemburModel = new hrdLembur();
				$LemburModel->saveLembur(Yii::$app->request->post());
					return $this->redirect('lembur');
			}
			return $this->render('insert_lembur');
        }else{
        	echo "You don't have access here";die;	
        }
	}
	
	//Rekruitment
	public function actionCreateLowongan(){
		if($this->isInsertAllowed()){
			$this->layout = 'home'; 
			
			if(Yii::$app->request->post()){
				$LowonganModel = new hrdLowongan();
				$LowonganModel->saveLowongan(Yii::$app->request->post());
					return $this->redirect('rekrut');
			}
			return $this->render('insert_rekrut');
        }else{
        	echo "You don't have access here";die;	
        }
	}
	
	//Pelamar
	public function actionCreatePelamar(){
		if($this->isInsertAllowed()){
			$this->layout = 'home'; 
			
			if(Yii::$app->request->post()){
				$PelamarModel = new hrdPelamar();
				$PelamarModel->savePelamar(Yii::$app->request->post());
					return $this->redirect('pelamar');
			}
			return $this->render('insert_pelamar');
        }else{
        	echo "You don't have access here";die;	
        }
	}
	
	//Materi
	public function actionCreateMateri(){
		if($this->isInsertAllowed()){
			$this->layout = 'home'; 
			
			if(Yii::$app->request->post()){
				$MateriModel = new hrdMateri();
				$MateriModel->saveMateri(Yii::$app->request->post());
					return $this->redirect('materi');
			}
			return $this->render('insert_materi');
        }else{
        	echo "You don't have access here";die;	
        }
	}
	
	//Jadwal
	public function actionCreateJadwal(){
		if($this->isInsertAllowed()){
			$this->layout = 'home'; 
			
			if(Yii::$app->request->post()){
				$JadwalModel = new hrdJadwal();
				$JadwalModel->saveJadwal(Yii::$app->request->post());
					return $this->redirect('jadwal');
			}
			return $this->render('insert_jadwal');
        }else{
        	echo "You don't have access here";die;	
        }
	}
	
	//Hasil
	public function actionCreateHasil(){
		if($this->isInsertAllowed()){
			$this->layout = 'home'; 
			
			if(Yii::$app->request->post()){
				$HasilModel = new hrdHasil();
				$HasilModel->saveHasil(Yii::$app->request->post());
					return $this->redirect('hasil');
			}
			return $this->render('insert_hasil');
        }else{
        	echo "You don't have access here";die;	
        }
	}
	
	//Lolos
	public function actionCreateLolos(){
		if($this->isInsertAllowed()){
			$this->layout = 'home'; 
			
			if(Yii::$app->request->post()){
				$LolosModel = new hrdLolos();
				$LolosModel->saveLolos(Yii::$app->request->post());
					return $this->redirect('lolos');
			}
			return $this->render('insert_lolos');
        }else{
        	echo "You don't have access here";die;	
        }
	}
	
	//Gaji pokok
	public function actionCreateGaji(){
		if($this->isInsertAllowed()){
			$this->layout = 'home'; 
			
			if(Yii::$app->request->post()){
				$TingkatanModel = new hrdTingkatan();
				$TingkatanModel->saveTingkatan(Yii::$app->request->post());
					return $this->redirect('gaji');
			}
			return $this->render('insert_gaji');
        }else{
        	echo "You don't have access here";die;	
        }
	}
	
	//Pelanggaran
	public function actionCreatePelanggaran(){
		if($this->isInsertAllowed()){
			$this->layout = 'home'; 
			
			if(Yii::$app->request->post()){
				$PelanggaranModel = new hrdPelanggaran();
				$PelanggaranModel->savePelanggaran(Yii::$app->request->post());
					return $this->redirect('pelanggaran');
			}
			return $this->render('insert_pelanggaran');
        }else{
        	echo "You don't have access here";die;	
        }
	}
	
	//------------------------------------------------------- UPDATE DATA ---------------------------------------------------------//
	//Pribadi
	
	public function actionUpdateProfil($id){
		if($this->isUpdateAllowed()){
			$this->layout = 'home'; 
			
			if(Yii::$app->request->post()){
				$rowsDeleted = hrdPegawai::deleteAll('id_pegawai = '.Yii::$app->request->get()['id']);

				$ProfilModel = new hrdPegawai();
				$ProfilModel->updateProfil(Yii::$app->request->get()['id'],Yii::$app->request->post());
					return $this->redirect('profil');
			}
			return $this->render('update_profil');
        }else{
        	echo "You don't have access here";die;	
        }
	}
	
	//Penempatan
	public function actionUpdatePosisi(){
        $this->layout = 'home'; 
		return $this->render('update_posisi');
	}
	
	//Prestasi
	public function actionUpdatePrestasi(){
		if($this->isUpdateAllowed()){
			$this->layout = 'home'; 
			
			if(Yii::$app->request->post()){
				$rowsDeleted = hrdPrestasi::deleteAll('id_prestasi = '.Yii::$app->request->get()['id']);
				$PrestasiModel = new hrdPrestasi();
				$PrestasiModel->updatePrestasi(Yii::$app->request->get()['id'],Yii::$app->request->post());
					return $this->redirect('prestasi');
			}
			return $this->render('update_prestasi');
        }else{
        	echo "You don't have access here";die;	
        }
	}
	
	//Departemen
	public function actionUpdateDepartement(){
		if($this->isUpdateAllowed()){
			$this->layout = 'home'; 
			
			if(Yii::$app->request->post()){
				$rowsDeleted = hrdDepartement::deleteAll('id_departement = '.Yii::$app->request->get()['id']);
				$DepartementModel = new hrdDepartement();
				$DepartementModel->updateDepartement(Yii::$app->request->get()['id'],Yii::$app->request->post());
					return $this->redirect('departement');
			}
			return $this->render('update_departement');
        }else{
        	echo "You don't have access here";die;	
        }
	}
	
	//Manager
	public function actionUpdateManager(){
		if($this->isUpdateAllowed()){
			$this->layout = 'home'; 
			
			if(Yii::$app->request->post()){
				$rowsDeleted = hrdManager::deleteAll('id_manager = '.Yii::$app->request->get()['id']);
				$ManagerModel = new hrdManager();
				$ManagerModel->updateManager(Yii::$app->request->get()['id'],Yii::$app->request->post());
					return $this->redirect('manager');
			}
			return $this->render('update_Manager');
        }else{
        	echo "You don't have access here";die;	
        }
	}
	
	//Aktivitas
	public function actionUpdateAktivitas(){
		if($this->isUpdateAllowed()){
			$this->layout = 'home'; 
			
			if(Yii::$app->request->post()){
				$rowsDeleted = hrdAktivitas::deleteAll('id_Aktivitas = '.Yii::$app->request->get()['id']);
				$AktivitasModel = new hrdAktivitas();
				$AktivitasModel->updateAktivitas(Yii::$app->request->get()['id'],Yii::$app->request->post());
					return $this->redirect('aktivitas');
			}
			return $this->render('update_aktivitas');
        }else{
        	echo "You don't have access here";die;	
        }
	}
	
	//Lembur
	public function actionUpdateLembur(){
		if($this->isUpdateAllowed()){
			$this->layout = 'home'; 
			
			if(Yii::$app->request->post()){
				$rowsDeleted = hrdLembur::deleteAll('id_lembur = '.Yii::$app->request->get()['id']);
				$LemburModel = new hrdLembur();
				$LemburModel->updateLembur(Yii::$app->request->get()['id'],Yii::$app->request->post());
					return $this->redirect('lembur');
			}
			return $this->render('update_lembur');
        }else{
        	echo "You don't have access here";die;	
        }
	}
	
	//Rekruitment
	public function actionUpdateLowongan(){
		if($this->isUpdateAllowed()){
			$this->layout = 'home'; 
			
			if(Yii::$app->request->post()){
				$rowsDeleted = hrdLowongan::deleteAll('id_lowongan = '.Yii::$app->request->get()['id']);
				$LowonganModel = new hrdLowongan();
				$LowonganModel->updateLowongan(Yii::$app->request->get()['id'],Yii::$app->request->post());
					return $this->redirect('rekrut');
			}
			return $this->render('update_rekrut');
        }else{
        	echo "You don't have access here";die;	
        }
	}
	
	//Pelamar
	public function actionUpdatePelamar(){
		if($this->isUpdateAllowed()){
			$this->layout = 'home'; 
			
			if(Yii::$app->request->post()){
				$rowsDeleted = hrdPelamar::deleteAll('id_calon = '.Yii::$app->request->get()['id']);
				$PelamarModel = new hrdPelamar();
				$PelamarModel->updatePelamar(Yii::$app->request->get()['id'],Yii::$app->request->post());
					return $this->redirect('pelamar');
			}
			return $this->render('update_pelamar');
        }else{
        	echo "You don't have access here";die;	
        }
	}
	
	//Materi
	public function actionUpdateMateri(){
		if($this->isUpdateAllowed()){
			$this->layout = 'home'; 
			
			if(Yii::$app->request->post()){
				$rowsDeleted = hrdMateri::deleteAll('id_materi_tes = '.Yii::$app->request->get()['id']);
				$MateriModel = new hrdMateri();
				$MateriModel->updateMateri(Yii::$app->request->get()['id'],Yii::$app->request->post());
					return $this->redirect('materi');
			}
			return $this->render('update_materi');
        }else{
        	echo "You don't have access here";die;	
        }
	}
	
	//Jadwal
	public function actionUpdateJadwal(){
		if($this->isUpdateAllowed()){
			$this->layout = 'home'; 
			
			if(Yii::$app->request->post()){
				$rowsDeleted = hrdJadwal::deleteAll('id_jadwal_tes = '.Yii::$app->request->get()['id']);
				$JadwalModel = new hrdJadwal();
				$JadwalModel->updateJadwal(Yii::$app->request->get()['id'],Yii::$app->request->post());
					return $this->redirect('jadwal');
			}
			return $this->render('update_jadwal');
        }else{
        	echo "You don't have access here";die;	
        }
	}
	
	//Hasil
	public function actionUpdateHasil(){
		if($this->isUpdateAllowed()){
			$this->layout = 'home'; 
			
			if(Yii::$app->request->post()){
				$rowsDeleted = hrdHasil::deleteAll('id_hasil_tes = '.Yii::$app->request->get()['id']);
				$HasilModel = new hrdHasil();
				$HasilModel->updateHasil(Yii::$app->request->get()['id'],Yii::$app->request->post());
					return $this->redirect('hasil');
			}
			return $this->render('update_hasil');
        }else{
        	echo "You don't have access here";die;	
        }
	}
	
	//Lolos
	public function actionUpdateLolos(){
		if($this->isUpdateAllowed()){
			$this->layout = 'home'; 
			
			if(Yii::$app->request->post()){
				$LolosModel = new hrdLolos();
				$LolosModel->updateLolos(Yii::$app->request->post());
					return $this->redirect('lolos');
			}
		return $this->render('update_lolos');
        }else{
        	echo "You don't have access here";die;	
        }
	}
	
	//Gaji pokok
	public function actionUpdateGaji(){
		if($this->isUpdateAllowed()){
			$this->layout = 'home'; 
			
			if(Yii::$app->request->post()){
				$TingkatanModel = new hrdTingkatan();
				$TingkatanModel->updateTingkatan(Yii::$app->request->post());
					return $this->redirect('gaji');
			}
			return $this->render('update_gaji');
        }else{
        	echo "You don't have access here";die;	
        }
	}
	
	//Pelanggaran
	public function actionUpdatePelanggaran(){
		if($this->isUpdateAllowed()){
			$this->layout = 'home'; 
			
			if(Yii::$app->request->post()){
				$rowsDeleted = hrdPelanggaran::deleteAll('id_pelanggaran = '.Yii::$app->request->get()['id']);
				$PelanggaranModel = new hrdPelanggaran();
				$PelanggaranModel->updatePelanggaran(Yii::$app->request->get()['id'],Yii::$app->request->post());
					return $this->redirect('pelanggaran');
			}
			return $this->render('update_pelanggaran');
        }else{
        	echo "You don't have access here";die;	
        }
	}
	
	//Setuju Lembur
	public function actionSetujuLembur(){
		if($this->isUpdateAllowed()){
			$id = Yii::$app->request->get()['id'];
			$this->layout = 'home'; 
			Yii::$app->db->createCommand("Update lembur SET persetujuan_lembur=1 WHERE id_lembur=:id")->bindValue(':id',$id)->execute();
			return $this->redirect('persetujuan-lembur');
        }else{
        	echo "You don't have access here";die;	
        }
	}
	
	//Tolak Lembur
	public function actionTolakLembur(){
		if($this->isUpdateAllowed()){
			$id = Yii::$app->request->get()['id'];
			$this->layout = 'home'; 
			Yii::$app->db->createCommand("Update lembur SET persetujuan_lembur=2 WHERE id_lembur=:id")->bindValue(':id',$id)->execute();
			return $this->redirect('persetujuan-lembur');
        }else{
        	echo "You don't have access here";die;	
        }
	}
	
	//------------------------------------------------------- DETAIL DATA ---------------------------------------------------------//
	
	//Pribadi
	public function actionDetailProfil(){
        $this->layout = 'home'; 
		return $this->render('detail_profil');
	}
	
	//Departemen
	public function actionDetailDepartement(){
        $this->layout = 'home'; 
		return $this->render('detail_departement');
	}
	
	//Pelamar
	public function actionDetailPelamar(){
        $this->layout = 'home'; 
		return $this->render('detail_pelamar');
	}
	
	//Detail Laporan Absensi
	public function actionDetailLaporanAbsensi(){
        $this->layout = 'home'; 
		return $this->render('detail_laporan_absensi');
	}
	
	//Detail Laporan Lembur
	public function actionDetailLaporanLembur(){
        $this->layout = 'home'; 
		return $this->render('detail_laporan_lembur');
	}
	
	//Detail Laporan Aktivitas
	public function actionDetailLaporanAktivitas(){
        $this->layout = 'home'; 
		return $this->render('detail_laporan_aktivitas');
	}
	
	//Detail Laporan Rekrut
	public function actionDetailLaporanRekrut(){
        $this->layout = 'home'; 
		return $this->render('detail_laporan_rekrut');
	}
}

?>