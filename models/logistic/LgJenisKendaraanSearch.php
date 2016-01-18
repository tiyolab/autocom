<?php

namespace app\models\logistic;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\logistic\LgJenisKendaraan;

/**
 * LgJenisKendaraanSearch represents the model behind the search form about `app\models\logistic\LgJenisKendaraan`.
 */
class LgJenisKendaraanSearch extends LgJenisKendaraan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kode'], 'integer'],
            [['jenis_kendaraan'], 'safe'],
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
        $query = LgJenisKendaraan::find();

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
        ]);

        $query->andFilterWhere(['like', 'jenis_kendaraan', $this->jenis_kendaraan]);

        return $dataProvider;
    }
}
