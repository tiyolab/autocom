<?php

namespace app\models;

use Yii;
use yii\base\Model;

class ecommerceDataKirim extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'shipments';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['shipment_id', 'order_id','invoice_number', 'shipment_tracking_number', 'shipment_date'], 'required'],
            [['shipment_id', 'order_id', 'invoice_number', 'shipment_tracking_number'], 'integer'],
            [['shipment_date'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'shipment_id' => 'Shipment ID',
            'order_id' => 'Order ID',
			'invoice_number' => 'Invoice Number',
			'shipment_tracking_number' => 'Shipment Tracking Number',
			'shipment_date' => 'Shipping Date',
        ];
    }

    public function findDataKirim(){
        $sql = "SELECT *
                FROM lg_pengiriman";

        return self::findBySql($sql)->asArray()->all();
    }

}
