<?php

namespace app\models\warehouse;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\warehouse\BaPengembalian;

/**
 * BaPengembalianSearch represents the model behind the search form about `app\models\warehouse\BaPengembalian`.
 */
class BaPengembalianSearch extends BaPengembalian
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_Bab', 'ID_PO', 'User_Id'], 'integer'],
            [['No_Faktur', 'No_Surat_Jalan', 'Tanggal_Surat', 'Tanggal_Terima', 'Kondisi'], 'safe'],
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
        $query = BaPengembalian::find();

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
            'ID_Bab' => $this->ID_Bab,
            'ID_PO' => $this->ID_PO,
            'Tanggal_Surat' => $this->Tanggal_Surat,
            'Tanggal_Terima' => $this->Tanggal_Terima,
            'User_Id' => $this->User_Id,
        ]);

        $query->andFilterWhere(['like', 'No_Faktur', $this->No_Faktur])
            ->andFilterWhere(['like', 'No_Surat_Jalan', $this->No_Surat_Jalan])
            ->andFilterWhere(['like', 'Kondisi', $this->Kondisi]);

        return $dataProvider;
    }
}
