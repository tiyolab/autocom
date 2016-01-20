<?php

namespace app\models\warehouse;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\warehouse\Blok;

/**
 * BlokSearch represents the model behind the search form about `app\models\warehouse\Blok`.
 */
class BlokSearch extends Blok
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Blok_ID', 'Gudang_ID'], 'integer'],
            [['Nama'], 'safe'],
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
        $query = Blok::find();

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
            'Blok_ID' => $this->Blok_ID,
            'Gudang_ID' => $this->Gudang_ID,
        ]);

        $query->andFilterWhere(['like', 'Nama', $this->Nama]);

        return $dataProvider;
    }
}
