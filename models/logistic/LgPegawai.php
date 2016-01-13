<?php

namespace app\models\logistic;

use Yii;


class LgPegawai extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pegawai';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        $sql = "select 
                    nama_lengkap, nip, b.nama_jabatan as jabatan, c.tingkatan as tingkatan, d.nama_departement as departement
                from pegawai a, jabatan b, tingkatan c, departement d
                where a.id_jabatan = b.id_jabatan AND a.id_tingkatan = c.id_tingkatan AND a.id_departement = d.id_departement AND department='logistik'";

        return self::findBySql($sql)->asArray()->all();
    }
}