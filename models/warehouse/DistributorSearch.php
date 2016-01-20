<?php

namespace app\models\warehouse;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\warehouse\Distributor;

/**
 * DistributorSearch represents the model behind the search form about `app\models\warehouse\Distributor`.
 */
class DistributorSearch extends Distributor
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_Distributor'], 'integer'],
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
        $query = Distributor::find();

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
            'ID_Distributor' => $this->ID_Distributor,
        ]);

        $query->andFilterWhere(['like', 'Nama', $this->Nama]);

        return $dataProvider;
    }
}
