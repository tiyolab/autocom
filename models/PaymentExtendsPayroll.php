<?php

namespace app\models;

use Yii;
/**
 * This is the model class for table "module".
 *
 * @property integer $id
 * @property string $name
 *
 * @property RoleModule[] $roleModules
 */
class PaymentExtendsPayroll extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'payment_data_extends';
    }

    public static function primaryKey(){
       return 'id_payment';
    }

    public function attributeLabels()
    {
        return [
            'transportasi' => 'Besar tunjangan (per)',
            'gaji_per_jam_lembur' => 'Besar gaji Lembur (per)'
        ];
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['transportasi', 'makan', 'peminjaman', 'bpjs',
             'jamsostek', 'pajak'], 'required']
        ];
    }

    public function getLastRow()
    {        
        return $this->find()
            ->orderBy('id_payment DESC')
            ->one();
    }
}
