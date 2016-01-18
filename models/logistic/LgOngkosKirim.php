<?php

namespace app\models\logistic;

use Yii;

/**
 * This is the model class for table "lg_ongkos_kirim".
 *
 * @property integer $kode
 * @property string $tujuan
 * @property integer $day
 * @property integer $harga
 * @property string $weight
 * @property string $harga_perweight
 * @property string $dimension
 * @property string $harga_perdimension
 */
class LgOngkosKirim extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lg_ongkos_kirim';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tujuan', 'day', 'harga', 'harga_perweight'], 'required'],
            [['tujuan', 'day', 'harga', 'harga_perweight'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'kode' => 'Kode',
            'tujuan' => 'Zip Code',
            'day' => 'Day',
            'harga' => 'Harga',
            'harga_perweight' => 'Harga Weight(PerKg)',
        ];
    }
}
