<?php

namespace app\models\warehouse;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\warehouse\Gudang;

/**
 * GudangSearch represents the model behind the search form about `app\models\warehouse\Gudang`.
 */
class GudangSearch extends Gudang
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Gudang_ID'], 'integer'],
            [['Nama', 'Alamat'], 'safe'],
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
        $query = Gudang::find();

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
            'Gudang_ID' => $this->Gudang_ID,
        ]);

        $query->andFilterWhere(['like', 'Nama', $this->Nama])
            ->andFilterWhere(['like', 'Alamat', $this->Alamat]);

        return $dataProvider;
    }
}
