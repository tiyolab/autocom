<?php

namespace app\models\warehouse;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "barang".
 *
 * @property integer $ID
 * @property integer $Kode_Barang
 * @property string $Nama_Barang
 * @property integer $Jenis_Barang
 * @property integer $Kemasan_ID
 * @property integer $Blok_ID
 * @property string $Kadaluarsa
 * @property integer $Status
 * @property integer $Harga_Satuan
 * @property integer $Stock
 * @property string $Gambar
 *
 * @property Blok $blok
 * @property JenisBarang $jenisBarang
 * @property Kemasan $kemasan
 * @property Puchaseorder[] $puchaseorders
 * @property Salesorder[] $salesorders
 */
class Barang extends \yii\db\ActiveRecord
{
    public $file;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'barang';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Kode_Barang', 'Nama_Barang', 'Jenis_Barang', 'Kemasan_ID', 'Blok_ID', 'Kadaluarsa', 'Status', 'Harga_Satuan', 'Stock', 'Gambar'], 'required'],
            [['Kode_Barang', 'Jenis_Barang', 'Kemasan_ID', 'Blok_ID', 'Status', 'Harga_Satuan', 'Stock','Stock_temp'], 'integer'],
            [['Kadaluarsa'], 'safe'],
            [['Nama_Barang',], 'string', 'max' => 50],
            [['file'],'file'],
            [['Gambar'], 'string', 'max' => 500]
            //[['Gambar'], 'safe'],
            //[['Gambar'], 'file', 'extensions'=>'jpg, gif, png'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'Kode_Barang' => 'Kode  Barang',
            'Nama_Barang' => 'Nama  Barang',
            'Jenis_Barang' => 'Jenis  Barang',
            'Kemasan_ID' => 'Kemasan  ID',
            'Blok_ID' => 'Blok  ID',
            'Kadaluarsa' => 'Kadaluarsa',
            'Status' => 'Status',
            'Harga_Satuan' => 'Harga  Satuan',
            'Stock' => 'Stock',
            'Stock_temp' => 'Stock_temp',
            'file' => 'Gambar',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBlok()
    {
        return $this->hasOne(Blok::className(), ['Blok_ID' => 'Blok_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJenisBarang()
    {
        return $this->hasOne(JenisBarang::className(), ['Jenis_Barang_ID' => 'Jenis_Barang']);
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
    public function getPuchaseorders()
    {
        return $this->hasMany(Puchaseorder::className(), ['Kode_Barang' => 'Kode_Barang']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSalesorders()
    {
        return $this->hasMany(Salesorder::className(), ['Kode_Barang' => 'Kode_Barang']);
    }

    public function getLastIdBarang(){
        $sql = "select max(Kode_Barang) kodebarang from Barang";
        $id = self::findBySql($sql)->asArray()->one();
        return $id['kodebarang'];
    }

    public function findBarangWithModule(){
        $sql = "select * from barang";

        return self::findBySql($sql)->asArray()->all();
    }

    public function updateStockTemp(){
        return Yii::$app->db->createCommand("Update barang set Stock_temp='Accepted' where ID_PO='$id_PO'")->execute();
    }

    public function upload($kodebarang)
    {
        if ($this->validate()) {
            $this->imageFile->saveAs('/asset/images/Barang/' . $kodebarang . '.jpg');
            return true;
        } else {
            return false;
        }
    }
}
