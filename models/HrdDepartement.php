<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "departement".
 *
 * @property integer $id_departement
 * @property string $nama_departement
 * @property integer $id_kodepos
 * @property string $jalan
 * @property integer $id_manager
 */
class HrdDepartement extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'departement';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            /*[['nama_departement', 'id_kodepos', 'jalan', 'id_manager'], 'required'],
            [['id_kodepos', 'id_manager'], 'integer'],
            [['nama_departement', 'jalan'], 'string', 'max' => 100]*/
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_departement' => 'Id Departement',
            'nama_departement' => 'Nama Departement',
            'jalan' => 'Jalan',
            'kecamatan' => 'Kecamatan',
            'kabupaten' => 'Kabupaten',
            'Propinsi' => 'Propinsi',
            'kodepos' => 'Kodepos',
        ];
    }
	
	//departement
    public function findDepartement(){
        $sql = "select id_departement, nama_departement
                from departement ";

        return self::findBySql($sql)->asArray()->all();
    }

    public function findDepartementWithDetail($id){
        $sql = "SELECT 
					nama_departement, jalan, kecamatan, kabupaten, propinsi, kodepos
					FROM departement";

        return self::findBySql($sql)->asArray()->all();
    }

    public function findDepartement2(){
        $sql = "SELECT 
					id_departement,nama_departement, jalan, kecamatan, kabupaten, propinsi, kodepos
					FROM departement";

        return self::findBySql($sql)->asArray()->all();
    }
	
	public function saveDepartement($data){
		$this->nama_departement = $data['nama_departement'];
		$this->jalan = $data['jalan'];
		$this->kecamatan = $data['kecamatan'];
		$this->kabupaten = $data['kabupaten'];
		$this->propinsi = $data['propinsi'];
		$this->kodepos = $data['kodepos'];
        $this->save();    	
	}
	
	public function updateDepartement($id,$data){
		$this->id_departement = $id;
		$this->nama_departement = $data['nama_departement'];
		$this->jalan = $data['jalan'];
		$this->kecamatan = $data['kecamatan'];
		$this->kabupaten = $data['kabupaten'];
		$this->propinsi = $data['propinsi'];
		$this->kodepos = $data['kodepos'];
        $this->save();    	
	}
}
