<?php

namespace app\modules\front\models;

use Yii;
use yii\base\Model;

class checkoutModel extends \yii\db\ActiveRecord
{
    
    public function findDataProduct($data){
        $sql = "SELECT *
                FROM  barang, kemasan
				WHERE barang.Kemasan_ID=kemasan.Kemasan_ID AND Kode_Barang IN(".$data.")";
				
        return self::findBySql($sql)->asArray()->all();
    }
	public function findProduct($id){
        $sql = "SELECT *
                FROM  barang, kemasan
				WHERE barang.Kemasan_ID=kemasan.Kemasan_ID AND Kode_Barang='$id'";
				
        return self::findBySql($sql)->asArray()->all();
    }
	
}
