<?php

namespace app\models;

use Yii;

class Surat extends \yii\db\ActiveRecord{

    public static function tableName(){
        return 'surat';
    }

    public function showalldata(){
        $sql = "select * from surat";

        return self::findBySql($sql)->asArray()->all();
    }
}

?>