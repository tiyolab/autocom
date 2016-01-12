<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "arsip".
 *
 * @property integer $id_arsip
 * @property integer $id_user
 * @property string $nama
 * @property string $waktu_arsip
 * @property string $imageFile
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
    public function rules()
    {
        return [
            [['nama', 'waktu_arsip', 'imageFile'], 'required'],
            [['waktu_arsip'], 'safe'],
            [['imageFile'], 'string'],
            [['nama'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_arsip' => 'Id Arsip',
            'nama' => 'Nama',
            'waktu_arsip' => 'Waktu Arsip',
            'imageFile' => 'Image File',
        ];
    }

    public function showalldata(){
        $sql = "select * from arsip";
        return self::findBySql($sql)->asArray()->all();
    }

    public function showonedata($id){
        return Arsip::findOne($id);
    }

//    public function insertdata($data){
//        $this->nama = $data['nama'];
//        $this->waktu_arsip = date('Y-m-d H:i:s');
//        $this->save();
//    }
}
