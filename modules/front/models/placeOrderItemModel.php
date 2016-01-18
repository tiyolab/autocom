<?php

namespace app\modules\front\models;

use Yii;
use yii\base\Model;

class placeOrderItemModel extends \yii\db\ActiveRecord
{
	public static function tableName()
    {
        return 'order_items';
    }
	public  function insertItem($id,$kode_barang,$qty){
		$this->product_id = $kode_barang;
        $this->order_id = $id;
        $this->order_item_quantity = $qty;

        $this->save();     
        return true;
	}
		public function updateStock($id,$qty){
		Yii::$app->db->createCommand("Update barang SET Stock_temp=Stock_temp-'$qty' WHERE Kode_Barang=:id")->bindValue(':id',$id)->execute();
	
	}

}