<?php

namespace app\models\warehouse;

use Yii;

class Report extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $date;

    public static function tableName()
    {
        return 'bab_masuk';
    }

    public function rules()
    {
        return [
            [['date'],'required'],
            [['date'],'safe'],
            ['date','date','format'=>'yyyy-M-d H:m:s'],
        ];
    }

    public function findReportBarangMasuk()
    {
        $sql="SELECT M.No_Faktur, M.No_Surat_Jalan, M.ID_PO, B.Nama_Barang, PO.Jumlah, PO.Tanggal_Order, M.Tanggal_Terima, PO.Status
                FROM bab_masuk M, purchaseorder PO, barang b
                WHERE M.ID_PO = PO.ID_PO AND PO.Status='Accepted' AND PO.Kode_Barang = b.Kode_Barang";
        return self::findBySql($sql)->asArray()->all();
    }

    public function findReportBarangKeluar()
    {
        $sql = "SELECT ID_Bab_Keluar, No_Surat_Jalan, K.ID_SO, Tanggal_Surat, Tanggal_Keluar, Kondisi, b.Nama_Barang, Jumlah, Tanggal_Order, SO.Status
                FROM bab_keluar K, salesorder SO, barang b
                WHERE K.ID_SO = SO.ID_SO AND SO.Status='Accepted' AND SO.Kode_Barang = b.Kode_Barang";
        return self::findBySql($sql)->asArray()->all();
    }

    public function findReportBarangKembali()
    {
        $sql = "SELECT ID_Bab, No_Faktur, No_Surat_Jalan, PO.ID_PO, Tanggal_Surat, Tanggal_Terima, Kondisi, b.Nama_Barang, Jumlah, Tanggal_Order, PO.Status
            FROM ba_pengembalian BAP, purchaseorder PO, barang b
            WHERE BAP.ID_PO = PO.ID_PO AND PO.Kode_Barang = b.Kode_Barang";
        return self::findBySql($sql)->asArray()->all();
    }

    public function searchMasuk($m)
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
        
        $sql="SELECT M.No_Faktur, M.No_Surat_Jalan, M.ID_PO, b.Nama_Barang, PO.Jumlah, PO.Tanggal_Order, M.Tanggal_Terima, PO.Status
                FROM bab_masuk M, purchaseorder PO, barang b
                WHERE M.ID_PO = PO.ID_PO AND PO.Status='Accepted' AND PO.Kode_Barang = b.Kode_Barang AND M.Tanggal_Terima >='$mindatee' AND M.Tanggal_Terima<='$maxdatee'";
        return self::findBySql($sql)->asArray()->all();
       print_r($result);
       die;
    }


    public function pdfMasuk($m)
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
        
        $sql="SELECT M.No_Faktur, M.No_Surat_Jalan, M.ID_PO, b.Nama_Barang, PO.Jumlah, PO.Tanggal_Order, M.Tanggal_Terima, PO.Status
                FROM bab_masuk M, purchaseorder PO, barang b
                WHERE M.ID_PO = PO.ID_PO AND PO.Status='Accepted' AND PO.Kode_Barang = b.Kode_Barang AND M.Tanggal_Terima >='$mindatee' AND M.Tanggal_Terima<='$maxdatee'";
        return self::findBySql($sql)->asArray()->all();
       print_r($result);
       die;
    }

    public function searchKeluar($m)
    {
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
        
        $sql = "SELECT ID_Bab_Keluar, No_Surat_Jalan, K.ID_SO, Tanggal_Surat, Tanggal_Keluar, Kondisi, b.Nama_Barang, Jumlah, Tanggal_Order, SO.Status
                FROM bab_keluar K, salesorder SO, barang b
                WHERE K.ID_SO = SO.ID_SO AND SO.Status='Accepted' AND SO.Kode_Barang = b.Kode_Barang AND K.Tanggal_Keluar >='$mindatee' AND K.Tanggal_Keluar<='$maxdatee'";
        return self::findBySql($sql)->asArray()->all();
    }

    public function searchKembali($m)
    {
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
        
        $sql="SELECT ID_Bab, No_Faktur, No_Surat_Jalan, PO.ID_PO, Tanggal_Surat, Tanggal_Terima, Kondisi, b.Nama_Barang, Jumlah, Tanggal_Order, SO.Status
            FROM ba_pengembalian BAP, purchaseorder PO, barang b
            WHERE BAP.ID_PO = PO.ID_PO AND PO.Kode_Barang = b.Kode_Barang AND Tanggal_Terima >='$mindatee' AND Tanggal_Terima<='$maxdatee'";
        return self::findBySql($sql)->asArray()->all();
    }

}
