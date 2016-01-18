<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "absensi".
 *
 * @property integer $id_absen
 * @property integer $id_pegawai
 * @property integer $kehadiran
 * @property string $jam_masuk
 * @property string $jam_pulang
 * @property string $tanggal
 */
class HrdAbsensi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'absensi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            /*[['id_pegawai', 'kehadiran', 'jam_masuk', 'jam_pulang', 'tanggal'], 'required'],
            [['id_pegawai', 'kehadiran'], 'integer'],
            [['jam_masuk', 'jam_pulang', 'tanggal'], 'safe']*/
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_absen' => 'Id Absen',
            'id_pegawai' => 'Id Pegawai',
            'kehadiran' => 'Kehadiran',
            'jam_masuk' => 'Jam Masuk',
            'tanggal' => 'Tanggal',
        ];
    }
	
	//absensi
    public function findAbsensi(){
        $sql = "select 
					b.nip as nip, b.nama_lengkap as nama_lengkap, c.nama_jabatan as jabatan, d.tingkatan as tingkatan, e.nama_departement as nama_departement, kehadiran, jam_masuk, tanggal
                from absensi a, pegawai b, jabatan c, tingkatan d, departement e
                where a.id_pegawai = b.id_pegawai AND b.id_jabatan = c.id_jabatan AND b.id_tingkatan = d.id_tingkatan AND b.id_departement = e.id_departement order by tanggal DESC";

        return self::findBySql($sql)->asArray()->all();
    }
	
    public function findAbsensiHarian(){
        $sql = "select 
					b.nip as nip, b.nama_lengkap as nama_lengkap, c.nama_jabatan as jabatan, d.tingkatan as tingkatan, e.nama_departement as nama_departement, kehadiran, jam_masuk, tanggal
                from absensi a, pegawai b, jabatan c, tingkatan d, departement e
                where a.id_pegawai = b.id_pegawai AND b.id_jabatan = c.id_jabatan AND b.id_tingkatan = d.id_tingkatan AND b.id_departement = e.id_departement AND tanggal = CURDATE()";

        return self::findBySql($sql)->asArray()->all();
    }
	
    public function findAbsensiBulanan(){
        $sql = "select 
					b.nip as nip, b.nama_lengkap as nama_lengkap, c.nama_jabatan as jabatan, d.tingkatan as tingkatan, e.nama_departement as nama_departement, kehadiran, jam_masuk, tanggal
                from absensi a, pegawai b, jabatan c, tingkatan d, departement e
                where a.id_pegawai = b.id_pegawai AND b.id_jabatan = c.id_jabatan AND b.id_tingkatan = d.id_tingkatan AND b.id_departement = e.id_departement order by tanggal DESC";

        return self::findBySql($sql)->asArray()->all();
    }
	
	public function findLaporanAbsensi(){
		$sql = "SELECT a.id_absen,a.id_pegawai, c.nip, c.nama_lengkap, COUNT(a.kehadiran) AS jumlah_absensi, b.nama_jabatan, tanggal
				FROM absensi a, jabatan b, pegawai c
				WHERE a.id_pegawai=c.id_pegawai AND c.id_jabatan=b.id_jabatan AND a.kehadiran = 1 GROUP BY nip, tanggal";
		
        return self::findBySql($sql)->asArray()->all();
	}
	
	public function findLaporanAbsensiId($id){
		$sql = "SELECT a.id_absen, c.nip, c.nama_lengkap, COUNT(a.kehadiran) AS jumlah_absensi, b.nama_jabatan, tanggal
				FROM absensi a, jabatan b, pegawai c
				WHERE a.id_pegawai=c.id_pegawai AND c.id_jabatan=b.id_jabatan AND a.kehadiran = 1 AND a.id_pegawai = '$id' GROUP BY nip, tanggal";
		
        return self::findBySql($sql)->asArray()->all();
	}
	
    public function findLaporanAbsensiDetail($id){
        $sql = "select 
					b.nip as nip, b.nama_lengkap as nama_lengkap, c.nama_jabatan as jabatan, d.tingkatan as tingkatan, e.nama_departement as nama_departement, kehadiran, jam_masuk, tanggal
                from absensi a, pegawai b, jabatan c, tingkatan d, departement e
                where a.id_pegawai = b.id_pegawai AND b.id_jabatan = c.id_jabatan AND b.id_tingkatan = d.id_tingkatan AND b.id_departement = e.id_departement AND a.id_pegawai ='$id' ORDER BY tanggal DESC";

        return self::findBySql($sql)->asArray()->all();
    }
	
	public function saveAbsensi($id,$data){
		$this->id_absen = $id;
		$this->id_pegawai = $data['id_pegawai'];
		$this->jam_masuk = $data['jam_masuk'];
		$this->tanggal = $data['tanggal'];
		$this->kehadiran = 1;
        $this->save();    	
	}
	
	public function saveAbsensiUser($id){
		//print_r ($id);die;
		$this->id_pegawai = $id['id_pegawai'];
		//echo $id['id_pegawai'];die;
		$this->kehadiran = 0;
        $this->save();    	
	}
}
