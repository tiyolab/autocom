<?php

namespace app\models\warehouse;

use Yii;

/**
 * This is the model class for table "gudang".
 *
 * @property integer $Gudang_ID
 * @property string $Nama
 * @property string $Alamat
 *
 * @property Blok[] $bloks
 */
class Gudang extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gudang';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Gudang_ID', 'Nama', 'Alamat'], 'required'],
            [['Gudang_ID'], 'integer'],
            [['Nama', 'Alamat'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Gudang_ID' => 'Gudang  ID',
            'Nama' => 'Nama',
            'Alamat' => 'Alamat',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBloks()
    {
        return $this->hasMany(Blok::className(), ['Gudang_ID' => 'Gudang_ID']);
    }
    public function findGudangWithModule(){
        $sql = "select * from gudang";

        return self::findBySql($sql)->asArray()->all();
    }
    public function getLastIdGudang(){
        $sql = "select max(Gudang_ID) gudangID from Gudang";
        $id = self::findBySql($sql)->asArray()->one();
        return $id['gudangID'];
    }
}
