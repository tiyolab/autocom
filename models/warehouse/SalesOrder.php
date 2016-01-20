<?php

namespace app\models\warehouse;

use Yii;

/**
 * This is the model class for table "salesorder".
 *
 * @property integer $ID_SO
 * @property integer $Kode_SO
 * @property integer $Kode_Barang
 * @property string $Nama_Barang
 * @property integer $Kemasan_ID
 * @property integer $Jumlah
 * @property integer $HargaSatuan
 * @property integer $SuratJalan_ID
 * @property string $Tanggal_Order
 * @property string $Status
 *
 * @property BabKeluar[] $babKeluars
 * @property Kemasan $kemasan
 * @property Barang $kodeBarang
 */
class SalesOrder extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'salesorder';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Kode_SO', 'Kode_Barang',   'Jumlah',  'SuratJalan_ID', 'Tanggal_Order', 'Status'], 'required'],
            [['Kode_SO', 'Kode_Barang',  'Jumlah',  'SuratJalan_ID'], 'integer'],
            [['Tanggal_Order'], 'safe'],
            [[ 'Status'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_SO' => 'Id  So',
            'Kode_SO' => 'Kode  So',
            'Kode_Barang' => 'Kode  Barang',
            'Jumlah' => 'Jumlah',
            'SuratJalan_ID' => 'Surat Jalan  ID',
            'Tanggal_Order' => 'Tanggal  Order',
            'Status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBabKeluars()
    {
        return $this->hasMany(BabKeluar::className(), ['ID_SO' => 'ID_SO']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKemasan()
    {
        return $this->hasOne(Kemasan::className(), ['Kemasan_ID' => 'Kemasan_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKodeBarang()
    {
        return $this->hasOne(Barang::className(), ['Kode_Barang' => 'Kode_Barang']);
    }
    public function findSalesOrderWithModule(){
        $sql = "select * from salesorder";

        return self::findBySql($sql)->asArray()->all();
    }

    public function getLastIdSO(){
        $sql = "select max(Kode_SO) kodebarang from salesorder";
        $id = self::findBySql($sql)->asArray()->one();
        return $id['kodebarang'];
    }
}
