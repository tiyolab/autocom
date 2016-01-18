<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lembur".
 *
 * @property integer $id_lembur
 * @property integer $id_pegawai
 * @property string $tgl_lembur
 * @property integer $durasi
 * @property string $kegiatan
 * @property integer $persetujuan_lembur
 */
class HrdLembur extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lembur';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            /*[['id_pegawai', 'tgl_lembur', 'durasi', 'kegiatan', 'persetujuan_lembur'], 'required'],
            [['id_pegawai', 'durasi', 'persetujuan_lembur'], 'integer'],
            [['tgl_lembur'], 'safe'],
            [['kegiatan'], 'string', 'max' => 100]*/
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_lembur' => 'Id Lembur',
            'id_pegawai' => 'Id Pegawai',
            'tgl_lembur' => 'Tgl Lembur',
            'durasi' => 'Durasi',
            'kegiatan' => 'Kegiatan',
            'persetujuan_lembur' => 'Persetujuan Lembur',
        ];
    }
	
	//lembur
    public function findLembur(){
        $sql = "select 
					id_lembur, b.nip as nip, b.nama_lengkap as nama_lengkap, c.nama_jabatan as jabatan, d.tingkatan as tingkatan, tgl_lembur, durasi, kegiatan, persetujuan_lembur
                from lembur a, pegawai b, jabatan c, tingkatan d
                where a.id_pegawai = b.id_pegawai AND b.id_jabatan = c.id_jabatan AND b.id_tingkatan = d.id_tingkatan";

        return self::findBySql($sql)->asArray()->all();
    }
	
    public function findLemburPending(){
        $sql = "select 
					id_lembur, b.nip as nip, b.nama_lengkap as nama_lengkap, c.nama_jabatan as jabatan, d.tingkatan as tingkatan, tgl_lembur, durasi, kegiatan, persetujuan_lembur
                from lembur a, pegawai b, jabatan c, tingkatan d
                where a.id_pegawai = b.id_pegawai AND b.id_jabatan = c.id_jabatan AND b.id_tingkatan = d.id_tingkatan AND persetujuan_lembur = 0";

        return self::findBySql($sql)->asArray()->all();
    }
	
    public function findLaporanLembur(){
        $sql = "SELECT id_lembur, a.id_pegawai, c.nip, c.nama_lengkap, COUNT(a.persetujuan_lembur) AS jumlah_lembur, b.nama_jabatan, a.tgl_lembur
				FROM lembur a, jabatan b, pegawai c
				WHERE a.id_pegawai=c.id_pegawai AND c.id_jabatan=b.id_jabatan AND persetujuan_lembur=1 GROUP BY nip, tgl_lembur";

        return self::findBySql($sql)->asArray()->all();
    }
	
	public function findLaporanLemburId($id){
		$sql = "SELECT id_lembur, a.id_pegawai, c.nip, c.nama_lengkap, COUNT(a.persetujuan_lembur) AS jumlah_lembur, b.nama_jabatan, a.tgl_lembur
				FROM lembur a, jabatan b, pegawai c
				WHERE a.id_pegawai=c.id_pegawai AND c.id_jabatan=b.id_jabatan AND persetujuan_lembur=1 AND a.id_pegawai = '$id' GROUP BY nip, tgl_lembur";

		
        return self::findBySql($sql)->asArray()->all();
	}
	
	public function findLaporanLemburDetail($id){
		$sql = "select 
					b.nip as nip, b.nama_lengkap as nama_lengkap, c.nama_jabatan as jabatan, d.tingkatan as tingkatan, e.nama_departement as nama_departement, kegiatan, durasi, tgl_lembur
                from lembur a, pegawai b, jabatan c, tingkatan d, departement e
                where a.id_pegawai = b.id_pegawai AND b.id_jabatan = c.id_jabatan AND b.id_tingkatan = d.id_tingkatan AND b.id_departement = e.id_departement AND a.id_pegawai ='$id' ORDER BY tgl_lembur DESC";
						
        return self::findBySql($sql)->asArray()->all();
	}
	
	public function saveLembur($data){
		$this->id_pegawai = $data['id_pegawai'];
		$this->tgl_lembur = $data['tanggal_lembur'];
		$this->durasi = $data['durasi'];
		$this->kegiatan = $data['kegiatan'];
		$this->persetujuan_lembur = $data['persetujuan_lembur'];
        $this->save();    	
	}
	
	public function updateLembur($id,$data){
		$this->id_lembur = $id;
		$this->id_pegawai = $data['id_pegawai'];
		$this->tgl_lembur = $data['tanggal_lembur'];
		$this->durasi = $data['durasi'];
		$this->kegiatan = $data['kegiatan'];
		$this->persetujuan_lembur = $data['persetujuan_lembur'];
        $this->save();    	
	}
	
}
