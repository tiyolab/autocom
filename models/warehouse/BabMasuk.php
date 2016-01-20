<?php

namespace app\models\warehouse;

use Yii;

/**
 * This is the model class for table "bab_masuk".
 *
 * @property integer $ID_Bab_masuk
 * @property string $No_Faktur
 * @property string $No_Surat_Jalan
 * @property integer $ID_PO
 * @property string $Tanggal_Surat
 * @property string $Tanggal_Terima
 * @property string $Kondisi
 * @property integer $User_Id
 *
 * @property User $user
 * @property Puchaseorder $iDPO
 */
class BabMasuk extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bab_masuk';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_Bab_masuk', 'No_Faktur', 'No_Surat_Jalan', 'ID_PO', 'Tanggal_Surat', 'Tanggal_Terima', 'Kondisi', 'User_Id'], 'required'],
            [['ID_Bab_masuk', 'ID_PO', 'User_Id'], 'integer'],
            [['Tanggal_Surat', 'Tanggal_Terima'], 'safe'],
            [['No_Faktur', 'No_Surat_Jalan', 'Kondisi'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_Bab_masuk' => 'Id  Bab Masuk',
            'No_Faktur' => 'No  Faktur',
            'No_Surat_Jalan' => 'No  Surat  Jalan',
            'ID_PO' => 'Id  Po',
            'Tanggal_Surat' => 'Tanggal  Surat',
            'Tanggal_Terima' => 'Tanggal  Terima',
            'Kondisi' => 'Kondisi',
            'User_Id' => 'User  ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['User_ID' => 'User_Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDPO()
    {
        return $this->hasOne(Puchaseorder::className(), ['ID_PO' => 'ID_PO']);
    }

    public function updateStock($id_PO){
        $result = $this->getStockData($id_PO);
        $kodebarang = $result['kode_barang'];
        $jumlah = $result['jumlah'];

        $this->addStock($kodebarang,$jumlah);
        $this->updateStatus($id_PO);
    }

    public function addStock($kodebarang,$jumlah){
        $sql = "select stock from barang where kode_barang = '$kodebarang'";
        $addition = self::findBySql($sql)->asArray()->one();
        $jumlah = $jumlah + $addition['stock'];
        return Yii::$app->db->createCommand("update barang set stock='$jumlah' where kode_barang='$kodebarang'")->execute();
    }

    public function getStockData($id_PO){
        $sql = "select kode_barang,jumlah from purchaseorder where id_po='$id_PO'";
        return self::findBySql($sql)->asArray()->one();
    }

    public function updateStatus($id_PO){
        return Yii::$app->db->createCommand("Update purchaseorder set status='Accepted' where ID_PO='$id_PO'")->execute();
    }

    public function findBabMasukWithModule(){
        $sql = "select * from bab_masuk";

        return self::findBySql($sql)->asArray()->all();
    }

    public function getLastIdBabMasuk(){
        $sql = "select max(ID_Bab_masuk) kodebarang from bab_masuk";
        $id = self::findBySql($sql)->asArray()->one();
        return $id['kodebarang'];
    }
}
