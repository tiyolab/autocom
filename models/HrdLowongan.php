<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lowongan".
 *
 * @property integer $id_lowongan
 * @property integer $id_departement
 * @property integer $id_jabatan
 * @property integer $jumlah_tempat
 * @property string $tgl_tawaran
 * @property string $batas_akhir
 */
class HrdLowongan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lowongan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            /*[['id_departement', 'id_jabatan', 'jumlah_tempat', 'tgl_tawaran', 'batas_akhir'], 'required'],
            [['id_departement', 'id_jabatan', 'jumlah_tempat'], 'integer'],
            [['tgl_tawaran', 'batas_akhir'], 'safe']*/
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_lowongan' => 'Id Lowongan',
            'id_departement' => 'Id Departement',
            'id_jabatan' => 'Id Jabatan',
            'jumlah_tempat' => 'Jumlah Tempat',
            'tgl_tawaran' => 'Tgl Tawaran',
            'batas_akhir' => 'Batas Akhir',
        ];
    }
	
	//Lowongan
    public function findLowongan(){
        $sql = "select 
					id_lowongan, b.nama_departement as nama_departement, c.nama_jabatan as jabatan, jumlah_tempat, tgl_tawaran, batas_akhir
                from lowongan a, departement b, jabatan c
                where a.id_departement = b.id_departement AND a.id_jabatan = c.id_jabatan";

        return self::findBySql($sql)->asArray()->all();
    }
	
    public function findDepartement(){
        $sql = "select *
                from departement ";

        return self::findBySql($sql)->asArray()->all();
    }
	
	public function findJabatan(){
        $sql = "select *
                from jabatan ";

        return self::findBySql($sql)->asArray()->all();		
	}
	
	public function saveLowongan($data){
		$this->id_departement = $data['id_departement'];
		$this->id_jabatan = $data['id_jabatan'];
		$this->jumlah_tempat = $data['jumlah_tempat'];
		$this->tgl_tawaran = $data['tgl_tawaran'];
		$this->batas_akhir = $data['batas_akhir'];
        $this->save();    		
	}
	
	public function updateLowongan($id,$data){
		$this->id_lowongan = $id;
		$this->id_departement = $data['id_departement'];
		$this->id_jabatan = $data['id_jabatan'];
		$this->jumlah_tempat = $data['jumlah_tempat'];
		$this->tgl_tawaran = $data['tgl_tawaran'];
		$this->batas_akhir = $data['batas_akhir'];
        $this->save();    		
	}
	
}
