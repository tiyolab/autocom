<?php

namespace app\models\warehouse;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\warehouse\BabKeluar;

/**
 * BabKeluarSearch represents the model behind the search form about `app\models\BabKeluar`.
 */
class BabKeluarSearch extends BabKeluar
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_Bab_Keluar', 'ID_SO', 'User_Id'], 'integer'],
            [['NO_Surat_Jalan', 'Tanggal_Surat', 'Tanggal_Keluar', 'Kondisi'], 'safe'],
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
        $query = BabKeluar::find();

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
            'ID_Bab_Keluar' => $this->ID_Bab_Keluar,
            'ID_SO' => $this->ID_SO,
            'Tanggal_Surat' => $this->Tanggal_Surat,
            'Tanggal_Keluar' => $this->Tanggal_Keluar,
            'User_Id' => $this->User_Id,
        ]);

        $query->andFilterWhere(['like', 'NO_Surat_Jalan', $this->NO_Surat_Jalan])
            ->andFilterWhere(['like', 'Kondisi', $this->Kondisi]);

        return $dataProvider;
    }
}
