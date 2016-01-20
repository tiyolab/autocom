<?php

namespace app\models;

use Yii;
use yii\base\Model;

class ecommerceDataBarang extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'product_type_code','product_name', 'product_price', 'product_color', 'product_size', 'product_status', 'product_description'], 'required'],
            [['product_id', 'product_type_code', 'product_price', 'product_size', 'product_status'], 'integer'],
            [['product_name', 'product_color'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'product_id' => 'Product Id',
            'product_type_code' => 'Product Type Code',
			'product_name' => 'Product Name',
			'product_price' => 'Product Price',
			'product_color' => 'Product Color',
			'product_size' => 'Product Size',
            'product_status' => 'Product Status',
            'product_description' => 'Product Description',
        ];
    }

    public function findDataBarang(){
        $sql = "SELECT product_id, product_type_code, product_name, product_price, product_color, product_size, product_status, product_description
                FROM products";

        return self::findBySql($sql)->asArray()->all();
    }

}
