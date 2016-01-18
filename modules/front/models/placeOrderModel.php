<?php

namespace app\modules\front\models;

use Yii;
use yii\base\Model;

class placeOrderModel extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'orders';
    }
	public function findUser($username,$email){
		$sql = "SELECT *
                FROM customers
				WHERE login_name='$username'";

        return self::findBySql($sql)->asArray()->all();
	}
	public function findUserOrder($id){
		$sql = "SELECT *
                FROM orders
				WHERE customers_id='$id'
				ORDER BY date_order_placed DESC";

        return self::findBySql($sql)->asArray()->all();
	}
	public function findItemOrder($id){
		$sql = "SELECT *
                FROM order_items,barang,kemasan
				WHERE order_id='$id' AND product_id=Kode_Barang AND barang.Kemasan_ID=kemasan.Kemasan_ID";

        return self::findBySql($sql)->asArray()->all();
	}
	public function findShippingOrder($id){
		$sql = "SELECT *
                FROM lg_pengiriman
				WHERE id_order='$id'";

        return self::findBySql($sql)->asArray()->all();
	}
    public function insertOrder(){
		$session = Yii::$app->session;
		$session->open();
		$user_session = $session['session.user'];
		$session->close();
		
		$user = $this->findUser($user_session['username'],$user_session['email']);
		foreach($user as $key => $value){
			$id=$value['customers_id'];
		}
		$date = date('Y-m-d H:i:s');
		$this->customers_id = $id;
        $this->date_order_placed = $date;
        $this->shipping_address = $user_session['address'];
        $this->shipping_city = $user_session['city'];
        $this->shipping_province = $user_session['province'];
        $this->shipping_zip_code = $user_session['zip_code'];
        $this->shipping_country = $user_session['country'];
        $this->shipping_phone = $user_session['phone'];
		$this->total_weight = $user_session['total_berat'];
		$this->shipping_price = $user_session['shipping_price'];
        $this->total_price = $user_session['subprice'];

        $this->save();
		$sql = "SELECT *
                FROM orders
				WHERE date_order_placed='$date' AND customers_id='$id'";

        $order =  self::findBySql($sql)->asArray()->all();
		foreach($order as $key => $value){
			$order_id = $value['order_id'];
		}
        return $order_id;
    }
      public function caridata($id){
        return placeOrderModel::findOne($id);
    }
	public function findDataPesan(){
        $sql = "SELECT order_id, customers_id, order_status_code, date_order_placed, shipping_address, shipping_city, shipping_province, shipping_zip_code, shipping_country, shipping_phone
                FROM orders";

        return self::findBySql($sql)->asArray()->all();
    }
	public function findDetailOrder($id){
        $sql = "SELECT *
                FROM orders,customers
				WHERE order_id='$id' AND orders.customers_id=customers.customers_id";

        return self::findBySql($sql)->asArray()->all();
    }
	public function updateStock($id,$qty){
		Yii::$app->db->createCommand("Update barang SET Stock_temp=Stock_temp-'$qty' WHERE Kode_Barang=:id")->bindValue(':id',$id)->execute();
	
	}

}
