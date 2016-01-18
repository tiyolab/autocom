<?php

namespace app\models\logistic;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\logistic\LgApprove;

/**
 * LgApproveSearch represents the model behind the search form about `app\models\logistic\LgApprove`.
 */
class LgApproveSearch extends LgApprove
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kode', 'id_order', 'kendaraan', 'kurir', 'status_approve', 'status_pengiriman', 'ongkir'], 'integer'],
            [['tgl_pengiriman', 'tgl_terima'], 'safe'],
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
        $query = LgApprove::find();

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
            'kode' => $this->kode,
            'id_order' => $this->id_order,
            'tgl_pengiriman' => $this->tgl_pengiriman,
            'tgl_terima' => $this->tgl_terima,
            'kendaraan' => $this->kendaraan,
            'kurir' => $this->kurir,
            'status_approve' => $this->status_approve,
            'status_pengiriman' => $this->status_pengiriman,
            'ongkir' => $this->ongkir,
        ]);

        return $dataProvider;
    }
}
