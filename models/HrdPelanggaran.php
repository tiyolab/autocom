<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pelanggaran".
 *
 * @property integer $id_pelanggaran
 * @property integer $id_pegawai
 * @property string $pelanggaran
 * @property string $tgl_melanggar
 * @property string $tindakan
 */
class HrdPelanggaran extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pelanggaran';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pegawai', 'pelanggaran', 'tgl_melanggar', 'tindakan'], 'required'],
            [['id_pegawai'], 'integer'],
            [['tgl_melanggar'], 'safe'],
            [['pelanggaran', 'tindakan'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_pelanggaran' => 'Id Pelanggaran',
            'id_pegawai' => 'Id Pegawai',
            'pelanggaran' => 'Pelanggaran',
            'tgl_melanggar' => 'Tgl Melanggar',
            'tindakan' => 'Tindakan',
        ];
    }
	
	//Pelanggaran
    public function findPelanggaran(){
        $sql = "select 
					id_pelanggaran, b.nip as nip, b.nama_lengkap as nama_lengkap, c.nama_jabatan as jabatan, d.tingkatan as tingkatan, e.nama_departement as nama_departement, pelanggaran, tgl_melanggar, tindakan
                from pelanggaran a, pegawai b, jabatan c, tingkatan d, departement e
				where a.id_pegawai = b.id_pegawai AND b.id_jabatan = c.id_jabatan AND b.id_tingkatan = d.id_tingkatan AND b.id_departement = e.id_departement";

        return self::findBySql($sql)->asArray()->all();
    }
	
	public function savePelanggaran($data){
		$this->id_pegawai = $data['id_pegawai'];
		$this->pelanggaran = $data['pelanggaran'];
		$this->tgl_melanggar = $data['tgl_melanggar'];
		$this->tindakan = $data['tindakan'];
		//echo $data['tanggal_diterima'];die;
        $this->save();    	
	}
	
	public function updatePelanggaran($id,$data){
		$this->id_pelanggaran = $id;
		$this->id_pegawai = $data['id_pegawai'];
		$this->pelanggaran = $data['pelanggaran'];
		$this->tgl_melanggar = $data['tgl_melanggar'];
		$this->tindakan = $data['tindakan'];
		//echo $data['tanggal_diterima'];die;
        $this->save();    	
	}
}
