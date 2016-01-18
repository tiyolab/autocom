<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lolos_tes".
 *
 * @property integer $id_lolos
 * @property integer $id_pelamar
 * @property integer $id_hasil_tes
 * @property integer $persetujuan_lolos
 */
class HrdLolos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lolos_tes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pelamar', 'id_hasil_tes', 'persetujuan_lolos'], 'required'],
            [['id_pelamar', 'id_hasil_tes', 'persetujuan_lolos'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_lolos' => 'Id Lolos',
            'id_pelamar' => 'Id Pelamar',
            'id_hasil_tes' => 'Id Hasil Tes',
            'persetujuan_lolos' => 'Persetujuan Lolos',
        ];
    }
	
	//Lolos
    public function findLolos($jml){ 
		$sql = "SELECT f.id_hasil_tes, e.id_calon, c.nama_departement, d.nama_jabatan, e.nama, f.hasil_tes, g.materi_tes, e.persetujuan_lolos 
				FROM lowongan b, departement c, jabatan d, pelamar e, hasil_tes f, materi_tes g 
				WHERE f.id_lowongan = b.id_lowongan AND b.id_departement = c.id_departement AND b.id_jabatan = d.id_jabatan AND f.id_pelamar = e.id_calon AND f.id_materi_tes = g.id_materi_tes ORDER BY f.hasil_tes DESC LIMIT $jml";

        return self::findBySql($sql)->asArray()->all();
    }
	
    public function insertLolos($jml){ 
		$sql = "INSERT INTO lolos_tes 
SELECT null,e.id_calon, f.id_hasil_tes
FROM pelamar e, hasil_tes f
WHERE f.id_pelamar = e.id_calon ORDER BY f.hasil_tes DESC LIMIT $jml";

        self::findBySql($sql)->asArray()->all();
    }
	
    public function LihatIdLowongan(){ 
		$sql = "SELECT f.id_lowongan
				FROM lowongan b, hasil_tes f, lolos_tes a
				WHERE a.id_hasil_tes = f.id_hasil_tes AND f.id_lowongan = b.id_lowongan GROUP BY id_lowongan";

        return self::findBySql($sql)->asArray()->all();
    }
	
}
