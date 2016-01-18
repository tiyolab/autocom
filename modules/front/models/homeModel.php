<?php

namespace app\modules\front\models;

use Yii;
use yii\base\Model;

class homeModel extends \yii\db\ActiveRecord
{
    
    public function findData(){
        $sql = "SELECT *
                FROM barang
				LIMIT 8";
        return self::findBySql($sql)->asArray()->all();
    }

    public function findDetail($id){
        $sql = "SELECT ID, *
                FROM barang
                WHERE Kode_Barang = '$id'";


        return self::findBySql($sql)->asArray()->all();
    }

}
