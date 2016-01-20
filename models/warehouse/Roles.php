<?php

namespace app\models\warehouse;

use Yii;

/**
 * This is the model class for table "roles".
 *
 * @property integer $Roles_Id
 * @property string $Nama
 */
class Roles extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'roles';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Roles_Id', 'Nama'], 'required'],
            [['Roles_Id'], 'integer'],
            [['Nama'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Roles_Id' => 'Roles  ID',
            'Nama' => 'Nama',
        ];
    }
    public function findRolesWithModule(){
        $sql = "select * from roles";

        return self::findBySql($sql)->asArray()->all();
    }
}
