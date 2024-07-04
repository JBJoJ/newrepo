<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\FeedbackMonitoring;

/**
 * FeedbackMonitoringSearch represents the model behind the search form of `frontend\models\FeedbackMonitoring`.
 */
class FeedbackMonitoringSearch extends FeedbackMonitoring
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'office_id', 'source_document', 'feedback', 'status'], 'integer'],
            [['reporting_period', 'process_id', 'date', 'action_plan', 'action_taken'], 'safe'],
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
        $query = FeedbackMonitoring::find();

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
            'reporting_period' => $this->reporting_period,
            'office_id' => $this->office_id,
            'date' => $this->date,
            'source_document' => $this->source_document,
            'feedback' => $this->feedback,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'process_id', $this->process_id])
            ->andFilterWhere(['like', 'action_plan', $this->action_plan])
            ->andFilterWhere(['like', 'action_taken', $this->action_taken]);

        return $dataProvider;
    }
}
