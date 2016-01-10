<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "arsip".
 *
 * @property integer $id_arsip
 * @property string $nama
 * @property string $waktu_arsip
 * @property string $file
 */
class Arsip extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'arsip';
    }

    /**
     * @inheritdoc
     */
    public function rules(){
        return [
            [['nama', 'waktu_arsip', 'file', 'mime'], 'required'],
            [['waktu_arsip'], 'safe'],
            [['file'], 'string'],
            [['nama'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels(){
        return [
            'id_arsip' => 'Arsip',
            'nama' => 'Nama',
            'waktu_arsip' => 'Waktu Arsip',
            'file' => 'File',
        ];
    }

    public function showalldata(){
        $sql = "select * from arsip";
        return self::findBySql($sql)->asArray()->all();
    }

    public function showonedata($id){
        return Arsip::findOne($id);
    }
}
