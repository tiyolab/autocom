<?php

namespace app\models\warehouse;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\warehouse\PurchaseOrder;

/**
 * PurchaseOrderSearch represents the model behind the search form about `app\models\warehouse\PurchaseOrder`.
 */
class PurchaseOrderSearch extends PurchaseOrder
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_PO', 'Kode_PO', 'Kode_Barang', 'Jumlah','Distributor_ID', 'Status'], 'integer'],
            [['Tanggal_Order'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = PurchaseOrder::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'ID_PO' => $this->ID_PO,
            'Kode_PO' => $this->Kode_PO,
            'Kode_Barang' => $this->Kode_Barang,
            'Jumlah' => $this->Jumlah,
            'Distributor_ID' => $this->Distributor_ID,
            'Tanggal_Order' => $this->Tanggal_Order,
            'Status' => $this->Status,
        ]);

        return $dataProvider;
    }
    public function findPurchaseOrderWithModule(){
        $sql = "select * from purchaseorder";

        return self::findBySql($sql)->asArray()->all();
    }
}
