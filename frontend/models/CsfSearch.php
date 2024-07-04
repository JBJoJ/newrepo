<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Csf;

/**
 * CsfSearch represents the model behind the search form of `frontend\models\Csf`.
 */
class CsfSearch extends Csf
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'reporting_period', 'date', 'client_name', 'program', 'duration', 'platform', 'region', 'contact_number', 'email', 'business_name', 'business_address'], 'safe'],
            [['office', 'process', 'sex', 'age_distribution', 'age', 'transaction_type', 'disbursement_type'], 'integer'],
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
        $query = Csf::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10, // Adjust pageSize as needed
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'reporting_period' => $this->reporting_period,
            'office' => $this->office,
            'process' => $this->process,
            'date' => $this->date,
            'sex' => $this->sex,
            'age_distribution' => $this->age_distribution,
            'age' => $this->age,
            'transaction_type' => $this->transaction_type,
            'disbursement_type' => $this->disbursement_type,
        ]);

        $query->andFilterWhere(['like', 'id', $this->id])
            ->andFilterWhere(['like', 'client_name', $this->client_name])
            ->andFilterWhere(['like', 'program', $this->program])
            ->andFilterWhere(['like', 'duration', $this->duration])
            ->andFilterWhere(['like', 'platform', $this->platform])
            ->andFilterWhere(['like', 'region', $this->region])
            ->andFilterWhere(['like', 'contact_number', $this->contact_number])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'business_name', $this->business_name])
            ->andFilterWhere(['like', 'business_address', $this->business_address]);

        return $dataProvider;
    }
}
