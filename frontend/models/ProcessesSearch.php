<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Processes;

/**
 * ProcessesSearch represents the model behind the search form of `frontend\models\Processes`.
 */
class ProcessesSearch extends Processes
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'process_id', 'transaction_id'], 'integer'],
            [['process', 'prefix'], 'safe'],
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
        $query = Processes::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10, // Adjust pageSize as needed
            ],
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
            'process_id' => $this->process_id,
            'transaction_id' => $this->transaction_id,
        ]);

        $query->andFilterWhere(['like', 'process', $this->process])
            ->andFilterWhere(['like', 'prefix', $this->prefix]);

        return $dataProvider;
    }
}
