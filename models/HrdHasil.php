<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "hasil_tes".
 *
 * @property integer $id_hasil_tes
 * @property integer $id_materi_tes
 * @property integer $id_jadwal_tes
 * @property integer $id_pelamar
 * @property integer $hasil_tes
 */
class HrdHasil extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hasil_tes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_materi_tes', 'id_jadwal_tes', 'id_pelamar', 'hasil_tes'], 'required'],
            [['id_materi_tes', 'id_jadwal_tes', 'id_pelamar', 'hasil_tes'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
           /* 'id_hasil_tes' => 'Id Hasil Tes',
            'id_materi_tes' => 'Id Materi Tes',
            'id_jadwal_tes' => 'Id Jadwal Tes',
            'id_pelamar' => 'Id Pelamar',
            'hasil_tes' => 'Hasil Tes',*/
        ];
    }
	
	//Hasil
    public function findHasil(){
        $sql = "select 
					d.id_lowongan as id_lowongan, id_hasil_tes, b.materi_tes as materi_tes, a.jadwal_tes as jadwal_tes, c.nama as nama, hasil_tes, e.nama_jabatan as nama_jabatan, f.nama_departement as nama_departement
                from jadwal_tes a, materi_tes b, pelamar c, hasil_tes d, jabatan e, departement f, lowongan g
				where d.id_materi_tes = b.id_materi_tes AND d.id_jadwal_tes = a.id_jadwal_tes AND d.id_pelamar = c.id_calon AND d.id_lowongan = g.id_lowongan AND e.id_jabatan = g.id_jabatan AND f.id_departement = g.id_departement ORDER BY hasil_tes DESC, nama_departement DESC, nama_jabatan DESC";

        return self::findBySql($sql)->asArray()->all();
    }
	
    public function findLowongan(){
        $sql = "select 
					g.id_lowongan as id_lowongan, e.nama_jabatan as nama_jabatan, f.nama_departement as nama_departement
                from jabatan e, departement f, lowongan g
				where e.id_jabatan = g.id_jabatan AND f.id_departement = g.id_departement";

        return self::findBySql($sql)->asArray()->all();
    }
	
	public function saveHasil($data){
		$this->id_materi_tes = $data['id_materi_tes'];
		$this->id_lowongan = $data['id_lowongan'];
		$this->id_jadwal_tes = $data['id_jadwal_tes'];
		$this->id_pelamar = $data['id_pelamar'];
		$this->hasil_tes = $data['hasil_tes'];
		//echo $data['tanggal_diterima'];die;
        $this->save();    	
	}
	
	public function updateHasil($id,$data){
		$this->id_hasil_tes = $id;
		$this->id_materi_tes = $data['id_materi_tes'];
		$this->id_lowongan = $data['id_lowongan'];
		$this->id_jadwal_tes = $data['id_jadwal_tes'];
		$this->id_pelamar = $data['id_pelamar'];
		$this->hasil_tes = $data['hasil_tes'];
		//echo $data['tanggal_diterima'];die;
        $this->save();    	
	}
	
    public function findLolos($jml){ 
		$sql = "SELECT f.id_hasil_tes, e.id_calon, c.nama_departement, d.nama_jabatan, e.nama, f.hasil_tes, g.materi_tes, e.persetujuan_lolos 
				FROM lowongan b, departement c, jabatan d, pelamar e, hasil_tes f, materi_tes g 
				WHERE f.id_lowongan = b.id_lowongan AND b.id_departement = c.id_departement AND b.id_jabatan = d.id_jabatan AND f.id_pelamar = e.id_calon AND f.id_materi_tes = g.id_materi_tes ORDER BY f.hasil_tes DESC LIMIT $jml";

        return self::findBySql($sql)->asArray()->all();
    }
	
    public function findLolosPending($jml){ 
		$sql = "SELECT f.id_hasil_tes, e.id_calon, c.nama_departement, d.nama_jabatan, e.nama, f.hasil_tes, g.materi_tes, e.persetujuan_lolos 
				FROM lowongan b, departement c, jabatan d, pelamar e, hasil_tes f, materi_tes g 
				WHERE f.id_lowongan = b.id_lowongan AND b.id_departement = c.id_departement AND b.id_jabatan = d.id_jabatan AND f.id_pelamar = e.id_calon AND f.id_materi_tes = g.id_materi_tes AND persetujuan_lolos = 0 ORDER BY f.hasil_tes DESC LIMIT $jml";

        return self::findBySql($sql)->asArray()->all();
    }
	
}
