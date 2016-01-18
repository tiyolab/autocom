<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gaji".
 *
 * @property integer $id_gaji
 * @property integer $id_tingkatan
 * @property integer $gaji
 */
class HrdGaji extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gaji';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_tingkatan', 'gaji'], 'required'],
            [['id_tingkatan', 'gaji'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_gaji' => 'Id Gaji',
            'id_tingkatan' => 'Id Tingkatan',
            'gaji' => 'Gaji',
        ];
    }
	
	//Gaji
    public function findGaji(){
        $sql = "select 
					id_gaji, b.tingkatan as tingkatan, b.gaji_min as gaji_min, b.gaji_max as gaji_max, gaji, persetujuan_gaji
                from gaji a, tingkatan b
				where a.id_tingkatan = b.id_tingkatan";

        return self::findBySql($sql)->asArray()->all();
    }
	
}
