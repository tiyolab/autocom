<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "memo".
 *
 * @property integer $id_memo
 * @property integer $id_pengirim
 * @property integer $id_penerima
 * @property string $isi
 * @property string $waktu_memo
 */
class Memo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'memo';
    }

    /**
     * @inheritdoc
     */


    public function saveMemo($data){
        $this->id_pengirim = $data['id_pengirim'];
        $this->id_penerima = $data['id_penerima'];
        $this->isi = $data['isi'];
        $this->waktu_memo = date('Y-m-d H:i:s');
        $this->save();
        return true;
    }

    public function showmemoin($id){
        $sql = "select * from memo WHERE id_penerima = '".$id."'";
        return self::findBySql($sql)->asArray()->all();
    }

    public function showmemoout($id){
        $sql = "select * from memo WHERE id_pengirim = '".$id."'";
        return self::findBySql($sql)->asArray()->all();
    }
}
