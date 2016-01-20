<?php

namespace app\models\warehouse;

use Yii;

/**
 * This is the model class for table "ba_pengembalian".
 *
 * @property integer $ID_Bab
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
class BaPengembalian extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ba_pengembalian';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_Bab', 'No_Faktur', 'No_Surat_Jalan', 'ID_PO', 'Tanggal_Surat', 'Tanggal_Terima', 'Kondisi', 'User_Id', 'Gudang_ID'], 'required'],
            [['ID_Bab', 'ID_PO', 'User_Id', 'Gudang_ID'], 'integer'],
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
            'ID_Bab' => 'Id  Bab',
            'No_Faktur' => 'No  Faktur',
            'No_Surat_Jalan' => 'No  Surat  Jalan',
            'ID_PO' => 'Id  Po',
            'Tanggal_Surat' => 'Tanggal  Surat',
            'Tanggal_Terima' => 'Tanggal  Terima',
            'Kondisi' => 'Kondisi',
			'Gudang_ID' => 'Gudang  ID',
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
    public function findBaPengembalianWithModule(){
        $sql = "select * from ba_pengembalian";
        return self::findBySql($sql)->asArray()->all();
    }

    public function getLastIdBabPengembalian(){
        $sql = "select max(ID_Bab) IDBap from ba_pengembalian";
        $id = self::findBySql($sql)->asArray()->one();
        return $id['IDBap'];
    }
}
