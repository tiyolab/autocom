<?php

namespace app\models\logistic;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\logistic\LgKendaraan;

/**
 * LgKendaraanSearch represents the model behind the search form about `app\models\logistic\LgKendaraan`.
 */
class LgKendaraanSearch extends LgKendaraan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kode', 'tahun_pembelian', 'jenis_transportasi', 'penanggung_jawab', 'berat_muatan', 'status_pemakaian'], 'integer'],
            [['nomor_polisi', 'bahan_bakar'], 'safe'],
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
        $query = LgKendaraan::find();

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
            'tahun_pembelian' => $this->tahun_pembelian,
            'jenis_transportasi' => $this->jenis_transportasi,
            'penanggung_jawab' => $this->penanggung_jawab,
            'berat_muatan' => $this->berat_muatan,
            'status_pemakaian' => $this->status_pemakaian,
        ]);

        $query->andFilterWhere(['like', 'nomor_polisi', $this->nomor_polisi])
            ->andFilterWhere(['like', 'bahan_bakar', $this->bahan_bakar]);

        return $dataProvider;
    }
}
