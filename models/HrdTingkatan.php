<?php

namespace app\models;

use Yii;

class HrdTingkatan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tingkatan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            /*[['id_tingkatan', 'gaji'], 'required'],
            [['id_tingkatan', 'gaji'], 'integer']*/
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_tingkatan' => 'Id Tingkatan',
            'id_jabatan' => 'Id Jabatan',
            'tingkatan' => 'Tingkatan',
            'gaji_min' => 'Gaji Min',
            'gaji_max' => 'Gaji Max',
        ];
    }
	
	public function saveTingkatan($data){
		$this->id_jabatan = $data['id_jabatan'];
		$this->tingkatan = $data['tingkatan'];
		$this->gaji_min = $data['gaji_min'];
		$this->gaji_max = $data['gaji_max'];
        $this->save();    	
	}
	
}
