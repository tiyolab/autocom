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
class PegawaiPayroll extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pegawai';
    }

    public static function primaryKey()
    {
       return 'id_pegawai';
    }

    /**
     * @inheritdoc
     */
    /*public function rules()
    {
        return [
        ];
    }*/

    public function getFullName($id_pegawai)
    {
        return ($this->find()
            ->select('nama_lengkap')
            ->where(['id_pegawai' => $id_pegawai])
            ->one()['nama_lengkap']);
    }

    public function getAllId()
    {
        return $this->find()->all();
    }
}
