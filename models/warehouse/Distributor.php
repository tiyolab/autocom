<?php

namespace app\models\warehouse;

use Yii;

/**
 * This is the model class for table "distributor".
 *
 * @property integer $ID_Distributor
 * @property string $Nama
 *
 * @property Puchaseorder[] $puchaseorders
 */
class Distributor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'distributor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_Distributor', 'Nama'], 'required'],
            [['ID_Distributor'], 'integer'],
            [['Nama'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_Distributor' => 'Id  Distributor',
            'Nama' => 'Nama',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPuchaseorders()
    {
        return $this->hasMany(Puchaseorder::className(), ['Distributor_ID' => 'ID_Distributor']);
    }
    public function findDistributorWithModule(){
        $sql = "select * from distributor";

        return self::findBySql($sql)->asArray()->all();
    }
    public function getLastIdDistributor(){
        $sql = "select max(ID_Distributor) distributorID from distributor";
        $id = self::findBySql($sql)->asArray()->one();
        return $id['distributorID'];
    }
}
