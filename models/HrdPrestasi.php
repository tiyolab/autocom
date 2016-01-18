<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "prestasi".
 *
 * @property integer $id_prestasi
 * @property integer $id_pegawai
 * @property string $prestasi
 * @property string $instansi_pemberi
 * @property string $tgl_diperoleh
 */
class HrdPrestasi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'prestasi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pegawai', 'prestasi', 'instansi_pemberi', 'tgl_diperoleh'], 'required'],
            [['id_pegawai'], 'integer'],
            [['tgl_diperoleh'], 'safe'],
            [['prestasi', 'instansi_pemberi'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_prestasi' => 'Id Prestasi',
            'id_pegawai' => 'Id Pegawai',
            'prestasi' => 'Prestasi',
            'instansi_pemberi' => 'Instansi Pemberi',
            'tgl_diperoleh' => 'Tgl Diperoleh',
        ];
    }
	
	//prestasi
    public function findPrestasi(){
        $sql = "select 
					a.id_prestasi as id_prestasi, prestasi, instansi_pemberi, tgl_diperoleh, b.nama_lengkap as nama_lengkap, b.nip as nip, c.nama_jabatan as jabatan, d.tingkatan as tingkatan, e.nama_departement as nama_departement
                from prestasi a, pegawai b, jabatan c, tingkatan d, departement e
                where a.id_pegawai = b.id_pegawai AND b.id_jabatan = c.id_jabatan AND b.id_tingkatan = d.id_tingkatan AND b.id_departement = e.id_departement";

        return self::findBySql($sql)->asArray()->all();
    }
	
	public function savePrestasi($data){
		$this->id_pegawai = $data['id_pegawai'];
		$this->prestasi = $data['prestasi'];
		$this->instansi_pemberi = $data['instansi_pemberi'];
		$this->tgl_diperoleh = $data['tgl_diperoleh'];
        $this->save();    	
	}
	
	public function updatePrestasi($id,$data){
		$this->id_prestasi = $id;
		$this->id_pegawai = $data['id_pegawai'];
		$this->prestasi = $data['prestasi'];
		$this->instansi_pemberi = $data['instansi_pemberi'];
		$this->tgl_diperoleh = $data['tgl_diperoleh'];
        $this->save();    	
	}
}
