<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "manager".
 *
 * @property integer $id_manager
 * @property integer $id_department
 * @property integer $id_pegawai
 * @property string $tgl_lantik
 */
class HrdManager extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'manager';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            /*[['id_department', 'id_pegawai', 'tgl_lantik'], 'required'],
            [['id_department', 'id_pegawai'], 'integer'],
            [['tgl_lantik'], 'safe']*/
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            /*'id_manager' => 'Id Manager',
            'id_department' => 'Id Department',
            'id_pegawai' => 'Id Pegawai',
            'tgl_lantik' => 'Tgl Lantik',*/
        ];
    }
	
    public function findManager(){
        $sql = "select 
					a.id_manager as id_manager, c.nama_departement as nama_departement, b.nip as nip, b.nama_lengkap as nama_lengkap, tgl_lantik					
                from manager a, pegawai b, departement c
                where a.id_departement = c.id_departement AND a.id_pegawai = b.id_pegawai";

        return self::findBySql($sql)->asArray()->all();
    }
	
	public function saveManager($data){
		$this->id_departement = $data['id_departement'];
		$this->id_pegawai = $data['id_pegawai'];
		$this->tgl_lantik = $data['tgl_lantik'];
        $this->save();    	
	}
	
	public function updateManager($id,$data){
		$this->id_manager = $id;
		$this->id_departement = $data['id_departement'];
		$this->id_pegawai = $data['id_pegawai'];
		$this->tgl_lantik = $data['tgl_lantik'];
        $this->save();    	
	}
}
