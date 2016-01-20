<?php

namespace app\models\warehouse;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\warehouse\SalesOrder;

/**
 * SalesOrderSearch represents the model behind the search form about `app\models\warehouse\SalesOrder`.
 */
class SalesOrderSearch extends SalesOrder
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_SO', 'Kode_SO', 'Kode_Barang', 'Jumlah', 'SuratJalan_ID', 'Status'], 'integer'],
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
        $query = SalesOrder::find();

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
            'ID_SO' => $this->ID_SO,
            'Kode_SO' => $this->Kode_SO,
            'Kode_Barang' => $this->Kode_Barang,
            'Jumlah' => $this->Jumlah,
            'SuratJalan_ID' => $this->SuratJalan_ID,
            'Tanggal_Order' => $this->Tanggal_Order,
            'Status' => $this->Status,
        ]);

        return $dataProvider;
    }
}
