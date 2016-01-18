<?php namespace app\models;

use Yii;
/**
 * This is the model class for table "module".
 *
 * @property integer $id
 * @property string $name
 *
 * @property RoleModule[] $roleModules
 */
class PeminjamanPayroll extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'peminjaman';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pegawai', 'tgl_pinjam', 'jumlah'], 'required'],
            [['tgl_pinjam', 'tgl_kembali'], 'date', 'format' => 'yyyy-M-d'],
            ['jumlah', 'double']
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTotalPeminjaman($id_pegawai)
    {
        $sql = "SELECT SUM(JUMLAH) AS jumlah FROM `peminjaman` 
            WHERE ID_PEGAWAI = ".$id_pegawai." AND TGL_KEMBALI IS NULL";

        $result = self::findBySql($sql)
            ->asArray()
            ->one()['jumlah'];

        return (empty($result) ? 0 : $result);
    }

    public function buatPinjaman($id_pegawai, $jumlah)
    {
        $this->id_pegawai = $id_pegawai;
        $this->tgl_pinjam = date('Y-m-d');
        $this->tgl_kembali = null;
        $this->jumlah = $jumlah;

        return $this->save();
    }

    public function buatPinjamanLunas($id_pegawai)
    {
        return $this->updateAll(
            ['tgl_kembali' => date('Y-m-d')],
             'id_pegawai = '.$id_pegawai.' AND tgl_kembali IS NULL'
            );
    }
}
