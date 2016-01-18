<?php

namespace app\modules\front\models;

use Yii;
use yii\base\Model;

class dataAlamatPengiriman extends \yii\db\ActiveRecord
{
   
	public $shipping_address;
	public $shipping_zip_code;
	public $shipping_city;
	public $shipping_province;
	public $shipping_country;
	public $shipping_phone;

    public function rules()
    {
        return [
            [['shipping_address','shipping_province','shipping_city',
			'shipping_zip_code','shipping_country','shipping_phone'], 'required'],
        ];
    }
	 public function attributeLabels()
    {
        return [
			'date_order_placed' => 'Date Order',
			'shipping_address' => 'Shipping Address',
			'shipping_city' => 'Shipping City',
            'shipping_province' => 'Shipping Province',
            'shipping_zip_code' => 'Shipping Zip Code',
            'shipping_country' => 'Shipping Country',
            'shipping_phone' => 'Shipping Phone',
            
        ];
    }
	public function shipment_price($zip_code, $total_qty){
		$sql = "SELECT *
				FROM lg_ongkos_kirim
				WHERE tujuan='$zip_code'";

        $hasil =  self::findBySql($sql)->asArray()->all();
		
		foreach($hasil as $key => $value){
			$biaya=$value['harga']+$value['harga_perweight']*$total_qty;
		}
		return $biaya;
	}
	
}
