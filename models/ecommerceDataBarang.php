<?php

namespace app\models;

use Yii;
use yii\base\Model;

class ecommerceDataBarang extends \yii\db\ActiveRecord
{
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
            [['ID', 'Kode_Barang','Nama_Barang', 'Jenis_Barang', 'Kemasan_ID', 'Blok_ID', 'Kadaluarsa', 'Status', 'Harga_Satuan', 'Stock', 'Gambar'], 'required'],
            [['ID', 'Kode_Barang', 'Jenis_Barang', 'Kemasan_ID', 'Blok_ID', 'Status', 'Harga_Satuan', 'Stock'], 'integer'],
            [['Kadaluarsa'], 'safe'],
            [['Nama_Barang', 'Gambar'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'Kode_Barang' => 'Kode Barang',
			'Nama_Barang' => 'Nama Barang',
			'Jenis_Barang' => 'Jenis Barang',
			'Kemasan_ID' => 'Kemasan ID',
			'Blok_ID' => 'Blok ID',
            'Kadaluarsa' => 'Kadaluarsa',
            'Status' => 'Status',
            'Harga_Satuan' => 'Harga Satuan',
            'Stock' => 'Stock',
            'Gambar' => 'Gambar',
        ];
    }

    public function findDataBarang(){
        $sql = "SELECT ID, Kode_Barang, Nama_Barang, Jenis_Barang, Kemasan_ID, Blok_ID, Kadaluarsa, Status, Harga_Satuan, Stock, Gambar
                FROM barang";

        return self::findBySql($sql)->asArray()->all();
    }

    public function findDetailBarang($id){
        $sql = "SELECT ID, Kode_Barang, Nama_Barang, Jenis_Barang, Kemasan_ID, Blok_ID, Kadaluarsa, Status, Harga_Satuan, Stock, Gambar
                FROM barang
                WHERE Kode_Barang = '$id'";


        return self::findBySql($sql)->asArray()->all();
    }

}
