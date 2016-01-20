<?php

namespace app\models\warehouse;

use Yii;

/**
 * This is the model class for table "jenis_barang".
 *
 * @property integer $Jenis_Barang_ID
 * @property string $Nama
 *
 * @property Barang[] $barangs
 */
class JenisBarang extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jenis_barang';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Jenis_Barang_ID', 'Nama'], 'required'],
            [['Jenis_Barang_ID'], 'integer'],
            [['Nama'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Jenis_Barang_ID' => 'Jenis  Barang  ID',
            'Nama' => 'Nama',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBarangs()
    {
        return $this->hasMany(Barang::className(), ['Jenis_Barang' => 'Jenis_Barang_ID']);
    }
    
    public function findJenisBarangWithModule(){
        $sql = "select * from jenis_barang";

        return self::findBySql($sql)->asArray()->all();
    }
    
    public function getLastIdJenisBarang(){
        $sql = "select max(Jenis_Barang_ID) jenisBarangID from jenis_barang";
        $id = self::findBySql($sql)->asArray()->one();
        return $id['jenisBarangID'];
    }

    public function getJenisBarangList(){
        $sql = "Select Blok_ID,Nama from Blok";
        return self::findBySql($sql)->asArray()->all();
    }
}
