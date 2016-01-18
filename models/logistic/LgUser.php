<?php

namespace app\models\logistic;

use Yii;

/**
 * This is the model class for table "lg_user".
 *
 * @property integer $kode
 * @property string $username
 * @property string $password
 * @property string $nama_lengkap
 * @property string $jabatan
 * @property integer $level
 * @property string $identitas
 * @property string $foto
 * @property string $last_login
 * @property string $last_logout
 */
class LgUser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lg_user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password', 'nama_lengkap', 'jabatan', 'level', 'identitas', 'foto', 'last_login', 'last_logout'], 'required'],
            [['level'], 'integer'],
            [['last_login', 'last_logout'], 'safe'],
            [['username', 'password', 'nama_lengkap', 'jabatan'], 'string', 'max' => 100],
            [['identitas', 'foto'], 'string', 'max' => 1000]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'kode' => 'Kode',
            'username' => 'Username',
            'password' => 'Password',
            'nama_lengkap' => 'Nama Lengkap',
            'jabatan' => 'Jabatan',
            'level' => 'Level',
            'identitas' => 'Identitas',
            'foto' => 'Foto',
            'last_login' => 'Last Login',
            'last_logout' => 'Last Logout',
        ];
    }
}
