<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Trouble;

/**
 * TroubleSearch represents the model behind the search form of `app\models\Trouble`.
 */
class TroubleSearch extends Trouble
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'ip_address'], 'integer'],
            [['physical_address', 'executor', 'operator', 'deadline', 'stages'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Trouble::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'ip_address' => $this->ip_address,
            'deadline' => $this->deadline,
        ]);

        $query->andFilterWhere(['like', 'physical_address', $this->physical_address])
            ->andFilterWhere(['like', 'executor', $this->executor])
            ->andFilterWhere(['like', 'operator', $this->operator])
            ->andFilterWhere(['like', 'stages', $this->stages]);

        return $dataProvider;
    }
}
