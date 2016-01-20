<?php

namespace app\models\warehouse;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\warehouse\Barang;

/**
 * BarangSearch represents the model behind the search form about `app\models\warehouse\Barang`.
 */
class BarangSearch extends Barang
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'Kode_Barang', 'Jenis_Barang', 'Kemasan_ID', 'Blok_ID', 'Status', 'Harga_Satuan', 'Stock'], 'integer'],
            [['Nama_Barang', 'Kadaluarsa', 'Gambar'], 'safe'],
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
        $query = Barang::find();

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
            'ID' => $this->ID,
            'Kode_Barang' => $this->Kode_Barang,
            'Jenis_Barang' => $this->Jenis_Barang,
            'Kemasan_ID' => $this->Kemasan_ID,
            'Blok_ID' => $this->Blok_ID,
            'Kadaluarsa' => $this->Kadaluarsa,
            'Status' => $this->Status,
            'Harga_Satuan' => $this->Harga_Satuan,
            'Stock' => $this->Stock,
        ]);

        $query->andFilterWhere(['like', 'Nama_Barang', $this->Nama_Barang])
            ->andFilterWhere(['like', 'Gambar', $this->Gambar]);

        return $dataProvider;
    }
}
