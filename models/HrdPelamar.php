<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pelamar".
 *
 * @property integer $id_calon
 * @property integer $id_lowongan
 * @property string $nama
 * @property string $tempat_lahir
 * @property string $tgl_lahir
 * @property string $pend
 * @property string $alamat
 * @property integer $hp
 * @property string $email
 * @property string $perkawinan
 * @property integer $pasfoto
 * @property integer $surat_lamaran
 * @property integer $ft_riwayat
 * @property integer $ft_sertifikat
 * @property integer $ft_ktp
 * @property integer $ft_transkrip
 * @property integer $skck
 * @property integer $surat_sehat
 * @property string $tgl_daftar
 */
class HrdPelamar extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pelamar';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            /*[['id_lowongan', 'nama', 'tempat_lahir', 'tgl_lahir', 'pend', 'alamat', 'hp', 'email', 'perkawinan', 'pasfoto', 'surat_lamaran', 'ft_riwayat', 'ft_sertifikat', 'ft_ktp', 'ft_transkrip', 'skck', 'surat_sehat', 'tgl_daftar'], 'required'],
            [['id_lowongan', 'hp', 'pasfoto', 'surat_lamaran', 'ft_riwayat', 'ft_sertifikat', 'ft_ktp', 'ft_transkrip', 'skck', 'surat_sehat'], 'integer'],
            [['tgl_lahir', 'tgl_daftar'], 'safe'],
            [['nama', 'pend', 'alamat'], 'string', 'max' => 100],
            [['tempat_lahir', 'email'], 'string', 'max' => 32],
            [['perkawinan'], 'string', 'max' => 10]*/
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_calon' => 'Id Calon',
            'id_lowongan' => 'Id Lowongan',
            'nama' => 'Nama',
            'tempat_lahir' => 'Tempat Lahir',
            'tgl_lahir' => 'Tgl Lahir',
            'pend' => 'Pend',
            'alamat' => 'Alamat',
            'hp' => 'Hp',
            'email' => 'Email',
            'perkawinan' => 'Perkawinan',
            'pasfoto' => 'Pasfoto',
            'surat_lamaran' => 'Surat Lamaran',
            'ft_riwayat' => 'Ft Riwayat',
            'ft_sertifikat' => 'Ft Sertifikat',
            'ft_ktp' => 'Ft Ktp',
            'ft_transkrip' => 'Ft Transkrip',
            'skck' => 'Skck',
            'surat_sehat' => 'Surat Sehat',
            'tgl_daftar' => 'Tgl Daftar',
        ];
    }
	
	//Pelamar
    public function findPelamar(){
        $sql = "select 
					id_calon, b.nama_departement as nama_departement, c.nama_jabatan as jabatan, nama, hp, email, tgl_daftar
                from lowongan a, departement b, jabatan c, pelamar d
                where a.id_departement = b.id_departement AND a.id_jabatan = c.id_jabatan AND d.id_lowongan = a.id_lowongan";

        return self::findBySql($sql)->asArray()->all();
    }
    public function findPelamarDetail($id){
		$sql = "SELECT 
				d.id_calon, b.nama_departement as nama_departement, c.nama_jabatan as jabatan, d.nama, d.hp, d.email, d.tgl_daftar, d.tgl_lahir, d.tempat_lahir, d.pend, d.alamat, d.email, d.perkawinan, d.pasfoto, d.surat_lamaran, d.ft_riwayat, d.ft_sertifikat, d.ft_ktp, d.ft_transkrip, d.skck, d.surat_sehat, d.tgl_daftar 
				FROM lowongan a, departement b, jabatan c, pelamar d 
				WHERE a.id_departement = b.id_departement AND a.id_jabatan = c.id_jabatan AND d.id_lowongan = a.id_lowongan AND d.id_calon = '$id'";
        return self::findBySql($sql)->asArray()->all();
	}
	
	public function savePelamar($data){
		$this->nama = $data['nama'];
		$this->tempat_lahir = $data['tempat_lahir'];
		$this->tgl_lahir = $data['tgl_lahir'];
		$this->pend = $data['pend'];
		$this->alamat = $data['alamat'];
		$this->hp = $data['hp'];
		$this->email = $data['email'];
		$this->id_lowongan = $data['id_lowongan'];
		$this->perkawinan = $data['perkawinan'];
		$this->pasfoto = $data['pasfoto'];
		$this->surat_lamaran = $data['surat_lamaran'];
		$this->ft_riwayat = $data['ft_riwayat'];
		$this->ft_sertifikat = $data['ft_sertifikat'];
		$this->ft_ktp = $data['ft_ktp'];
		$this->ft_transkrip = $data['ft_transkrip'];
		$this->skck = $data['skck'];
		$this->surat_sehat = $data['surat_sehat'];
		$this->tgl_daftar = $data['tgl_daftar'];
		//echo $data['tanggal_diterima'];die;
        $this->save();    	
	}
	
	public function updatePelamar($id,$data){
		$this->id_calon = $id;
		$this->nama = $data['nama'];
		$this->tempat_lahir = $data['tempat_lahir'];
		$this->tgl_lahir = $data['tgl_lahir'];
		$this->pend = $data['pend'];
		$this->alamat = $data['alamat'];
		$this->hp = $data['hp'];
		$this->email = $data['email'];
		$this->id_lowongan = $data['id_lowongan'];
		$this->perkawinan = $data['perkawinan'];
		$this->pasfoto = $data['pasfoto'];
		$this->surat_lamaran = $data['surat_lamaran'];
		$this->ft_riwayat = $data['ft_riwayat'];
		$this->ft_sertifikat = $data['ft_sertifikat'];
		$this->ft_ktp = $data['ft_ktp'];
		$this->ft_transkrip = $data['ft_transkrip'];
		$this->skck = $data['skck'];
		$this->surat_sehat = $data['surat_sehat'];
		$this->tgl_daftar = $data['tgl_daftar'];
		//echo $data['tanggal_diterima'];die;
        $this->save();    	
	}
	
}
