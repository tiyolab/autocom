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
class LgReport extends \yii\db\ActiveRecord
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
            [['barang', 'kendaraan', 'kurir', 'status_approve', 'status_pengiriman', 'ongkir'], 'integer'],
            [['tujuan'], 'string', 'max' => 100]
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
            'tgl_terima' => 'Tgl Terima',
            'barang' => 'Barang',
            'kendaraan' => 'Kendaraan',
            'kurir' => 'Kurir',
            'status_approve' => 'Status Approve',
            'status_pengiriman' => 'Status Pengiriman',
            'ongkir' => 'Ongkir',
        ];
    }

    public function findReport()
    {
        $sql = "select p.kode, p.tgl_pengiriman , p.tgl_terima, k.nomor_polisi, p.kurir, p.status_pengiriman, p.ongkir, b.Nama_Barang, pw.nama_lengkap,
                o.date_order_placed, o.shipping_address, o.shipping_city, o.shipping_province, o.shipping_zip_code, o.shipping_country
                from lg_kendaraan k,lg_pengiriman p,orders o, order_items oi, barang b, pegawai pw
                where p.id_order = o.order_id and o.order_id=oi.order_id and oi.product_id = b.kode_barang and k.kode=p.kendaraan and p.kurir=pw.id_pegawai
                and p.status_approve='1' and p.status_pengiriman='2'";
        $model = self::findBySql($sql)->asArray()->all();
    }


    public function findDetailReport($id)
    {
        $sql = "select p.kode, p.tgl_pengiriman , p.tgl_terima, k.nomor_polisi, p.kurir, p.status_pengiriman, p.ongkir, b.Nama_Barang, pw.nama_lengkap,
                o.date_order_placed, o.shipping_address, o.shipping_city, o.shipping_province, o.shipping_zip_code, o.shipping_country
                from lg_kendaraan k,lg_pengiriman p,orders o, order_items oi, barang b, pegawai pw
                where p.id_order = o.order_id and o.order_id=oi.order_id and oi.product_id = b.kode_barang and k.kode=p.kendaraan and p.kurir=pw.id_pegawai
                and p.status_approve='1' and p.status_pengiriman='2'";
        $model = self::findBySql($sql)->asArray()->all();
    }

    public function search($m)
    {
        $ex = array();
        $explode = explode('-',$m);
        $exploded = explode('/',$explode[0]);
        $ex[0] = trim($exploded[2]);
        $ex[1] = trim($exploded[0]);
        $ex[2] = trim($exploded[1]);
        $mindatee = implode('-', $ex);
        
        $ex1 = array();
        $exploded1 = explode('/',$explode[1]);
        $ex1[0] = trim($exploded1[2]);
        $ex1[1] = trim($exploded1[0]);
        $ex1[2] = trim($exploded1[1]);
        $maxdatee = implode('-', $ex1); 
        
        $sql = "select p.kode, p.tgl_pengiriman , p.tgl_terima, k.nomor_polisi, p.kurir, p.status_pengiriman, p.ongkir, b.Nama_Barang, pw.nama_lengkap,
                o.date_order_placed, o.shipping_address, o.shipping_city, o.shipping_province, o.shipping_zip_code, o.shipping_country
                from lg_kendaraan k,lg_pengiriman p,orders o, order_items oi, barang b, pegawai pw
                where p.id_order = o.order_id and o.order_id=oi.order_id and oi.product_id = b.kode_barang and k.kode=p.kendaraan and p.kurir=pw.id_pegawai
                and p.status_approve='1' and p.status_pengiriman='2' and p.tgl_terima >='$mindatee' AND p.tgl_terima<='$maxdatee'";
       return self::findBySql($sql)->asArray()->all();
       //return $maxdatee;
    }

}
