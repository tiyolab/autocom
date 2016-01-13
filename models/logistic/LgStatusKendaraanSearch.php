<?php

namespace app\models\logistic;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\logistic\LgStatusKendaraan;

/**
 * LgStatusKendaraanSearch represents the model behind the search form about `app\models\logistic\LgStatusKendaraan`.
 */
class LgStatusKendaraanSearch extends LgStatusKendaraan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kode', 'kendaraan'], 'integer'],
            [['tgl_permasalahan', 'permasalahan', 'tanggal_solusi', 'solusi'], 'safe'],
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
        $query = LgStatusKendaraan::find();

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
            'kendaraan' => $this->kendaraan,
            'tgl_permasalahan' => $this->tgl_permasalahan,
            'tanggal_solusi' => $this->tanggal_solusi,
        ]);

        $query->andFilterWhere(['like', 'permasalahan', $this->permasalahan])
            ->andFilterWhere(['like', 'solusi', $this->solusi]);

        return $dataProvider;
    }
}
