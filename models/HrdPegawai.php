<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pegawai".
 *
 * @property integer $id_pegawai
 * @property integer $nip
 * @property string $nama_lengkap
 * @property string $gelar_dpn
 * @property string $gelar_blk
 * @property string $agama
 * @property string $sex
 * @property string $gol_dar
 * @property integer $tinggi
 * @property integer $berat
 * @property string $status_nikah
 * @property integer $jml_tanggungan
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
class HrdPegawai extends \yii\db\ActiveRecord
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
            /*[['nip', 'nama_lengkap', 'gelar_dpn', 'gelar_blk', 'agama', 'sex', 'gol_dar', 'tinggi', 'berat', 'status_nikah', 'jml_tanggungan', 'alamat', 'email', 'nomor_telepon', 'id_jabatan', 'id_tingkatan', 'id_prestasi', 'id_gaji', 'pendidikan_terakhir', 'tanggal_diterima'], 'required'],
            [['nip', 'tinggi', 'berat', 'jml_tanggungan', 'id_departement', 'id_jabatan', 'id_tingkatan', 'id_manager', 'id_prestasi', 'id_gaji'], 'integer'],
            [['tanggal_diterima'], 'safe'],
            [['nama_lengkap', 'gelar_dpn', 'gelar_blk', 'agama', 'sex', 'gol_dar', 'status_nikah', 'email', 'nomor_telepon', 'pendidikan_terakhir'], 'string', 'max' => 100],
            [['alamat'], 'string', 'max' => 200]*/
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_pegawai' => 'Id Pegawai',
            'nip' => 'Nip',
            'nama_lengkap' => 'Nama Lengkap',
            'gelar_dpn' => 'Gelar Dpn',
            'gelar_blk' => 'Gelar Blk',
            'agama' => 'Agama',
            'sex' => 'Sex',
            'gol_dar' => 'Gol Dar',
            'tinggi' => 'Tinggi',
            'berat' => 'Berat',
            'status_nikah' => 'Status Nikah',
            'jml_tanggungan' => 'Jml Tanggungan',
            'alamat' => 'Alamat',
            'email' => 'Email',
            'nomor_telepon' => 'Nomor Telepon',
            'id_departement' => 'Id Departement',
            'id_jabatan' => 'Id Jabatan',
            'id_tingkatan' => 'Id Tingkatan',
            'id_prestasi' => 'Id Prestasi',
            'id_gaji' => 'Id Gaji',
            'pendidikan_terakhir' => 'Pendidikan Terakhir',
            'tanggal_diterima' => 'Tanggal Diterima',
        ];
    }
	
	//pegawai
    public function findPegawai(){
        $sql = "select 
					a.id_pegawai as id_pegawai, nama_lengkap, nip, agama, sex, email, b.nama_jabatan as jabatan, c.tingkatan as tingkatan
                from pegawai a, jabatan b, tingkatan c
                where a.id_jabatan = b.id_jabatan AND a.id_tingkatan = c.id_tingkatan";

        return self::findBySql($sql)->asArray()->all();
    }

    public function findPegawaiWithDetail($id){
        $sql = "SELECT  
					a.nip, a.nama_lengkap, a.gelar_dpn, a.gelar_blk, a.agama, a.sex, a.gol_dar, a.tinggi, a.berat, a.status_nikah, a.alamat, a.email, a.nomor_telepon, b.nama_departement, c.nama_jabatan, d.tingkatan, f.gaji, a.pendidikan_terakhir, a.tanggal_diterima
				FROM pegawai a, departement b, jabatan c, tingkatan d, pegawai e, gaji f
				WHERE a.id_departement=b.id_departement AND a.id_jabatan=c.id_jabatan AND a.id_tingkatan=d.id_tingkatan AND a.id_gaji=f.id_gaji AND a.id_pegawai='$id'";

        return self::findBySql($sql)->asArray()->all();
    }
	
	//posisi
    public function findPosisi(){
        $sql = "select 
					nama_lengkap, nip, b.nama_jabatan as jabatan, c.tingkatan as tingkatan, d.nama_departement as departement
                from pegawai a, jabatan b, tingkatan c, departement d
                where a.id_jabatan = b.id_jabatan AND a.id_tingkatan = c.id_tingkatan AND a.id_departement = d.id_departement";

        return self::findBySql($sql)->asArray()->all();
    } 
	
	public function saveProfil($data){
		$this->nip = $data['nip'];
		$this->nama_lengkap = $data['nama_lengkap'];
		$this->gelar_dpn = $data['gelar_dpn'];
		$this->gelar_blk = $data['gelar_blk'];
		$this->agama = $data['agama'];
		$this->sex = $data['sex'];
		$this->gol_dar = $data['gol_dar'];
		$this->tinggi = $data['tinggi'];
		$this->berat = $data['berat'];
		$this->status_nikah = $data['status_nikah'];
		$this->alamat = $data['alamat'];
		$this->email = $data['email'];
		$this->nomor_telepon = $data['nomor_telepon'];
		$this->jml_tanggungan = $data['jml_tanggungan'];
		$this->pendidikan_terakhir = $data['pendidikan_terakhir'];
		$this->tanggal_diterima = $data['tanggal_diterima'];
		$this->id_departement = $data['id_departement'];
		$this->id_jabatan = $data['id_jabatan'];
		$this->id_tingkatan = $data['id_tingkatan'];
		$this->id_gaji = $data['id_gaji'];
		//echo $data['tanggal_diterima'];die;
        $this->save();    	
	}
	
	public function updateProfil($id,$data){
		$this->id_pegawai = $id;
		$this->nip = $data['nip'];
		$this->nama_lengkap = $data['nama_lengkap'];
		$this->gelar_dpn = $data['gelar_dpn'];
		$this->gelar_blk = $data['gelar_blk'];
		$this->agama = $data['agama'];
		$this->sex = $data['sex'];
		$this->gol_dar = $data['gol_dar'];
		$this->tinggi = $data['tinggi'];
		$this->berat = $data['berat'];
		$this->status_nikah = $data['status_nikah'];
		$this->alamat = $data['alamat'];
		$this->email = $data['email'];
		$this->nomor_telepon = $data['nomor_telepon'];
		$this->jml_tanggungan = $data['jml_tanggungan'];
		$this->pendidikan_terakhir = $data['pendidikan_terakhir'];
		$this->tanggal_diterima = $data['tanggal_diterima'];
		$this->id_departement = $data['id_departement'];
		$this->id_jabatan = $data['id_jabatan'];
		$this->id_tingkatan = $data['id_tingkatan'];
		$this->id_gaji = $data['id_gaji'];
		//echo $data['tanggal_diterima'];die;
        $this->save();    	
	}
	
	public function findJabatan(){
        $sql = "select *
                from jabatan ";

        return self::findBySql($sql)->asArray()->all();		
	}
	
	public function findTingkatan(){
        $sql = "select *
                from tingkatan ";

        return self::findBySql($sql)->asArray()->all();		
	}
	
	public function findPegawaiNama(){
        $sql = "select *
                from Pegawai ";

        return self::findBySql($sql)->asArray()->all();		
	}
	
	public function findGaji(){
        $sql = "select *
                from Gaji ";

        return self::findBySql($sql)->asArray()->all();		
	}
	
	public function findDepartement(){
        $sql = "select *
                from Departement ";

        return self::findBySql($sql)->asArray()->all();		
	}
	
	public function findAbsenId(){
        $sql = "select id_absen, b.nip,b.nama_lengkap
                from Absensi a, pegawai b
				where a.id_pegawai = b.id_pegawai";

        return self::findBySql($sql)->asArray()->all();		
	}
	
}
