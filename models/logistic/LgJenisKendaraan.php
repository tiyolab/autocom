<?php

namespace app\models\logistic;

use Yii;

/**
 * This is the model class for table "lg_jenis_kendaraan".
 *
 * @property integer $kode
 * @property string $jenis_kendaraan
 */
class LgJenisKendaraan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lg_jenis_kendaraan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['jenis_kendaraan'], 'required'],
            [['jenis_kendaraan'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'kode' => 'Kode',
            'jenis_kendaraan' => 'Jenis Kendaraan',
        ];
    }
}
