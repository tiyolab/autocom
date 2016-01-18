<?php

namespace app\modules\front\models;

use Yii;
use yii\base\Model;

class productModel extends \yii\db\ActiveRecord
{
    
    public function findData(){
        $sql = "SELECT *
                FROM  barang, kemasan
				WHERE barang.Kemasan_ID=kemasan.Kemasan_ID";
				
        return self::findBySql($sql)->asArray()->all();
    }

    public function findDetail($id){
        $sql = "SELECT  *
                FROM barang, kemasan
                WHERE Kode_Barang = '$id' AND barang.Kemasan_ID=kemasan.Kemasan_ID";

        return self::findBySql($sql)->asArray()->all();
    }

}
