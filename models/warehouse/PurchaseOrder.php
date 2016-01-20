<?php

namespace app\models\warehouse;

use Yii;

/**
 * This is the model class for table "puchaseorder".
 *
 * @property integer $ID_PO
 * @property integer $Kode_PO
 * @property integer $Kode_Barang
 * @property string $Nama_Barang
 * @property integer $Kemasan_ID
 * @property integer $Jumlah
 * @property integer $HargaSatuan
 * @property integer $Distributor_ID
 * @property string $Tanggal_Order
 * @property string $Status
 *
 * @property BaPengembalian[] $baPengembalians
 * @property BabMasuk[] $babMasuks
 * @property Distributor $distributor
 * @property Barang $kodeBarang
 * @property Kemasan $kemasan
 */
class PurchaseOrder extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'purchaseorder';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Kode_PO', 'Kode_Barang', 'Jumlah', 'Distributor_ID', 'Tanggal_Order', 'Status'], 'required'],
            [['Kode_PO', 'Kode_Barang' , 'Jumlah', 'Distributor_ID'], 'integer'],
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
            'ID_PO' => 'Id Po',
            'Kode_PO' => 'Kode Po',
            'Kode_Barang' => 'Kode Barang',
            'Jumlah' => 'Jumlah',
            'Distributor_ID' => 'Distributor  ID',
            'Tanggal_Order' => 'Tanggal Order',
            'Status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBaPengembalians()
    {
        return $this->hasMany(BaPengembalian::className(), ['ID_PO' => 'ID_PO']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBabMasuks()
    {
        return $this->hasMany(BabMasuk::className(), ['ID_PO' => 'ID_PO']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDistributor()
    {
        return $this->hasOne(Distributor::className(), ['ID_Distributor' => 'Distributor_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKodeBarang()
    {
        return $this->hasOne(Barang::className(), ['Kode_Barang' => 'Kode_Barang']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKemasan()
    {
        return $this->hasOne(Kemasan::className(), ['Kemasan_ID' => 'Kemasan_ID']);
    }

    public function updateStatus($id){
        $status = $this->getStatus($id);
//        print_r($status);
  //      die;
        if($status['status'] == "On The Way"){
            return Yii::$app->db->createCommand("Update purchaseorder set status='Accepted' where ID_PO=:id")->bindValue(':id',$id)->execute();
        }else if($status['status'] == "Accepted"){
            return Yii::$app->db->createCommand("Update purchaseorder set status='On The Way' where ID_PO=:id")->bindValue(':id',$id)->execute();
        }        
    }

    public function getStatus($id){
        $sql = "select status from purchaseorder where ID_PO='$id'";
        return self::findBySql($sql)->asArray()->one();
    }

    public function findPurchaseOrderWithModule(){
        $sql = "select * from purchaseorder";
        return self::findBySql($sql)->asArray()->all();
    }

    public function getLastIdPO(){
        $sql = "select max(Kode_PO) kodebarang from purchaseorder";
        $id = self::findBySql($sql)->asArray()->one();
        return $id['kodebarang'];
    }
}
