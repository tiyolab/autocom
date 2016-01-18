<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "surat".
 *
 * @property string $nomor_surat
 * @property integer $id_jenis_surat
 * @property integer $id_pengirim
 * @property integer $id_penerima
 * @property string $tanggal_surat
 * @property string $perihal
 * @property string $isi_surat
 */
class Surat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'surat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nomor_surat', 'id_jenis_surat', 'id_pengirim', 'tanggal_surat', 'perihal', 'isi_surat', 'id_penerima'], 'required'],
            [['id_jenis_surat', 'id_pengirim', 'id_penerima'], 'integer'],
            [['tanggal_surat'], 'safe'],
            [['isi_surat'], 'string'],
            [['nomor_surat'], 'string', 'max' => 30],
            [['perihal'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'nomor_surat' => 'Nomor Surat',
            'id_jenis_surat' => 'Jenis Surat',
            'id_pengirim' => 'Pengirim',
            'id_penerima' => 'Penerima Surat',
            'tanggal_surat' => 'Tanggal Surat',
            'perihal' => 'Perihal',
            'isi_surat' => 'Isi Surat',
        ];
    }

    public function showsuratmasuk($id){
        //$sql = "select nomor_surat, id_jenis_surat, id_pengirim, tanggal_surat, LEFT(perihal,25) as perihal, LEFT(isi_surat,25) as isi_surat from surat";
        $sql = "SELECT s.nomor_surat, j.nama_jenis_surat, u.username as pengirim, tanggal_surat, perihal
                FROM surat s, user u, jenis_surat j
                WHERE s.id_jenis_surat = j.id_jenis_surat and s.id_penerima  =  ". $id ." and s.id_pengirim = u.id and persetujuan = 1";

        return self::findBySql($sql)->asArray()->all();
    }

    public function showsuratkeluar($id){
        $sql = "SELECT s.nomor_surat, j.nama_jenis_surat, u.username as penerima, tanggal_surat, perihal
                FROM surat s, user u, jenis_surat j
                WHERE s.id_jenis_surat = j.id_jenis_surat and s.id_pengirim  =  ". $id ." and s.id_penerima = u.id and persetujuan = 1";

        return self::findBySql($sql)->asArray()->all();
    }

    public function showjenissurat(){
        $sql = "select * from jenis_surat";
        return self::findBySql($sql)->asArray()->all();
    }

    public function insertSurat($data){
        $this->nomor_surat = $data['nomor_surat'];
        $this->id_jenis_surat = $data['id_jenis_surat'];
        $this->id_pengirim = $data['id_pengirim'];
        $this->id_penerima = $data['id_penerima'];
        $this->tanggal_surat = $data['tanggal_surat'];
        $this->perihal = $data['perihal'];
        $this->isi_surat = $data['isi_surat'];
        $this->save();
        return true;
    }

    public function detailSurat($id){
        $sql = "select * from surat where nomor_surat = '". $id."' ";
        return self::findBySql($sql)->asArray()->all();
    }

    public function showsuratsetuju(){
        $sql = "SELECT a.nomor_surat, j.nama_jenis_surat as jenis_surat, b.username as pengirim, c.username as penerima, a.tanggal_surat, a.perihal, a.isi_surat
                FROM surat a, user b, user c, jenis_surat j
                WHERE a.id_pengirim = b.id and a.id_penerima = c.id and a.id_jenis_surat = j.id_jenis_surat and persetujuan = 0";
        return self::findBySql($sql)->asArray()->all();
    }

    public function setujuisurat($id){
        $sql = "update surat set persetujuan = 1 where nomor_surat = '". $id."' ";
        return Yii::$app->db->createCommand($sql)->bindValue('nomor_surat', $id)->execute();
    }
}
