<?php
namespace app\models;

use Yii;
use yii\base\Model;

class PDFPayroll extends \yii\db\ActiveRecord{
	public static function tableName(){
        return 'pegawai';
		
    }
	
	public function getDataPegawai($id_payment){
		$query = "
		SELECT DISTINCT pegawai.id_pegawai, pegawai.nama_lengkap, pegawai.gelar_dpn, pegawai.gelar_blk, 
						jabatan.nama_jabatan, 
        				departement.nama_departement, 
        				payment_history.tgl_terima, payment_history.gaji_pokok, payment_history.gaji_per_jam_lembur, payment_history.jam_lembur, payment_history.jumlah_tunjangan,
        				payment_data_extends.transportasi, payment_data_extends.makan, payment_data_extends.peminjaman, payment_data_extends.bpjs, payment_data_extends.jamsostek, payment_data_extends.pajak
		FROM pegawai, jabatan, departement, payment_history, payment_data_extends
		WHERE 	payment_history.id=$id_payment AND
				pegawai.id_jabatan=jabatan.id_jabatan AND
        		pegawai.id_departement=departement.id_departement AND
        		payment_history.id_pegawai=pegawai.id_pegawai AND
        		payment_data_extends.id_payment=payment_history.id
			

		";
		return self::findBySql($query)->asArray()->all();
	}
}
?>