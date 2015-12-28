<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "role_module".
 *
 * @property integer $id
 * @property integer $role
 * @property integer $hak_akses
 * @property integer $module
 *
 * @property HakAkses $hakAkses
 * @property Module $module0
 * @property Role $role0
 */
class RoleModule extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'role_module';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['role', 'hak_akses', 'module'], 'required'],
            [['role', 'hak_akses', 'module'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'role' => 'Role',
            'hak_akses' => 'Hak Akses',
            'module' => 'Module',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHakAkses()
    {
        return $this->hasOne(HakAkses::className(), ['id' => 'hak_akses']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getModule0()
    {
        return $this->hasOne(Module::className(), ['id' => 'module']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRole0()
    {
        return $this->hasOne(Role::className(), ['id' => 'role']);
    }
}
