<?php

namespace app\models\logistic;

use Yii;

/**
 * This is the model class for table "pegawai".
 *
 * @property integer $id_pegawai
 * @property string $nama_lengkap
 * @property string $gelar_dpn
 * @property string $gelar_blk
 * @property string $agama
 * @property string $sex
 * @property string $gol_dar
 * @property integer $tinggi
 * @property integer $berat
 * @property string $status_nikah
 * @property string $alamat
 * @property string $email
 * @property string $nomor_telepon
 * @property integer $id_departement
 * @property integer $id_jabatan
 * @property integer $id_tingkatan
 * @property integer $id_manager
 * @property integer $id_prestasi
 * @property integer $id_gaji
 * @property string $pendidikan_terakhir
 * @property string $tanggal_diterima
 */
class Pegawai extends \yii\db\ActiveRecord
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
        return [
            [['nama_lengkap', 'gelar_dpn', 'gelar_blk', 'agama', 'sex', 'gol_dar', 'tinggi', 'berat', 'status_nikah', 'alamat', 'email', 'nomor_telepon', 'id_jabatan', 'id_tingkatan', 'id_prestasi', 'id_gaji', 'pendidikan_terakhir', 'tanggal_diterima'], 'required'],
            [['tinggi', 'berat', 'id_departement', 'id_jabatan', 'id_tingkatan', 'id_manager', 'id_prestasi', 'id_gaji'], 'integer'],
            [['tanggal_diterima'], 'safe'],
            [['nama_lengkap', 'gelar_dpn', 'gelar_blk', 'agama', 'sex', 'gol_dar', 'status_nikah', 'email', 'nomor_telepon', 'pendidikan_terakhir'], 'string', 'max' => 100],
            [['alamat'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_pegawai' => 'Id Pegawai',
            'nama_lengkap' => 'Nama Lengkap',
            'gelar_dpn' => 'Gelar Dpn',
            'gelar_blk' => 'Gelar Blk',
            'agama' => 'Agama',
            'sex' => 'Sex',
            'gol_dar' => 'Gol Dar',
            'tinggi' => 'Tinggi',
            'berat' => 'Berat',
            'status_nikah' => 'Status Nikah',
            'alamat' => 'Alamat',
            'email' => 'Email',
            'nomor_telepon' => 'Nomor Telepon',
            'id_departement' => 'Id Departement',
            'id_jabatan' => 'Id Jabatan',
            'id_tingkatan' => 'Id Tingkatan',
            'id_manager' => 'Id Manager',
            'id_prestasi' => 'Id Prestasi',
            'id_gaji' => 'Id Gaji',
            'pendidikan_terakhir' => 'Pendidikan Terakhir',
            'tanggal_diterima' => 'Tanggal Diterima',
        ];
    }
}
