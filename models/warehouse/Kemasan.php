<?php

namespace app\models\warehouse;

use Yii;

/**
 * This is the model class for table "kemasan".
 *
 * @property integer $Kemasan_ID
 * @property string $Nama
 * @property integer $Qty
 *
 * @property Barang[] $barangs
 * @property Puchaseorder[] $puchaseorders
 * @property Salesorder[] $salesorders
 */
class Kemasan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kemasan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Kemasan_ID', 'Nama', 'Qty'], 'required'],
            [['Kemasan_ID', 'Qty'], 'integer'],
            [['Nama'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Kemasan_ID' => 'Kemasan  ID',
            'Nama' => 'Nama',
            'Qty' => 'Qty',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBarangs()
    {
        return $this->hasMany(Barang::className(), ['Kemasan_ID' => 'Kemasan_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPuchaseorders()
    {
        return $this->hasMany(Puchaseorder::className(), ['Kemasan_ID' => 'Kemasan_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSalesorders()
    {
        return $this->hasMany(Salesorder::className(), ['Kemasan_ID' => 'Kemasan_ID']);
    }
    public function findKemasanWithModule(){
        $sql = "select * from kemasan";

        return self::findBySql($sql)->asArray()->all();
    }
    
     public function getLastIdKemasan(){
        $sql = "select max(Kemasan_ID) kemasanID from kemasan";
        $id = self::findBySql($sql)->asArray()->one();
        return $id['kemasanID'];
    }
}
