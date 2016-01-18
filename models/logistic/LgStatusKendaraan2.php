<?php

namespace app\models\logistic;

use Yii;

/**
 * This is the model class for table "lg_status_kendaraan".
 *
 * @property integer $kode
 * @property integer $kendaraan
 * @property string $tgl_permasalahan
 * @property string $permasalahan
 * @property string $tanggal_solusi
 * @property string $solusi
 */
class LgStatusKendaraan2 extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lg_status_kendaraan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kendaraan', 'tgl_permasalahan', 'permasalahan', 'tanggal_solusi', 'solusi'], 'required'],
            [['tgl_permasalahan', 'tanggal_solusi'], 'safe'],
            [['permasalahan', 'solusi'], 'string', 'max' => 1000]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        /*$sql="select a.nomor_polisi as kendaraan, b.tgl_permasalahan, b.permasalahan, b.tanggal_solusi, b.solusi from lg_status_kendaraan b,lg_kendaraan a where b.kendaraan=a.kode";
        $model=self::findBySql($sql)->asArray()->one();
        return $model;*/
        return [
            'kode' => 'Kode',
            'kendaraan' => 'Kendaraan',
            'tgl_permasalahan' => 'Tgl Permasalahan',
            'permasalahan' => 'Permasalahan',
            'tanggal_solusi' => 'Tanggal Solusi',
            'solusi' => 'Solusi',
        ];
    }
}
