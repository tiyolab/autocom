<?php

namespace app\models\logistic;

use Yii;


/**
 * This is the model class for table "lg_pengiriman".
 *
 * @property integer $kode
 * @property integer $id_order
 * @property string $tgl_pengiriman
 * @property string $tgl_terima
 * @property integer $kendaraan
 * @property integer $kurir
 * @property integer $status_approve
 * @property integer $status_pengiriman
 * @property integer $ongkir
 */
class LgApprove extends \yii\db\ActiveRecord
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
            [['id_order', 'tgl_pengiriman', 'tgl_terima', 'kendaraan', 'kurir', 'status_approve', 'status_pengiriman', 'ongkir'], 'required'],
            [['id_order', 'kendaraan', 'kurir', 'status_approve', 'status_pengiriman', 'ongkir'], 'integer'],
            [['tgl_pengiriman', 'tgl_terima'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'kode' => 'Kode',
            'id_order' => 'Id Order',
            'tgl_pengiriman' => 'Tgl Pengiriman',
            'tgl_terima' => 'Tgl Terima',
            'kendaraan' => 'Kendaraan',
            'kurir' => 'Kurir',
            'status_approve' => 'Status Approve',
            'status_pengiriman' => 'Status Pengiriman',
            'ongkir' => 'Ongkir',
        ];
    }
    public function findApprove($id)
    {
        $sql = "select p.kode, p.tgl_pengiriman , p.tgl_terima, k.nomor_polisi, p.kurir, pw.nama_lengkap as namakurir, p.status_pengiriman, p.ongkir, GROUP_CONCAT( b.Nama_Barang ) as barang, pw.nama_lengkap,
                o.date_order_placed, o.shipping_address, o.shipping_city, o.shipping_province, o.shipping_zip_code, o.shipping_country
                from lg_kendaraan k,lg_pengiriman p,orders o, order_items oi, barang b, pegawai pw
                where p.id_order = o.order_id and o.order_id=oi.order_id and oi.product_id = b.kode_barang and k.kode=p.kendaraan and p.kurir=pw.id_pegawai and p.status_approve='0'
                and p.kurir != 0 and p.status_approve = '0' and p.kendaraan != '0' and p.kode='$id' group by p.kode";
        return $model = self::findBySql($sql)->asArray()->all();
    }

    public function findApprovebyKendaraan($id)
    {
        $sql = "select p.kode, p.tgl_pengiriman , p.tgl_terima, k.nomor_polisi, p.kurir, pw.nama_lengkap as namakurir, p.status_pengiriman, p.ongkir, GROUP_CONCAT( b.Nama_Barang ) as barang, pw.nama_lengkap,
                o.date_order_placed, o.shipping_address, o.shipping_city, o.shipping_province, o.shipping_zip_code, o.shipping_country
                from lg_kendaraan k,lg_pengiriman p,orders o, order_items oi, barang b, pegawai pw
                where p.id_order = o.order_id and o.order_id=oi.order_id and oi.product_id = b.kode_barang and k.kode=p.kendaraan and p.kurir=pw.id_pegawai and p.status_approve='0'
                and p.kurir != 0 and p.status_approve = '0' and p.kendaraan = '$id' group by p.kode";
        return $model = self::findBySql($sql)->asArray()->all();
    }

    public function findKendaraan()
    {
        $sql = "select k.nomor_polisi,p.kendaraan as kode,COUNT(p.kendaraan) AS count_kendaraan from lg_kendaraan k,lg_pengiriman p where p.kendaraan=k.kode GROUP BY p.kendaraan";
        return $model = self::findBySql($sql)->asArray()->all();
    }

    /*public function approve($id){
        Yii::$app->db->createCommand("Update lg_pengiriman SET status_approve=1 and status_pengiriman=1 WHERE kendaraan=:id and status_approve=0")->bindValue(':id',$id)->execute();
    }*/
}
