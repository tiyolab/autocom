<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "v_user_role".
 *
 * @property integer $id_user
 * @property integer $id_role
 * @property string $role
 * @property string $user_type
 * @property integer $module
 * @property integer $hak_akses
 */
class VUserRole extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'v_user_role';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_user', 'id_role', 'module', 'hak_akses'], 'integer'],
            [['role', 'user_type'], 'required'],
            [['role', 'user_type'], 'string', 'max' => 32]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_user' => 'Id User',
            'id_role' => 'Id Role',
            'role' => 'Role',
            'user_type' => 'User Type',
            'module' => 'Module',
            'hak_akses' => 'Hak Akses',
        ];
    }
}
