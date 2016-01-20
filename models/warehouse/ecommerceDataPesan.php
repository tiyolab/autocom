<?php

namespace app\models;

use Yii;
use yii\base\Model;

class ecommerceDataPesan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_id', 'customers_id','order_status_code', 'date_order_placed', 'shipping_address', 'shipping_city', 'shipping_province', 'shipping_zip_code', 'shipping_country', 'shipping_phone'], 'required'],
            [['order_id', 'customers_id', 'order_status_code', 'shipping_zip_code'], 'integer'],
            [['date_order_placed'], 'safe'],
            [['shipping_address', 'shipping_city', 'shipping_province', 'shipping_country', 'shipping_phone'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'order_id' => 'Order Id',
            'customers_id' => 'Product Type Code',
			'order_status_code' => 'Order Status Code',
			'date_order_placed' => 'Date Order',
			'shipping_address' => 'Shipping Address',
			'shipping_city' => 'Shipping City',
            'shipping_province' => 'Shipping Province',
            'shipping_zip_code' => 'Shipping Zip Code',
            'shipping_country' => 'Shipping Country',
            'shipping_phone' => 'Shipping Phone',
            
        ];
    }

    public function findDataPesan(){
        $sql = "SELECT order_id, customers_id, order_status_code, date_order_placed, shipping_address, shipping_city, shipping_province, shipping_zip_code, shipping_country, shipping_phone
                FROM orders";

        return self::findBySql($sql)->asArray()->all();
    }

}
