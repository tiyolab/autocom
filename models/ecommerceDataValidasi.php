<?php

namespace app\models;

use Yii;
use yii\base\Model;

class ecommerceDataValidasi extends \yii\db\ActiveRecord
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
            'order_id' => 'Oder Id',
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

    public function findDataValidasi(){
        $sql = "SELECT *
                FROM orders WHERE order_status_code ='1'";

        return self::findBySql($sql)->asArray()->all();
    }
	public function validating($id){
		Yii::$app->db->createCommand("Update orders SET order_status_code=2 WHERE order_id=:id")->bindValue(':id',$id)->execute();
	}
	public function insert_pengiriman($id,$sp){
		Yii::$app->db->createCommand()->insert('lg_pengiriman', ['id_order' => $id,'ongkir' => $sp,])->execute();
	}
	public function insert_so($id){
		$sql = "SELECT *
                FROM order_items WHERE order_id ='$id'";

        $hasil= self::findBySql($sql)->asArray()->all();
		foreach($hasil as $key => $value){
			Yii::$app->db->createCommand()->insert('salesorder', ['Kode_SO' => $id,'Kode_Barang' => $value['product_id'], 'Jumlah'=> $value['order_item_quantity'], 'Tanggal_Order' => date('Y-m-d H:i:s'), 'Status' =>'On The Way'])->execute();
		}
		return true;
	}
   


}
