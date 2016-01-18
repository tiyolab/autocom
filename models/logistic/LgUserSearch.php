<?php

namespace app\models\logistic;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\logistic\LgUser;

/**
 * LgUserSearch represents the model behind the search form about `app\models\logistic\LgUser`.
 */
class LgUserSearch extends LgUser
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kode', 'level'], 'integer'],
            [['username', 'password', 'nama_lengkap', 'jabatan', 'identitas', 'foto', 'last_login', 'last_logout'], 'safe'],
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
        $query = LgUser::find();

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
            'level' => $this->level,
            'last_login' => $this->last_login,
            'last_logout' => $this->last_logout,
        ]);

        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'password', $this->password])
            ->andFilterWhere(['like', 'nama_lengkap', $this->nama_lengkap])
            ->andFilterWhere(['like', 'jabatan', $this->jabatan])
            ->andFilterWhere(['like', 'identitas', $this->identitas])
            ->andFilterWhere(['like', 'foto', $this->foto]);

        return $dataProvider;
    }
}
