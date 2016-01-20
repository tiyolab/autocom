<?php

namespace app\models\warehouse;

use Yii;

/**
 * This is the model class for table "blok".
 *
 * @property integer $Blok_ID
 * @property string $Nama
 * @property integer $Gudang_ID
 *
 * @property Barang[] $barangs
 * @property Gudang $gudang
 */
class Blok extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'blok';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Blok_ID', 'Nama', 'Gudang_ID'], 'required'],
            [['Blok_ID', 'Gudang_ID'], 'integer'],
            [['Nama'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Blok_ID' => 'Blok  ID',
            'Nama' => 'Nama',
            'Gudang_ID' => 'Gudang  ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBarangs()
    {
        return $this->hasMany(Barang::className(), ['Blok_ID' => 'Blok_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGudang()
    {
        return $this->hasOne(Gudang::className(), ['Gudang_ID' => 'Gudang_ID']);
    }

    public function findBlokWithModule(){
        $sql = "select * from blok";

        return self::findBySql($sql)->asArray()->all();
    }

    public function getLastIdBlok(){
        $sql = "select max(Blok_ID) blokID from Blok";
        $id = self::findBySql($sql)->asArray()->one();
        return $id['blokID'];
    }
}
