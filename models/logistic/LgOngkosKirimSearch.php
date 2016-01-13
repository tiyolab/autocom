<?php

namespace app\models\logistic;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\logistic\LgOngkosKirim;

/**
 * LgOngkosKirimSearch represents the model behind the search form about `app\models\logistic\LgOngkosKirim`.
 */
class LgOngkosKirimSearch extends LgOngkosKirim
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kode', 'day', 'harga','tujuan', 'harga_perweight'], 'integer'],
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
        $query = LgOngkosKirim::find();

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
            'day' => $this->day,
            'harga' => $this->harga,
        ]);

        $query->andFilterWhere(['like', 'tujuan', $this->tujuan])
            ->andFilterWhere(['like', 'harga_perweight', $this->harga_perweight]);

        return $dataProvider;
    }
}
