<?php

namespace app\models\logistic;

use Yii;

/**
 * This is the model class for table "lg_kendaraan".
 *
 * @property integer $kode
 * @property string $nomor_polisi
 * @property integer $tahun_pembelian
 * @property integer $jenis_transportasi
 * @property integer $penanggung_jawab
 * @property string $bahan_bakar
 * @property integer $berat_muatan
 * @property integer $status_pemakaian
 */
class LgKendaraan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lg_kendaraan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nomor_polisi', 'tahun_pembelian', 'jenis_transportasi', 'penanggung_jawab', 'bahan_bakar', 'berat_muatan'], 'required'],
            [['tahun_pembelian', 'jenis_transportasi', 'penanggung_jawab', 'berat_muatan', 'status_pemakaian'], 'integer'],
            [['nomor_polisi'], 'string', 'max' => 10],
            [['bahan_bakar'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'kode' => 'Kode',
            'nomor_polisi' => 'Nomor Polisi',
            'tahun_pembelian' => 'Tahun Pembelian',
            'jenis_transportasi' => 'Jenis Transportasi',
            'penanggung_jawab' => 'Penanggung Jawab',
            'bahan_bakar' => 'Bahan Bakar',
            'berat_muatan' => 'Berat Muatan (Kg)',
        ];
    }
    
    public function findKendaraan(){
        $sql="select b.kode,b.nomor_polisi,b.tahun_pembelian,c.kode as kode_kendaraan,c.jenis_kendaraan as jenis_transportasi,a.id_pegawai,a.nama_lengkap as penanggung_jawab,b.bahan_bakar,b.berat_muatan,b.status_pemakaian from lg_kendaraan b,pegawai a,lg_jenis_kendaraan c where b.penanggung_jawab=a.id_pegawai AND b.jenis_transportasi=c.kode";
        
        return self::findBySql($sql)->asArray()->all();
    }
    
    public function findDetailKendaraan($id){
        $sql="select b.kode,b.nomor_polisi,b.tahun_pembelian,c.kode as kode_kendaraan,c.jenis_kendaraan as jenis_transportasi,a.id_pegawai,a.nama_lengkap as penanggung_jawab,b.bahan_bakar,b.berat_muatan,b.status_pemakaian from lg_kendaraan b,pegawai a,lg_jenis_kendaraan c where b.kode='$id' AND b.penanggung_jawab=a.id_pegawai AND b.jenis_transportasi=c.kode";
        
        return self::findBySql($sql)->asArray()->all();
    }

}
