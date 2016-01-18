<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "aktivitas".
 *
 * @property integer $id_aktivitas
 * @property integer $id_pegawai
 * @property string $tanggal
 * @property string $hasil_aktivitas
 * @property string $aktivitas
 */
class HrdAktivitas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'aktivitas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            /*[['id_pegawai', 'tanggal', 'hasil_aktivitas', 'aktivitas'], 'required'],
            [['id_pegawai'], 'integer'],
            [['tanggal'], 'safe'],
            [['hasil_aktivitas', 'aktivitas'], 'string', 'max' => 100]*/
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_aktivitas' => 'Id Aktivitas',
            'id_pegawai' => 'Id Pegawai',
            'tanggal' => 'Tanggal',
            'hasil_aktivitas' => 'Hasil Aktivitas',
            'aktivitas' => 'Aktivitas',
        ];
    }
	
	//aktivitas
    public function findAktivitas(){
        $sql = "select 
					id_aktivitas, b.nip as nip, b.nama_lengkap as nama_lengkap, c.nama_jabatan as jabatan, d.tingkatan as tingkatan, aktivitas, hasil_aktivitas, tanggal
                from aktivitas a, pegawai b, jabatan c, tingkatan d
                where a.id_pegawai = b.id_pegawai AND b.id_jabatan = c.id_jabatan AND b.id_tingkatan = d.id_tingkatan";

        return self::findBySql($sql)->asArray()->all();
    }
	
	public function findLaporanAktivitas(){
		$sql = "SELECT a.id_aktivitas,a.id_pegawai, c.nip, c.nama_lengkap, COUNT(a.aktivitas) AS jumlah_aktivitas, b.nama_jabatan, tanggal
				FROM aktivitas a, jabatan b, pegawai c
				WHERE a.id_pegawai=c.id_pegawai AND c.id_jabatan=b.id_jabatan GROUP BY nip, tanggal";
		
        return self::findBySql($sql)->asArray()->all();
	}
	
	public function findLaporanAktivitasId($id){
		$sql = "SELECT a.id_aktivitas, c.nip, c.nama_lengkap, COUNT(a.aktivitas) AS jumlah_aktivitas, b.nama_jabatan, tanggal
				FROM aktivitas a, jabatan b, pegawai c
				WHERE a.id_pegawai=c.id_pegawai AND c.id_jabatan=b.id_jabatan AND a.id_pegawai = '$id' GROUP BY nip, tanggal";
		
        return self::findBySql($sql)->asArray()->all();
	}
	
    public function findLaporanaktivitasDetail($id){
        $sql = "select 
					b.nip as nip, b.nama_lengkap as nama_lengkap, c.nama_jabatan as jabatan, d.tingkatan as tingkatan, e.nama_departement as nama_departement, aktivitas, hasil_aktivitas, tanggal
                from aktivitas a, pegawai b, jabatan c, tingkatan d, departement e
                where a.id_pegawai = b.id_pegawai AND b.id_jabatan = c.id_jabatan AND b.id_tingkatan = d.id_tingkatan AND b.id_departement = e.id_departement AND a.id_pegawai ='$id' ORDER BY tanggal DESC";

        return self::findBySql($sql)->asArray()->all();
    }
	
	public function saveAktivitas($data){
		$this->id_pegawai = $data['id_pegawai'];
		$this->tanggal = $data['tanggal'];
		$this->hasil_aktivitas = $data['hasil_aktivitas'];
		$this->aktivitas = $data['aktivitas'];
        $this->save();    	
	}
	
	public function updateAktivitas($id,$data){
		$this->id_aktivitas = $id;
		$this->id_pegawai = $data['id_pegawai'];
		$this->tanggal = $data['tanggal'];
		$this->hasil_aktivitas = $data['hasil_aktivitas'];
		$this->aktivitas = $data['aktivitas'];
        $this->save();    	
	}
	
}
