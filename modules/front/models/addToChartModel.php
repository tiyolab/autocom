<?php

namespace app\modules\front\models;

use Yii;
use yii\base\Model;

class addToChartModel extends \yii\db\ActiveRecord
{
    
	public $kode_barang;
	public $berat;
	public $stok;
	public $harga;
	public $qty;

    public function rules()
    {
        return [
            [['qty','kode_barang','berat','stok','harga'], 'required'],
        ];
    }
}