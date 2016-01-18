<?php

namespace app\models;

use Yii;
use yii\base\Model;

class ecommerceReportPenjualan extends \yii\db\ActiveRecord
{
    public $date;

    public function rules()
    {
        return [
            [['date'], 'required'],
			[['date'], 'safe'],
			['date', 'date', 'format' => 'yyyy-M-d H:m:s'],
			
			
        ];
    }
	public function thisdayReport()
	{
		$today = Yii::$app->formatter->asDate('now', 'php:Y-m-d');
		$sql = "SELECT order_id, customers_id, order_status_code, date_order_placed, shipping_address, shipping_city, shipping_province, shipping_zip_code, shipping_country, shipping_phone
                FROM orders
				WHERE date_order_placed='$today'";

        return self::findBySql($sql)->asArray()->all();
	}
	public function search($m)
	{
		$explode = explode('-',$m);
		$exploded = explode('/',$explode[0]);
		$ex[0] = trim($exploded[2]);
		$ex[1] = trim($exploded[0]);
		$ex[2] = trim($exploded[1]);
		$mindatee = implode('-', $ex);
		
		$ex1 = array();
		$exploded1 = explode('/',$explode[1]);
		$ex1[0] = trim($exploded1[2]);
		$ex1[1] = trim($exploded1[0]);
		$ex1[2] = trim($exploded1[1]);
		$maxdatee = implode('-', $ex1); 
		
		$sql = "SELECT order_id, customers_id, order_status_code, date_order_placed, shipping_address, shipping_city, shipping_province, shipping_zip_code, shipping_country, shipping_phone
                FROM orders
				WHERE date_order_placed>='$mindatee' AND date_order_placed<='$maxdatee' ";

       return self::findBySql($sql)->asArray()->all();
	   //return $maxdatee;
	}
}