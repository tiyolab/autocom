<?php

namespace app\models;

use Yii;
use yii\base\Model;

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
            [['customers_id', 'user_registered', 'organization_name', 'first_name', 'middle_name', 'last_name', 'email_address', 'login_name', 'login_password', 'phone_number', 'city', 'country'], 'required'],
            [['customers_id'], 'integer'],
            [['user_registered'], 'safe'],
            [['organization_name', 'first_name', 'middle_name', 'last_name', 'email_address', 'login_name', 'login_password', 'phone_number', 'city', 'country'], 'string', 'max' => 100]
        ];
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

    public function findDataUser(){
        $sql = "SELECT customers_id, user_registered, organization_name, first_name, middle_name, last_name, email_address, login_name, login_password, phone_number, city, country
                FROM customers";

        return self::findBySql($sql)->asArray()->all();
    }

}
