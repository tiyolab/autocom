<?php

namespace app\models;

use Yii;
use app\models\RoleModule;

/**
 * This is the model class for table "role".
 *
 * @property integer $id
 * @property string $name
 *
 * @property RoleModule[] $roleModules
 * @property UserType[] $userTypes
 */
class Role extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'role';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRoleModules()
    {
        return $this->hasMany(RoleModule::className(), ['role' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserTypes()
    {
        return $this->hasMany(UserType::className(), ['role' => 'id']);
    }

    public function findRoleWithModule(){
        $sql = "select 
                    role.id as id_role,
                    role.name as role,
                    group_concat(distinct(module.name)) as module 
                from role, role_module, module 
                where role_module.role = role.id and module.id = role_module.module group by role.id";

        return self::findBySql($sql)->asArray()->all();
    }

    public function findRoleWithDetail($id){
        $sql = "select 
                    role.id as id_role,
                    role.name as role,
                    module.id as id_module,
                    module.name as module,
                    group_concat(hak_akses.id) as id_hak_akses,
                    group_concat(hak_akses.name) as hak_akses 
                from role, role_module, module, hak_akses 
                where role_module.role = role.id and hak_akses.id = role_module.hak_akses and module.id = role_module.module and role.id = '$id' group by module.id";

        return self::findBySql($sql)->asArray()->all();
    }

    public function saveRole($data){
        $this->name = $data['role'];
        $this->save();
        foreach ($data['module'] as $key => $value) {
            foreach ($value['role'] as $key2 => $value2) {
                $roleModule = new RoleModule();
                $roleModule->role = $this->id;
                $roleModule->module = $value['name'];
                $roleModule->hak_akses = $value2;
                $roleModule->save();
            }
        }
        
        return true;
    }

    public function updateRole($id, $data){
        foreach ($data['module'] as $key => $value) {
            foreach ($value['role'] as $key2 => $value2) {
                $roleModule = new RoleModule();
                $roleModule->role = $id;
                $roleModule->module = $value['name'];
                $roleModule->hak_akses = $value2;
                $roleModule->save();
            }
        }
        
        return true;
    }
}
