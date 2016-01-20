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
class DataGajiPayroll extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'data_gaji';
    }

    public static function primaryKey()
    {
       return 'id_pegawai';
    }

    public function attributeLabels()
    {
        return [
            'tunjangan_per_tanggungan' => 'Besar tunjangan (per)',
            'gaji_per_jam_lembur' => 'Besar gaji Lembur (per)'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pegawai', 'gaji_pokok', 'tunjangan_per_tanggungan', 'tanggungan_keluarga', 
                'gaji_per_jam_lembur', 'jam_lembur', 'tgl_dibuat', 'tgl_diupdate'], 'required'],
            [['tgl_dibuat', 'tgl_diupdate'], 'date', 'format' => 'yyyy-M-d']
        ];
    }

    public function updateInformation($request)
    {
        foreach ((new PegawaiPayroll())->find()->all() as $value) {
            // Nilai di bawa get dr punya windhy
            $gaji_pokok = 40000000;
            $tanggungan_keluarga = 4;
            $jam_lembur = 3;

            $result = $this->updateAll(
                [
                    'gaji_pokok' => $gaji_pokok,
                    'tunjangan_per_tanggungan' => $request['tunjangan_per_tanggungan'],
                    'tanggungan_keluarga' => $tanggungan_keluarga,
                    'gaji_per_jam_lembur' => $request['gaji_per_jam_lembur'],
                    'jam_lembur' => $jam_lembur,
                    'tgl_diupdate' => date('Y-m-d'),
                ],
                 'id_pegawai = '.$value->id_pegawai
                );

            $check_exist = $this->find()
                    ->where([ 'id_pegawai' => $value->id_pegawai ])
                    ->exists();

            if(!$check_exist)
            {
                $this->id_pegawai = $value->id_pegawai;
                $this->gaji_pokok = $gaji_pokok;
                $this->tunjangan_per_tanggungan = $request['tunjangan_per_tanggungan'];
                $this->tanggungan_keluarga = $tanggungan_keluarga;
                $this->gaji_per_jam_lembur = $request['gaji_per_jam_lembur'];
                $this->jam_lembur = $jam_lembur;
                $this->tgl_dibuat = date('Y-m-d');
                $this->tgl_diupdate = date('Y-m-d');
                $this->save();
            }
        }
    }

    public function getLastRow()
    {        
        return $this->find()
            ->select('tunjangan_per_tanggungan, gaji_per_jam_lembur')
            ->orderBy('tgl_diupdate DESC')
            ->one();
    }
}
