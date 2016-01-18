<?php

namespace app\modules\front\models;

use Yii;
use yii\base\Model;

/**
 * This is the model class for table "role".
 *
 * @property integer $id
 * @property string $name
 *
 * @property RoleModule[] $roleModules
 * @property UserType[] $userTypes
 */
class ecommerceDataUser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {

        return 'customers';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
         return [
            /*[['customers_id', 'user_registered', 'organization_name', 'first_name', 'middle_name', 'last_name', 'email_address', 'login_name', 'login_password', 'phone_number', 'city', 'country'], 'required'],
            [['customers_id'], 'integer'],
            [['user_registered'], 'safe'],
            [['organization_name', 'first_name', 'middle_name', 'last_name', 'email_address', 'login_name', 'login_password', 'phone_number', 'city', 'country'], 'string', 'max' => 100]
        */];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
         return [
            'customers_id' => 'Customers Id',
            'user_registered' => 'User Registered',
            'organization_name' => 'Organization Name',
            'first_name' => 'First Name',
            'middle_name' => 'Middle Name',
            'last_name' => 'Last Name',
            'email_address' => 'Email Address',
            'login_name' => 'Login Name',
            'login_password' => 'Login Password',
            'phone_number' => 'Phone Number',
            'city' => 'City',
            'country' => 'Country',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */

    public function saveData_user($data){
        $this->user_registered = date('Y-m-d H:i:s');
        $this->organization_name = $data['organization_name'];
        $this->first_name = $data['first_name'];
        $this->middle_name = $data['middle_name'];
        $this->last_name = $data['last_name'];
        //$dataUser->email = $data['email_address'];
        $this->email_address = $data['email_address'];
        $this->login_name = $data['login_name'];
        //$dataUser->username = $data['login_name'];
        $this->login_password = md5($data['login_password']);
        //$dataUser->password = md5($data['login_password']);
        $this->phone_number = $data['phone_number'];
        //$dataUser->user_type = '100';
        $this->city = $data['city'];
        $this->country = $data['country'];
        $this->save();
        //$dataUser->save();     
        return true;
    }

     public function saveData_place_order($data){
        $this->date_order_placed = date('Y-m-d H:i:s');
        $this->shipping_address = $data['shipping_address'];
        $this->shipping_city = $data['shipping_city'];
        $this->shipping_province = $data['shipping_province'];
        $this->shipping_zip_code = $data['shipping_zip_code'];
        //$dataUser->email = $data['email_address'];
        $this->shipping_country = $data['shipping_country'];
        $this->shipping_phone = $data['shipping_phone'];
        //$dataUser->username = $data['login_name'];
        //$dataUser->save();     
        return true;
    }

    
}
