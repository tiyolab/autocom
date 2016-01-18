<?php

namespace app\models\logistic;

use Yii;

/**
 * This is the model class for table "lg_pengiriman".
 *
 * @property integer $kode
 * @property string $tgl_pengiriman
 * @property string $tgl_terima
 * @property integer $kendaraan
 * @property integer $kurir
 * @property integer $status_approve
 * @property integer $status_pengiriman
 * @property integer $ongkir
 */
class LgPenjadwalan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lg_pengiriman';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
             [['id_order', 'tgl_pengiriman', 'kendaraan', 'kurir'], 'required'],
             [['id_order', 'tgl_pengiriman'], 'safe'],
             [['kendaraan', 'kurir'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    

    public function attributeLabels()
    {
        return [
            'kode' => 'Kode',
            'id_order' => 'id Order',
            'tgl_pengiriman' => 'Tgl Pengiriman',
        //    'tgl_terima' => 'Tgl Terima',
            'kendaraan' => 'Kendaraan',
            'kurir' => 'Kurir',
        //    'status_approve' => 'Status Approve',
        //    'status_pengiriman' => 'Status Pengiriman',
        //    'ongkir' => 'Ongkir',
        ];
    }

    public function findPenjadwalan()
    {
         $sql = "select p.kode, p.tgl_pengiriman , p.tgl_terima, k.nomor_polisi, p.kurir, p.status_pengiriman, p.ongkir, b.Nama_Barang, pw.nama_lengkap,
                o.date_order_placed, o.shipping_address, o.shipping_city, o.shipping_province, o.shipping_zip_code, o.shipping_country
                from lg_kendaraan k,lg_pengiriman p,orders o, order_items oi, barang b, pegawai pw
                where p.id_order = o.order_id and o.order_id=oi.order_id and p.kurir='0' and p.kendaraan='0' group by kode";
        return $model = self::findBySql($sql)->asArray()->all();
    }


    public function findDetailPenjadwalan($id)
    {
        $sql = "select p.kode, p.tgl_pengiriman , p.tgl_terima, k.nomor_polisi, p.kurir, p.status_pengiriman, p.ongkir, b.Nama_Barang, pw.nama_lengkap,
                o.date_order_placed, o.shipping_address, o.shipping_city, o.shipping_province, o.shipping_zip_code, o.shipping_country
                from lg_kendaraan k,lg_pengiriman p,orders o, order_items oi, barang b, pegawai pw
                where p.kode='$id' and p.id_order = o.order_id and o.order_id=oi.order_id and p.kurir='0' and p.kendaraan='0' group by kode";
        return $model = self::findBySql($sql)->asArray()->all();
    }

}
