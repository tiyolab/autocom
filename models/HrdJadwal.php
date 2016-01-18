<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jadwal_tes".
 *
 * @property integer $id_jadwal_tes
 * @property integer $id_materi_tes
 * @property string $jadwal_tes
 * @property integer $persetujuan_jadwal
 */
class HrdJadwal extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jadwal_tes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_materi_tes', 'jadwal_tes', 'persetujuan_jadwal'], 'required'],
            [['id_materi_tes', 'persetujuan_jadwal'], 'integer'],
            [['jadwal_tes'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_jadwal_tes' => 'Id Jadwal Tes',
            'id_materi_tes' => 'Id Materi Tes',
            'jadwal_tes' => 'Jadwal Tes',
            'persetujuan_jadwal' => 'Persetujuan Jadwal',
        ];
    }
	
	//Jadwal
    public function findJadwal(){
        $sql = "select 
					id_jadwal_tes, b.materi_tes as materi_tes, jadwal_tes
                from jadwal_tes a, materi_tes b
				where a.id_materi_tes = b.id_materi_tes";

        return self::findBySql($sql)->asArray()->all();
    }
	
	public function saveJadwal($data){
		$this->id_materi_tes = $data['id_materi_tes'];
		$this->jadwal_tes = $data['jadwal_tes'];
		$this->persetujuan_jadwal = $data['persetujuan_jadwal'];
		//echo $data['tanggal_diterima'];die;
        $this->save();    	
	}
	
	public function updateJadwal($id,$data){
		$this->id_jadwal_tes = $id;
		$this->id_materi_tes = $data['id_materi_tes'];
		$this->jadwal_tes = $data['jadwal_tes'];
		$this->persetujuan_jadwal = $data['persetujuan_jadwal'];
		//echo $data['tanggal_diterima'];die;
        $this->save();    	
	}
	
	
}
