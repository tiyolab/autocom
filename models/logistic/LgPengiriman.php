<?php

namespace app\models\logistic;

use Yii;

/**
 * This is the model class for table "lg_pengiriman".
 *
 * @property integer $kode
 * @property string $tgl_order
 * @property string $tgl_pengiriman
 * @property string $tgl_terima
 * @property string $tujuan
 * @property integer $barang
 * @property integer $kendaraan
 * @property integer $kurir
 * @property integer $status_approve
 * @property integer $status_pengiriman
 * @property integer $ongkir
 */
class LgPengiriman extends \yii\db\ActiveRecord
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
            [['id_order', 'tgl_pengiriman', 'tgl_terima', 'barang', 'kendaraan', 'kurir', 'status_approve', 'status_pengiriman', 'ongkir'], 'required'],
            [['id_order', 'tgl_pengiriman', 'tgl_terima'], 'safe'],
            [['kendaraan', 'kurir', 'status_approve', 'status_pengiriman', 'ongkir'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    

    public function attributeLabels()
    {
        return [
            'kode' => 'Kode',
            'tgl_pengiriman' => 'Tgl Pengiriman',
            'tgl_terima' => 'Tgl Terima',
            'kendaraan' => 'Kendaraan',
            'kurir' => 'Kurir',
            'status_approve' => 'Status Approve',
            'status_pengiriman' => 'Status Pengiriman',
            'ongkir' => 'Ongkir',
        ];
    }

    public function findPengiriman()
    {
        $sql = "select p.kode, p.tgl_pengiriman , p.tgl_terima, k.nomor_polisi, p.kurir, p.status_approve, p.status_pengiriman, p.ongkir, GROUP_CONCAT( b.Nama_Barang ) as barang, pw.nama_lengkap,
                o.date_order_placed, o.shipping_address, o.shipping_city, o.shipping_province, o.shipping_zip_code, o.shipping_country
                from lg_kendaraan k,lg_pengiriman p,orders o, order_items oi, barang b, pegawai pw
                where p.id_order = o.order_id and o.order_id=oi.order_id and oi.product_id = b.kode_barang and k.kode=p.kendaraan and p.kurir=pw.id_pegawai group by p.kode";
        return $model = self::findBySql($sql)->asArray()->all();
    }


    public function findDetailPengiriman($id)
    {
        $sql = "select p.kode, p.tgl_pengiriman , p.tgl_terima, k.nomor_polisi, p.kurir, p.status_approve, p.status_pengiriman, p.ongkir, GROUP_CONCAT( b.Nama_Barang ) as barang, pw.nama_lengkap,
                o.date_order_placed, o.shipping_address, o.shipping_city, o.shipping_province, o.shipping_zip_code, o.shipping_country
                from lg_kendaraan k,lg_pengiriman p,orders o, order_items oi, barang b, pegawai pw
                where p.kode='$id' and p.id_order = o.order_id and o.order_id=oi.order_id and oi.product_id = b.kode_barang and k.kode=p.kendaraan and p.kurir=pw.id_pegawai group by p.kode";
        return $model = self::findBySql($sql)->asArray()->all();
    }

    public function findPengirimanpdf($id)
    {
        $sql = "select b.Kode_Barang, b.Nama_Barang,oi.order_item_quantity,k.nama,k.berat
                from lg_kendaraan kn,lg_pengiriman p,orders o, order_items oi, barang b, kemasan k
                where p.kode='$id' and p.id_order = o.order_id and o.order_id=oi.order_id and oi.product_id = b.kode_barang and b.Kemasan_ID=k.Kemasan_ID group by b.kode_barang";
        return $model = self::findBySql($sql)->asArray()->all();
    }

    public function findHeaderpdf($id)
    {
        $sql = "select p.surat_jalan, p.tgl_pengiriman, c.first_name, c.middle_name, c.last_name, c.phone_number,
                o.date_order_placed, o.shipping_address, o.shipping_city, o.shipping_province, o.shipping_zip_code, o.shipping_country
                from lg_pengiriman p,orders o, customers c
                where p.kode='$id' and p.id_order = o.order_id and o.customers_id=c.customers_id group by p.kode";
        return $model = self::findBySql($sql)->asArray()->all();
    }

}
