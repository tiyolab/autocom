<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "materi_tes".
 *
 * @property integer $id_materi_tes
 * @property string $materi_tes
 * @property integer $id_lowongan
 */
class HrdMateri extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'materi_tes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['materi_tes', 'id_lowongan'], 'required'],
            [['id_lowongan'], 'integer'],
            [['materi_tes'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_materi_tes' => 'Id Materi Tes',
            'materi_tes' => 'Materi Tes',
            'id_lowongan' => 'Id Lowongan',
        ];
    }
	
	//Materi
    public function findMateri(){
        $sql = "select 
					id_materi_tes, b.nama_departement as nama_departement, c.nama_jabatan as jabatan, materi_tes
                from lowongan a, departement b, jabatan c, materi_tes d
                where a.id_departement = b.id_departement AND a.id_jabatan = c.id_jabatan AND d.id_lowongan = a.id_lowongan";

        return self::findBySql($sql)->asArray()->all();
    }
	
	public function saveMateri($data){
		$this->id_lowongan = $data['id_lowongan'];
		$this->materi_tes = $data['materi_tes'];
		//echo $data['tanggal_diterima'];die;
        $this->save();    	
	}
	
	public function updateMateri($id,$data){
		$this->id_materi_tes = $id;
		$this->id_lowongan = $data['id_lowongan'];
		$this->materi_tes = $data['materi_tes'];
		//echo $data['tanggal_diterima'];die;
        $this->save();    	
	}
	
}
