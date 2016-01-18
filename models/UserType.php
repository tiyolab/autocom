<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_type".
 *
 * @property integer $id
 * @property string $name
 * @property integer $role
 *
 * @property User[] $users
 * @property Role $role0
 */
class UserType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'role'], 'required'],
            [['role'], 'integer'],
            [['name'], 'string', 'max' => 32]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'role' => 'Role',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['user_type' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRole0()
    {
        return $this->hasOne(Role::className(), ['id' => 'role']);
    }

    public function getPegawai()
    {
        $sql = "select * FROM pegawai WHERE 1 ORDER BY id_pegawai DESC ";

        return self::findBySql($sql)->asArray()->one();
    }

    public function getPegawaiId()
    {
        $sql = "select id_pegawai FROM pegawai WHERE 1 ORDER BY id_pegawai DESC ";

        return self::findBySql($sql)->asArray()->one();
    }
}
