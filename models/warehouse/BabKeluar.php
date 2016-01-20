<?php

namespace app\models\warehouse;

use Yii;

/**
 * This is the model class for table "bab_keluar".
 *
 * @property integer $ID_Bab_Keluar
 * @property string $NO_Surat_Jalan
 * @property integer $ID_SO
 * @property string $Tanggal_Surat
 * @property string $Tanggal_Keluar
 * @property string $Kondisi
 * @property integer $User_Id
 *
 * @property User $user
 * @property Salesorder $iDSO
 */
class BabKeluar extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bab_keluar';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_Bab_Keluar', 'NO_Surat_Jalan', 'ID_SO', 'Tanggal_Surat', 'Tanggal_Keluar', 'Kondisi', 'User_Id'], 'required'],
            [['ID_Bab_Keluar', 'ID_SO', 'User_Id'], 'integer'],
            [['Tanggal_Surat', 'Tanggal_Keluar'], 'safe'],
            [['NO_Surat_Jalan', 'Kondisi'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_Bab_Keluar' => 'Id  Bab  Keluar',
            'NO_Surat_Jalan' => 'No  Surat  Jalan',
            'ID_SO' => 'Id  So',
            'Tanggal_Surat' => 'Tanggal  Surat',
            'Tanggal_Keluar' => 'Tanggal  Keluar',
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
    public function getIDSO()
    {
        return $this->hasOne(Salesorder::className(), ['ID_SO' => 'ID_SO']);
    }
    
    public function findBabKeluarWithModule(){
        $sql = "select * from bab_keluar";

        return self::findBySql($sql)->asArray()->all();
    }

    public function updateStock($id_SO){
        $result = $this->getStockData($id_SO);
        $kodebarang = $result['kode_barang'];
        $jumlah = $result['jumlah'];

        $this->addStock($kodebarang,$jumlah);
        $this->updateStatus($id_SO);
    }

    public function addStock($kodebarang,$jumlah){
        $sql = "select stock from barang where kode_barang = '$kodebarang'";
        $addition = self::findBySql($sql)->asArray()->one();
        $jumlah = $addition['stock']-$jumlah;
        return Yii::$app->db->createCommand("update barang set stock='$jumlah' where kode_barang='$kodebarang'")->execute();
        
    }

    public function getStockData($id_SO){
        $sql = "select kode_barang,jumlah from salesorder where id_so='$id_SO'";
        return self::findBySql($sql)->asArray()->one();
    }

    public function updateStatus($id_SO){
        return Yii::$app->db->createCommand("Update salesorder set status='Accepted' where ID_SO='$id_SO'")->execute();
    }

    public function getLastIdBabKeluar(){
        $sql = "select max(ID_Bab_Keluar) kodebarang from bab_keluar";
        $id = self::findBySql($sql)->asArray()->one();
        return $id['kodebarang'];
    }

}
