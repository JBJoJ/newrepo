<?php

namespace frontend\controllers;

use frontend\models\FinancialClaim;
use frontend\models\Comments;
use frontend\models\Csf;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use Yii;

/**
 * FinancialClaimController implements the CRUD actions for FinancialClaim model.
 */
class FinancialClaimController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all FinancialClaim models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => FinancialClaim::find(),
            /*
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ]
            ],
            */
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single FinancialClaim model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        // return $this->render('view', [
        //     'model' => $this->findModel($id),
        // ]);
        // $process_id = Yii::$app->request->get('process_id');

        // $model = FinancialClaim::findOne(['process_id' => $process_id]);
        // $commentsModel = Comments::findOne(['process_id' => $process_id]);
        // $csfModel = Csf::findOne(['id' => $model->id ]);
    
        // return $this->render('view', [
        //     'model' => $model,
        //     'commentsModel' => $commentsModel,
        //     'csfmodel' => $csfModel,
        // ]);
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new FinancialClaim model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new FinancialClaim();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing FinancialClaim model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing FinancialClaim model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the FinancialClaim model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return FinancialClaim the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = FinancialClaim::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    public function actionFinancialExternal($process_id)
    {
        $model = new FinancialClaim();
        $commentsmodel = new Comments();
    
        // Check if the form is submitted and both models are loaded with POST data
        if (Yii::$app->request->isPost && $model->load(Yii::$app->request->post()) && $commentsmodel->load(Yii::$app->request->post())) {
            // Assign the process_id to both models
            $model->process_id = $process_id;
            $commentsmodel->process_id = $process_id;
    
            // Validate and save both models
            if ($model->validate() && $commentsmodel->validate()) {
                // Use transactions to ensure atomicity
                $transaction = Yii::$app->db->beginTransaction();
                try {
                    if ($model->save() && $commentsmodel->save()) {
                        $transaction->commit();
                        // Redirect to the view action with the ID of the FinancialClaim
                        return $this->redirect(['view', 'id' => $model->id]);
                    } else {
                        $transaction->rollBack();
                        Yii::$app->session->setFlash('error', 'Failed to save the feedback.');
                    }
                } catch (\Exception $e) {
                    $transaction->rollBack();
                    Yii::$app->session->setFlash('error', 'An error occurred while processing your request.');
                    Yii::error($e->getMessage());
                }
            } else {
                Yii::$app->session->setFlash('error', 'Validation error occurred.');
            }
        }
    
        // Render the form view with the models
        return $this->renderPartial('financial-external', [
            'model' => $model,
            'commentsmodel' => $commentsmodel,
        ]);
    }
    

    public function actionFinancialInternal($process_id)
    {
        $model = new FinancialClaim();
        $commentsmodel = new Comments();

        if ($model->load(Yii::$app->request->post()) && $commentsmodel->load(Yii::$app->request->post())) {
            // if ($model->validate() && $commentsmodel->validate()) {
            //     // form inputs are valid, do something here
            //     return;
            // }
            $model->process_id = $process_id;
            $commentsmodel->process_id = $process_id;

            if ($model->save() && $commentsmodel->save())
            {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->renderPartial('financial-internal', [
            'model' => $model,
            'commentsmodel' => $commentsmodel,
        ]);
    }

    public function actionFinancialOnline($process_id)
    {
        $model = new FinancialClaim();
        $commentsmodel = new Comments();

        if ($model->load(Yii::$app->request->post()) && $commentsmodel->load(Yii::$app->request->post())) {
            // if ($model->validate() && $commentsmodel->validate()) {
            //     // form inputs are valid, do something here
            //     return;
            // }
            $model->process_id = $process_id;
            $commentsmodel->process_id = $process_id;

            if ($model->save() && $commentsmodel->save())
            {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->renderPartial('financial-online', [
            'model' => $model,
            'commentsmodel' => $commentsmodel,
        ]);
    }

    public function actionFinancialTabulation($prefix)
    {
        $model = new \frontend\models\FinancialClaim();

        //To get the count of each cell of the row in Very Satisfied
        $very_satisfy = (new \yii\db\Query())
        ->select([
            'very_satisfy_raic_a' => 'SUM(CASE WHEN raic_a = 1 THEN 1 ELSE 0 END)',
            'very_satisfy_raic_b' => 'SUM(CASE WHEN raic_b = 1 THEN 1 ELSE 0 END)',
            'very_satisfy_raic_c' => 'SUM(CASE WHEN raic_c = 1 THEN 1 ELSE 0 END)',
            'very_satisfy_raic_d' => 'SUM(CASE WHEN raic_d = 1 THEN 1 ELSE 0 END)',
            'very_satisfy_raic_e' => 'SUM(CASE WHEN raic_e = 1 THEN 1 ELSE 0 END)',
            'very_satisfy_raic_f' => 'SUM(CASE WHEN raic_f = 1 THEN 1 ELSE 0 END)',
            'very_satisfy_af_a' => 'SUM(CASE WHEN af_a = 1 THEN 1 ELSE 0 END)',
            'very_satisfy_af_b' => 'SUM(CASE WHEN af_b = 1 THEN 1 ELSE 0 END)',
            'very_satisfy_af_c' => 'SUM(CASE WHEN af_c = 1 THEN 1 ELSE 0 END)',
            'very_satisfy_rao' => 'SUM(CASE WHEN rao = 1 THEN 1 ELSE 0 END)',
        ])
        ->from('financial_claim')
        ->where(['like', 'process_id', '%FCE%', false])
        ->all();
        //END

        //To get the count of each cell of the row in Satisfied
        $satisfy = (new \yii\db\Query())
        ->select([
            'satisfy_raic_a' => 'SUM(CASE WHEN raic_a = 2 THEN 1 ELSE 0 END)',
            'satisfy_raic_b' => 'SUM(CASE WHEN raic_b = 2 THEN 1 ELSE 0 END)',
            'satisfy_raic_c' => 'SUM(CASE WHEN raic_c = 2 THEN 1 ELSE 0 END)',
            'satisfy_raic_d' => 'SUM(CASE WHEN raic_d = 2 THEN 1 ELSE 0 END)',
            'satisfy_raic_e' => 'SUM(CASE WHEN raic_e = 2 THEN 1 ELSE 0 END)',
            'satisfy_raic_f' => 'SUM(CASE WHEN raic_f = 2 THEN 1 ELSE 0 END)',
            'satisfy_af_a' => 'SUM(CASE WHEN af_a = 2 THEN 1 ELSE 0 END)',
            'satisfy_af_b' => 'SUM(CASE WHEN af_b = 2 THEN 1 ELSE 0 END)',
            'satisfy_af_c' => 'SUM(CASE WHEN af_c = 2 THEN 1 ELSE 0 END)',
            'satisfy_rao' => 'SUM(CASE WHEN rao = 2 THEN 1 ELSE 0 END)',
        ])
        ->from('financial_claim')
        ->where(['like', 'process_id', '%FCE%', false])
        ->all();
        //END

        //To get the count of each cell of the row in Dissatisfied
        $dissatisfy = (new \yii\db\Query())
        ->select([
            'dissatisfy_raic_a' => 'SUM(CASE WHEN raic_a = 3 THEN 1 ELSE 0 END)',
            'dissatisfy_raic_b' => 'SUM(CASE WHEN raic_b = 3 THEN 1 ELSE 0 END)',
            'dissatisfy_raic_c' => 'SUM(CASE WHEN raic_c = 3 THEN 1 ELSE 0 END)',
            'dissatisfy_raic_d' => 'SUM(CASE WHEN raic_d = 3 THEN 1 ELSE 0 END)',
            'dissatisfy_raic_e' => 'SUM(CASE WHEN raic_e = 3 THEN 1 ELSE 0 END)',
            'dissatisfy_raic_f' => 'SUM(CASE WHEN raic_f = 3 THEN 1 ELSE 0 END)',
            'dissatisfy_af_a' => 'SUM(CASE WHEN af_a = 3 THEN 1 ELSE 0 END)',
            'dissatisfy_af_b' => 'SUM(CASE WHEN af_b = 3 THEN 1 ELSE 0 END)',
            'dissatisfy_af_c' => 'SUM(CASE WHEN af_c = 3 THEN 1 ELSE 0 END)',
            'dissatisfy_rao' => 'SUM(CASE WHEN rao = 3 THEN 1 ELSE 0 END)',
        ])
        ->from('financial_claim')
        ->where(['like', 'process_id', '%FCE%', false])
        ->all();
        //END

        //To get the count of each cell of the row in Very Dissatisfied
        $very_dissatisfy = (new \yii\db\Query())
        ->select([
            'very_dissatisfy_raic_a' => 'SUM(CASE WHEN raic_a = 4 THEN 1 ELSE 0 END)',
            'very_dissatisfy_raic_b' => 'SUM(CASE WHEN raic_b = 4 THEN 1 ELSE 0 END)',
            'very_dissatisfy_raic_c' => 'SUM(CASE WHEN raic_c = 4 THEN 1 ELSE 0 END)',
            'very_dissatisfy_raic_d' => 'SUM(CASE WHEN raic_d = 4 THEN 1 ELSE 0 END)',
            'very_dissatisfy_raic_e' => 'SUM(CASE WHEN raic_e = 4 THEN 1 ELSE 0 END)',
            'very_dissatisfy_raic_f' => 'SUM(CASE WHEN raic_f = 4 THEN 1 ELSE 0 END)',
            'very_dissatisfy_af_a' => 'SUM(CASE WHEN af_a = 4 THEN 1 ELSE 0 END)',
            'very_dissatisfy_af_b' => 'SUM(CASE WHEN af_b = 4 THEN 1 ELSE 0 END)',
            'very_dissatisfy_af_c' => 'SUM(CASE WHEN af_c = 4 THEN 1 ELSE 0 END)',
            'very_dissatisfy_rao' => 'SUM(CASE WHEN rao = 4 THEN 1 ELSE 0 END)',
        ])
        ->from('financial_claim')
        ->where(['like', 'process_id', '%FCE%', false])
        ->all();
        //END

        //To get the count of each cell of the row in No Response
        $no_response = (new \yii\db\Query())
        ->select([
            'no_responses_raic_a' => 'SUM(CASE WHEN raic_a = 5 THEN 1 ELSE 0 END)',
            'no_responses_raic_b' => 'SUM(CASE WHEN raic_b = 5 THEN 1 ELSE 0 END)',
            'no_responses_raic_c' => 'SUM(CASE WHEN raic_c = 5 THEN 1 ELSE 0 END)',
            'no_responses_raic_d' => 'SUM(CASE WHEN raic_d = 5 THEN 1 ELSE 0 END)',
            'no_responses_raic_e' => 'SUM(CASE WHEN raic_e = 5 THEN 1 ELSE 0 END)',
            'no_responses_raic_f' => 'SUM(CASE WHEN raic_f = 5 THEN 1 ELSE 0 END)',
            'no_responses_af_a' => 'SUM(CASE WHEN af_a = 5 THEN 1 ELSE 0 END)',
            'no_responses_af_b' => 'SUM(CASE WHEN af_b = 5 THEN 1 ELSE 0 END)',
            'no_responses_af_c' => 'SUM(CASE WHEN af_c = 5 THEN 1 ELSE 0 END)',
            'no_responses_rao' => 'SUM(CASE WHEN rao = 5 THEN 1 ELSE 0 END)',
        ])
        ->from('financial_claim')
        ->where(['like', 'process_id', '%FCE%', false])
        ->all();
        //END

        //To get the count of each cell of the row in For Validation
        $for_validation = (new \yii\db\Query())
        ->select([
            'for_validation_raic_a' => 'SUM(CASE WHEN raic_a = 6 THEN 1 ELSE 0 END)',
            'for_validation_raic_b' => 'SUM(CASE WHEN raic_b = 6 THEN 1 ELSE 0 END)',
            'for_validation_raic_c' => 'SUM(CASE WHEN raic_c = 6 THEN 1 ELSE 0 END)',
            'for_validation_raic_d' => 'SUM(CASE WHEN raic_d = 6 THEN 1 ELSE 0 END)',
            'for_validation_raic_e' => 'SUM(CASE WHEN raic_e = 6 THEN 1 ELSE 0 END)',
            'for_validation_raic_f' => 'SUM(CASE WHEN raic_f = 6 THEN 1 ELSE 0 END)',
            'for_validation_af_a' => 'SUM(CASE WHEN af_a = 6 THEN 1 ELSE 0 END)',
            'for_validation_af_b' => 'SUM(CASE WHEN af_b = 6 THEN 1 ELSE 0 END)',
            'for_validation_af_c' => 'SUM(CASE WHEN af_c = 6 THEN 1 ELSE 0 END)',
            'for_validation_rao' => 'SUM(CASE WHEN rao = 6 THEN 1 ELSE 0 END)',
        ])
        ->from('financial_claim')
        ->where(['like', 'process_id', '%FCE%', false])
        ->all();
        //END

        //To get the count of each cell of the row in Overall
        $overall = (new \yii\db\Query())
        ->select([
            'overall_very_satisfy' => 'SUM(CASE WHEN ovr = 1 THEN 1 ELSE 0 END)',
            'overall_satisfy' => 'SUM(CASE WHEN ovr = 2 THEN 1 ELSE 0 END)',
            'overall_dissatisfy' => 'SUM(CASE WHEN ovr = 3 THEN 1 ELSE 0 END)',
            'overall_very_dissatisfy' => 'SUM(CASE WHEN ovr = 4 THEN 1 ELSE 0 END)',
            'overall_no_responses' => 'SUM(CASE WHEN ovr = 5 THEN 1 ELSE 0 END)',
            'overall_for_validation' => 'SUM(CASE WHEN ovr = 6 THEN 1 ELSE 0 END)',
        ])
        ->from('financial_claim')
        ->where(['like', 'process_id', '%FCE%', false])
        ->one();
        //END


        //To ge the total response total count of the response
            $total_count = (new \yii\db\Query())
            ->select(['COUNT(*) as total_count'])
            ->from('financial_claim')
            ->where(['like', 'process_id', '%FCE%', false])
            ->scalar();
        //END

        //OVERALL PMT 

        //Average and Percentage of Very Satisfy
        $total_sum_very_satisfy = 0;
        foreach ($very_satisfy as $row) {
            foreach ($row as $count) {
                $total_sum_very_satisfy += $count;
            }
        }

        $num_columns = count($very_satisfy[0]);
        $average = $total_sum_very_satisfy / $num_columns;

        $percentage_very_satisfy = round(($average / $total_count) * 100);
        //End

        //Average and Percentage of Satisfy

        $total_sum_satisfy = 0;
        foreach ($satisfy as $row) {
            foreach ($row as $count) {
                $total_sum_satisfy += $count;
            }
        }

        $average_satisfy = $total_sum_satisfy / $num_columns;

        $percentage_satisfy = round(($average_satisfy / $total_count) * 100);
        
        //End

        //Average and Percentage of Dissatisfied

        $total_sum_dissatisfy = 0;
        foreach ($dissatisfy as $row) {
            foreach ($row as $count) {
                $total_sum_dissatisfy += $count;
            }
        }

        $average_dissatisfy = $total_sum_dissatisfy / $num_columns;

        $percentage_dissatisfy = round(($average_dissatisfy / $total_count) * 100);
        
        //End

        //Average and Percentage of Very Dissatisfied

        $total_sum_very_dissatisfy = 0;
        foreach ($very_dissatisfy as $row) {
            foreach ($row as $count) {
                $total_sum_very_dissatisfy += $count;
            }
        }

        $average_very_dissatisfy = $total_sum_very_dissatisfy / $num_columns;

        $percentage_very_dissatisfy = intval(($average_very_dissatisfy / $total_count) * 100);
        
        //End

        //Average and Percentage of No Responses

        $total_sum_no_response = 0;
        foreach ($no_response as $row) {
            foreach ($row as $count) {
                $total_sum_no_response += $count;
            }
        }

        $average_no_response = $total_sum_no_response / $num_columns;

        $percentage_no_response = round(($average_no_response / $total_count) * 100);
        
        //End

        //Average and Percentage of For Validation

        $total_sum_for_validation = 0;
        foreach ($for_validation as $row) {
            foreach ($row as $count) {
                $total_sum_for_validation += $count;
            }
        }

        $average_for_validation = $total_sum_for_validation / $num_columns;

        $percentage_for_validation = round(($average_for_validation / $total_count) * 100);
        
        //End

        //END

        //To get the Satisfaction(%)

        // Define an array to hold satisfaction values for each column
        $satisfaction = [];

        // Define the columns to iterate over
        $columns = ['raic_a', 'raic_b', 'raic_c', 'raic_d', 'raic_e', 'raic_f',
                    'af_a', 'af_b', 'af_c', 'rao'];

        // Loop over each column
        foreach ($columns as $column) {
            // Initialize variables for very satisfaction and satisfaction for current column
            $satisfaction_very_satisfy = 0;
            $satisfaction_satisfy = 0;
            // Get very satisfaction count from $results
            foreach ($very_satisfy as $data) {
                $satisfaction_very_satisfy += $data["very_satisfy_$column"];
            }
            // Get satisfaction count from $data_satisfy
            foreach ($satisfy as $data) {
                $satisfaction_satisfy += $data["satisfy_$column"];
            }
            // Calculate satisfaction percentage for current column
            $satisfaction[$column] = round(($satisfaction_very_satisfy + $satisfaction_satisfy) / $total_count * 100);
        }

        //END

        //CSF SCORE

        $score = [];
        $result = [];

        foreach ($columns as $category) {
            $score[$category] = $this->calcu_satisfaction($category, $very_satisfy, $satisfy, $dissatisfy, $very_dissatisfy, $no_response, $for_validation, $total_count); 
        }

        $result = array_map('floatval', $score);

        $ratings = [];
        
        //CSF RATING
        foreach($result as $category => $value)
        {
            $rating = ($value / 4) * 100;
            $ratings[$category] = $rating;
        }

        //END

        //(ARTA) QUALITY DIMENSION

        $responsiveness = round(($score['raic_e'] + $score['raic_f']) / 2, 2);
        $assurance = round(($score['raic_c'] + $score['raic_d']) / 2, 2);
        $integrity = $score['raic_b'];
        $realibility = $score['rao'];
        $outcome = $score['rao'];
        $communication = $score['raic_a'];
        $access_facilities = round(($score['af_a'] + $score['af_b'] + $score['af_c']) / 3, 2);

        $overall_ave = round(($responsiveness + $assurance + $integrity + $realibility + $outcome + $communication + $access_facilities) / 7, 2);
        $overall_rating = ($overall_ave / 4) * 100;

        //END

        //(ARTA) OVERALL SATISFACTION

        $overall_satisfaction_calculation = [
            'overall_very_satisfy_result' => round(($overall['overall_very_satisfy'] / $total_count) * 100, 2),
            'overall_satisfy_result' => round(($overall['overall_satisfy'] / $total_count) * 100, 2),
            'overall_dissatisfy_result' => round(($overall['overall_dissatisfy'] / $total_count) * 100, 2),
            'overall_very_dissatisfy_result' => round(($overall['overall_very_dissatisfy'] / $total_count) * 100, 2),
        ];

        $total_overall_satisfaction = array_sum($overall_satisfaction_calculation);
        $satisfaction_level = $overall_satisfaction_calculation['overall_very_satisfy_result'] + $overall_satisfaction_calculation['overall_satisfy_result'];

        //END

        //(ARTA) DIMENSION (% SATISFACTION)

        $responsiveness_satisfaction = ($satisfaction['raic_e'] + $satisfaction['raic_f']) / 2;
        $assurance_satisfaction = ($satisfaction['raic_c'] + $satisfaction['raic_d']) / 2;
        $integrity_satisfaction = $satisfaction['raic_b'];
        $realibility_satisfaction = $satisfaction['rao'];
        $access_facilities_satisfaction = ($satisfaction['af_a'] + $satisfaction['af_b'] + $satisfaction['af_c']) / 3;
        
        $overall_ave_satisfaction = round(($responsiveness_satisfaction + $assurance_satisfaction + $integrity_satisfaction + $access_facilities_satisfaction) / 4, 2);
        
        //END

        //SEX DISAGGREGATE
        $count_sex = (new \yii\db\Query())
        ->select([
            'count_male' => 'SUM(CASE WHEN sex = 4 THEN 1 ELSE 0 END)',
            'count_female' => 'SUM(CASE WHEN sex = 5 THEN 1 ELSE 0 END)',
        ])
        ->from('csf')
        ->where(['like', 'id', '%FCE%', false])
        ->one();

        $count_male = $count_sex['count_male'];
        $count_female = $count_sex['count_female'];


        $total_sex = $count_male + $count_female;

        $male_percent = round(($count_male / $total_sex) * 100);
        $female_percent = round(($count_female / $total_sex) * 100);

        $total_sex_percent = $male_percent + $female_percent;

        //END

        return $this->renderPartial('financial-tabulation', [
            'model' => $model,
            'very_satisfy' => $very_satisfy,
            'satisfy' => $satisfy,
            'dissatisfy' => $dissatisfy,
            'very_dissatisfy' => $very_dissatisfy,
            'no_response' => $no_response,
            'for_validation' => $for_validation,
            'total_count' => $total_count,
            'percentage_very_satisfy' => $percentage_very_satisfy,
            'percentage_satisfy' => $percentage_satisfy,
            'percentage_dissatisfy' => $percentage_dissatisfy,
            'percentage_very_dissatisfy' => $percentage_very_dissatisfy,
            'percentage_for_validation' => $percentage_for_validation,
            'percentage_no_response' => $percentage_no_response,
            'satisfaction' => $satisfaction,
            'score' => $score,
            'ratings' => $ratings,
            'responsiveness' => $responsiveness,
            'assurance' => $assurance,
            'integrity' => $integrity,
            'realibility' => $realibility,
            'outcome' => $outcome,
            'communication' => $communication,
            'access_facilities' => $access_facilities,
            'overall_ave' => $overall_ave,
            'overall_rating' => $overall_rating,
            'overall_satisfaction_calculation' => $overall_satisfaction_calculation,
            'total_overall_satisfaction' => $total_overall_satisfaction,
            'satisfaction_level' => $satisfaction_level,
            'responsiveness_satisfaction' => $responsiveness_satisfaction,
            'assurance_satisfaction' => $assurance_satisfaction,
            'integrity_satisfaction' => $integrity_satisfaction,
            'realibility_satisfaction' => $realibility_satisfaction,
            'access_facilities_satisfaction' => $access_facilities_satisfaction,
            'overall_ave_satisfaction' => $overall_ave_satisfaction,
            'count_male' => $count_male,
            'count_female' => $count_female,
            'total_sex' => $total_sex,
            'male_percent' => $male_percent,
            'female_percent' => $female_percent,
            'total_sex_percent' => $total_sex_percent,
        ]);
    }

    private function calcu_satisfaction($columns, $very_satisfy, $satisfy, $dissatisfy, $very_dissatisfy, $no_response, $for_validation, $total_count){
        $satisfaction_very_satisfy = array_sum(array_column($very_satisfy, "very_satisfy_$columns"));
        $satisfaction_satisfy = array_sum(array_column($satisfy, "satisfy_$columns"));
        $satisfaction_dissatisfy = array_sum(array_column($dissatisfy, "dissatisfy_$columns"));
        $satisfaction_very_dissatisfy = array_sum(array_column($very_dissatisfy, "very_dissatisfy_$columns"));
        $satisfaction_no_respone = array_sum(array_column($no_response, "no_response_$columns"));
        $satisfaction_for_validation = array_sum(array_column($for_validation, "for_validation_$columns"));

        $score = round((($satisfaction_very_satisfy * 4) + ($satisfaction_satisfy * 3) + ($satisfaction_dissatisfy * 2) + ($satisfaction_very_dissatisfy * 1) - ($satisfaction_no_respone) - ($satisfaction_for_validation)) / $total_count, 2);

        return $score;
    }

    public function actionFinancialInternalTabulation()
    {

            $very_satisfy = (new \yii\db\Query())
        ->select([
            'very_satisfy_raic_a' => 'SUM(CASE WHEN raic_a = 1 THEN 1 ELSE 0 END)',
            'very_satisfy_raic_b' => 'SUM(CASE WHEN raic_b = 1 THEN 1 ELSE 0 END)',
            'very_satisfy_raic_c' => 'SUM(CASE WHEN raic_c = 1 THEN 1 ELSE 0 END)',
            'very_satisfy_raic_d' => 'SUM(CASE WHEN raic_d = 1 THEN 1 ELSE 0 END)',
            'very_satisfy_raic_e' => 'SUM(CASE WHEN raic_e = 1 THEN 1 ELSE 0 END)',
            'very_satisfy_raic_f' => 'SUM(CASE WHEN raic_f = 1 THEN 1 ELSE 0 END)',
            'very_satisfy_af_a' => 'SUM(CASE WHEN af_a = 1 THEN 1 ELSE 0 END)',
            'very_satisfy_af_b' => 'SUM(CASE WHEN af_b = 1 THEN 1 ELSE 0 END)',
            'very_satisfy_af_c' => 'SUM(CASE WHEN af_c = 1 THEN 1 ELSE 0 END)',
            'very_satisfy_rao' => 'SUM(CASE WHEN rao = 1 THEN 1 ELSE 0 END)',
        ])
        ->from('financial_claim')
        ->where(['like', 'process_id', '%FCI%', false])
        ->all();
        //END

        //To get the count of each cell of the row in Satisfied
        $satisfy = (new \yii\db\Query())
        ->select([
            'satisfy_raic_a' => 'SUM(CASE WHEN raic_a = 2 THEN 1 ELSE 0 END)',
            'satisfy_raic_b' => 'SUM(CASE WHEN raic_b = 2 THEN 1 ELSE 0 END)',
            'satisfy_raic_c' => 'SUM(CASE WHEN raic_c = 2 THEN 1 ELSE 0 END)',
            'satisfy_raic_d' => 'SUM(CASE WHEN raic_d = 2 THEN 1 ELSE 0 END)',
            'satisfy_raic_e' => 'SUM(CASE WHEN raic_e = 2 THEN 1 ELSE 0 END)',
            'satisfy_raic_f' => 'SUM(CASE WHEN raic_f = 2 THEN 1 ELSE 0 END)',
            'satisfy_af_a' => 'SUM(CASE WHEN af_a = 2 THEN 1 ELSE 0 END)',
            'satisfy_af_b' => 'SUM(CASE WHEN af_b = 2 THEN 1 ELSE 0 END)',
            'satisfy_af_c' => 'SUM(CASE WHEN af_c = 2 THEN 1 ELSE 0 END)',
            'satisfy_rao' => 'SUM(CASE WHEN rao = 2 THEN 1 ELSE 0 END)',
        ])
        ->from('financial_claim')
        ->where(['like', 'process_id', '%FCI%', false])
        ->all();
        //END

        //To get the count of each cell of the row in Dissatisfied
        $dissatisfy = (new \yii\db\Query())
        ->select([
            'dissatisfy_raic_a' => 'SUM(CASE WHEN raic_a = 3 THEN 1 ELSE 0 END)',
            'dissatisfy_raic_b' => 'SUM(CASE WHEN raic_b = 3 THEN 1 ELSE 0 END)',
            'dissatisfy_raic_c' => 'SUM(CASE WHEN raic_c = 3 THEN 1 ELSE 0 END)',
            'dissatisfy_raic_d' => 'SUM(CASE WHEN raic_d = 3 THEN 1 ELSE 0 END)',
            'dissatisfy_raic_e' => 'SUM(CASE WHEN raic_e = 3 THEN 1 ELSE 0 END)',
            'dissatisfy_raic_f' => 'SUM(CASE WHEN raic_f = 3 THEN 1 ELSE 0 END)',
            'dissatisfy_af_a' => 'SUM(CASE WHEN af_a = 3 THEN 1 ELSE 0 END)',
            'dissatisfy_af_b' => 'SUM(CASE WHEN af_b = 3 THEN 1 ELSE 0 END)',
            'dissatisfy_af_c' => 'SUM(CASE WHEN af_c = 3 THEN 1 ELSE 0 END)',
            'dissatisfy_rao' => 'SUM(CASE WHEN rao = 3 THEN 1 ELSE 0 END)',
        ])
        ->from('financial_claim')
        ->where(['like', 'process_id', '%FCI%', false])
        ->all();
        //END

        //To get the count of each cell of the row in Very Dissatisfied
        $very_dissatisfy = (new \yii\db\Query())
        ->select([
            'very_dissatisfy_raic_a' => 'SUM(CASE WHEN raic_a = 4 THEN 1 ELSE 0 END)',
            'very_dissatisfy_raic_b' => 'SUM(CASE WHEN raic_b = 4 THEN 1 ELSE 0 END)',
            'very_dissatisfy_raic_c' => 'SUM(CASE WHEN raic_c = 4 THEN 1 ELSE 0 END)',
            'very_dissatisfy_raic_d' => 'SUM(CASE WHEN raic_d = 4 THEN 1 ELSE 0 END)',
            'very_dissatisfy_raic_e' => 'SUM(CASE WHEN raic_e = 4 THEN 1 ELSE 0 END)',
            'very_dissatisfy_raic_f' => 'SUM(CASE WHEN raic_f = 4 THEN 1 ELSE 0 END)',
            'very_dissatisfy_af_a' => 'SUM(CASE WHEN af_a = 4 THEN 1 ELSE 0 END)',
            'very_dissatisfy_af_b' => 'SUM(CASE WHEN af_b = 4 THEN 1 ELSE 0 END)',
            'very_dissatisfy_af_c' => 'SUM(CASE WHEN af_c = 4 THEN 1 ELSE 0 END)',
            'very_dissatisfy_rao' => 'SUM(CASE WHEN rao = 4 THEN 1 ELSE 0 END)',
        ])
        ->from('financial_claim')
        ->where(['like', 'process_id', '%FCI%', false])
        ->all();
        //END

        //To get the count of each cell of the row in No Response
        $no_response = (new \yii\db\Query())
        ->select([
            'no_responses_raic_a' => 'SUM(CASE WHEN raic_a = 5 THEN 1 ELSE 0 END)',
            'no_responses_raic_b' => 'SUM(CASE WHEN raic_b = 5 THEN 1 ELSE 0 END)',
            'no_responses_raic_c' => 'SUM(CASE WHEN raic_c = 5 THEN 1 ELSE 0 END)',
            'no_responses_raic_d' => 'SUM(CASE WHEN raic_d = 5 THEN 1 ELSE 0 END)',
            'no_responses_raic_e' => 'SUM(CASE WHEN raic_e = 5 THEN 1 ELSE 0 END)',
            'no_responses_raic_f' => 'SUM(CASE WHEN raic_f = 5 THEN 1 ELSE 0 END)',
            'no_responses_af_a' => 'SUM(CASE WHEN af_a = 5 THEN 1 ELSE 0 END)',
            'no_responses_af_b' => 'SUM(CASE WHEN af_b = 5 THEN 1 ELSE 0 END)',
            'no_responses_af_c' => 'SUM(CASE WHEN af_c = 5 THEN 1 ELSE 0 END)',
            'no_responses_rao' => 'SUM(CASE WHEN rao = 5 THEN 1 ELSE 0 END)',
        ])
        ->from('financial_claim')
        ->where(['like', 'process_id', '%FCI%', false])
        ->all();
        //END

        //To get the count of each cell of the row in For Validation
        $for_validation = (new \yii\db\Query())
        ->select([
            'for_validation_raic_a' => 'SUM(CASE WHEN raic_a = 6 THEN 1 ELSE 0 END)',
            'for_validation_raic_b' => 'SUM(CASE WHEN raic_b = 6 THEN 1 ELSE 0 END)',
            'for_validation_raic_c' => 'SUM(CASE WHEN raic_c = 6 THEN 1 ELSE 0 END)',
            'for_validation_raic_d' => 'SUM(CASE WHEN raic_d = 6 THEN 1 ELSE 0 END)',
            'for_validation_raic_e' => 'SUM(CASE WHEN raic_e = 6 THEN 1 ELSE 0 END)',
            'for_validation_raic_f' => 'SUM(CASE WHEN raic_f = 6 THEN 1 ELSE 0 END)',
            'for_validation_af_a' => 'SUM(CASE WHEN af_a = 6 THEN 1 ELSE 0 END)',
            'for_validation_af_b' => 'SUM(CASE WHEN af_b = 6 THEN 1 ELSE 0 END)',
            'for_validation_af_c' => 'SUM(CASE WHEN af_c = 6 THEN 1 ELSE 0 END)',
            'for_validation_rao' => 'SUM(CASE WHEN rao = 6 THEN 1 ELSE 0 END)',
        ])
        ->from('financial_claim')
        ->where(['like', 'process_id', '%FCI%', false])
        ->all();
        //END

        //To get the count of each cell of the row in Overall
        $overall = (new \yii\db\Query())
        ->select([
            'overall_very_satisfy' => 'SUM(CASE WHEN ovr = 1 THEN 1 ELSE 0 END)',
            'overall_satisfy' => 'SUM(CASE WHEN ovr = 2 THEN 1 ELSE 0 END)',
            'overall_dissatisfy' => 'SUM(CASE WHEN ovr = 3 THEN 1 ELSE 0 END)',
            'overall_very_dissatisfy' => 'SUM(CASE WHEN ovr = 4 THEN 1 ELSE 0 END)',
            'overall_no_responses' => 'SUM(CASE WHEN ovr = 5 THEN 1 ELSE 0 END)',
            'overall_for_validation' => 'SUM(CASE WHEN ovr = 6 THEN 1 ELSE 0 END)',
        ])
        ->from('financial_claim')
        ->where(['like', 'process_id', '%FCI%', false])
        ->one();
        //END


        //To ge the total response total count of the response
            $total_count = (new \yii\db\Query())
            ->select(['COUNT(*) as total_count'])
            ->from('financial_claim')
            ->where(['like', 'process_id', '%FCI%', false])
            ->scalar();
        //END

        //OVERALL PMT 

        //Average and Percentage of Very Satisfy
        $total_sum_very_satisfy = 0;
        foreach ($very_satisfy as $row) {
            foreach ($row as $count) {
                $total_sum_very_satisfy += $count;
            }
        }

        $num_columns = count($very_satisfy[0]);
        $average = $total_sum_very_satisfy / $num_columns;

        $percentage_very_satisfy = round(($average / $total_count) * 100);
        //End

        //Average and Percentage of Satisfy
        
        $total_sum_satisfy = 0;
        foreach ($satisfy as $row) {
            foreach ($row as $count) {
                $total_sum_satisfy += $count;
            }
        }

        $average_satisfy = $total_sum_satisfy / $num_columns;

        $percentage_satisfy = round(($average_satisfy / $total_count) * 100);
        
        //End

        //Average and Percentage of Dissatisfied

        $total_sum_dissatisfy = 0;
        foreach ($dissatisfy as $row) {
            foreach ($row as $count) {
                $total_sum_dissatisfy += $count;
            }
        }

        $average_dissatisfy = $total_sum_dissatisfy / $num_columns;

        $percentage_dissatisfy = round(($average_dissatisfy / $total_count) * 100);
        
        //End

        //Average and Percentage of Very Dissatisfied

        $total_sum_very_dissatisfy = 0;
        foreach ($very_dissatisfy as $row) {
            foreach ($row as $count) {
                $total_sum_very_dissatisfy += $count;
            }
        }

        $average_very_dissatisfy = $total_sum_very_dissatisfy / $num_columns;

        $percentage_very_dissatisfy = intval(($average_very_dissatisfy / $total_count) * 100);
        
        //End

        //Average and Percentage of No Responses

        $total_sum_no_response = 0;
        foreach ($no_response as $row) {
            foreach ($row as $count) {
                $total_sum_no_response += $count;
            }
        }

        $average_no_response = $total_sum_no_response / $num_columns;

        $percentage_no_response = round(($average_no_response / $total_count) * 100);
        
        //End

        //Average and Percentage of For Validation

        $total_sum_for_validation = 0;
        foreach ($for_validation as $row) {
            foreach ($row as $count) {
                $total_sum_for_validation += $count;
            }
        }

        $average_for_validation = $total_sum_for_validation / $num_columns;

        $percentage_for_validation = round(($average_for_validation / $total_count) * 100);
        
        //End

        //END

        //To get the Satisfaction(%)

        // Define an array to hold satisfaction values for each column
        $satisfaction = [];

        // Define the columns to iterate over
        $columns = ['raic_a', 'raic_b', 'raic_c', 'raic_d', 'raic_e', 'raic_f',
                    'af_a', 'af_b', 'af_c', 'rao'];

        // Loop over each column
        foreach ($columns as $column) {
            // Initialize variables for very satisfaction and satisfaction for current column
            $satisfaction_very_satisfy = 0;
            $satisfaction_satisfy = 0;
            // Get very satisfaction count from $results
            foreach ($very_satisfy as $data) {
                $satisfaction_very_satisfy += $data["very_satisfy_$column"];
            }
            // Get satisfaction count from $data_satisfy
            foreach ($satisfy as $data) {
                $satisfaction_satisfy += $data["satisfy_$column"];
            }
            // Calculate satisfaction percentage for current column
            $satisfaction[$column] = round(($satisfaction_very_satisfy + $satisfaction_satisfy) / $total_count * 100);
        }

        //END

        //CSF SCORE

        $score = [];
        $result = [];

        foreach ($columns as $category) {
            $score[$category] = $this->calcu_satisfaction($category, $very_satisfy, $satisfy, $dissatisfy, $very_dissatisfy, $no_response, $for_validation, $total_count); 
        }

        $result = array_map('floatval', $score);

        $ratings = [];
        
        foreach($result as $category => $value)
        {
            $rating = ($value / 4) * 100;
            $ratings[$category] = $rating;
        }

        //END

        //(ARTA) QUALITY DIMENSION

        $responsiveness = round(($score['raic_e'] + $score['raic_f']) / 2, 2);
        $assurance = round(($score['raic_c'] + $score['raic_d']) / 2, 2);
        $integrity = $score['raic_b'];
        $realibility = $score['rao'];
        $outcome = $score['rao'];
        $communication = $score['raic_a'];
        $access_facilities = round(($score['af_a'] + $score['af_b'] + $score['af_c']) / 3, 2);

        $overall_ave = round(($responsiveness + $assurance + $integrity + $realibility + $outcome + $communication + $access_facilities) / 7, 2);
        $overall_rating = ($overall_ave / 4) * 100;

        //END

        //(ARTA) DIMENSION (% SATISFACTION

        $responsiveness_satisfaction = ($satisfaction['raic_e'] + $satisfaction['raic_f']) / 2;
        $assurance_satisfaction = ($satisfaction['raic_c'] + $satisfaction['raic_d']) / 2;
        $integrity_satisfaction = $satisfaction['raic_b'];
        $realibility_satisfaction = $satisfaction['rao'];
        $outcome_satisfaction = $satisfaction['rao'];
        $communication_satisfaction = $satisfaction['raic_a'];
        $access_facilities_satisfaction = ($satisfaction['af_a'] + $satisfaction['af_b'] + $satisfaction['af_c']) / 3;
        
        $overall_ave_satisfaction = round(($responsiveness_satisfaction + $assurance_satisfaction + $integrity_satisfaction + $communication_satisfaction + $communication_satisfaction + $access_facilities_satisfaction) / 7, 2);
        
        //END

        //SEX DISAGGREGATE

        $count_sex = (new \yii\db\Query())
        ->select([
            'count_male' => 'SUM(CASE WHEN sex = 4 THEN 1 ELSE 0 END)',
            'count_female' => 'SUM(CASE WHEN sex = 5 THEN 1 ELSE 0 END)',
        ])
        ->from('csf')
        ->where(['like', 'id', '%FCI%', false])
        ->one();

        $count_male = $count_sex['count_male'];
        $count_female = $count_sex['count_female'];


        $total_sex = $count_male + $count_female;

        $male_percent = round(($count_male / $total_sex) * 100);
        $female_percent = round(($count_female / $total_sex) * 100);

        $total_sex_percent = $male_percent + $female_percent;

        //END


        return $this->renderPartial('financial-internal-tabulation', [
            'very_satisfy' => $very_satisfy,
            'satisfy' => $satisfy,
            'dissatisfy' => $dissatisfy,
            'very_dissatisfy' => $very_dissatisfy,
            'no_response' => $no_response,
            'for_validation' => $for_validation,
            'total_count' => $total_count,
            'percentage_very_satisfy' => $percentage_very_satisfy,
            'percentage_satisfy' => $percentage_satisfy,
            'percentage_dissatisfy' => $percentage_dissatisfy,
            'percentage_very_dissatisfy' => $percentage_very_dissatisfy,
            'percentage_for_validation' => $percentage_for_validation,
            'percentage_no_response' => $percentage_no_response,
            'satisfaction' => $satisfaction,
            'score' => $score,
            'ratings' => $ratings,
            'responsiveness' => $responsiveness,
            'assurance' => $assurance,
            'integrity' => $integrity,
            'realibility' => $realibility,
            'outcome' => $outcome,
            'communication' => $communication,
            'access_facilities' => $access_facilities,
            'overall_ave' => $overall_ave,
            'overall_rating' => $overall_rating,
            'responsiveness_satisfaction' => $responsiveness_satisfaction,
            'assurance_satisfaction' => $assurance_satisfaction,
            'integrity_satisfaction' => $integrity_satisfaction,
            'realibility_satisfaction' => $realibility_satisfaction,
            'access_facilities_satisfaction' => $access_facilities_satisfaction,
            'overall_ave_satisfaction' => $overall_ave_satisfaction,
            'outcome_satisfaction' => $outcome_satisfaction,
            'communication_satisfaction' => $communication_satisfaction,
            'count_male' => $count_male,
            'count_female' => $count_female,
            'total_sex' => $total_sex,
            'male_percent' => $male_percent,
            'female_percent' => $female_percent,
            'total_sex_percent' => $total_sex_percent,
        ]);
    }

    public function actionFinancialOnlineTabulation()
    {
        $very_satisfy = (new \yii\db\Query())
        ->select([
            'very_satisfy_raic_a' => 'SUM(CASE WHEN raic_a = 1 THEN 1 ELSE 0 END)',
            'very_satisfy_raic_b' => 'SUM(CASE WHEN raic_b = 1 THEN 1 ELSE 0 END)',
            'very_satisfy_raic_c' => 'SUM(CASE WHEN raic_c = 1 THEN 1 ELSE 0 END)',
            'very_satisfy_raic_d' => 'SUM(CASE WHEN raic_d = 1 THEN 1 ELSE 0 END)',
            'very_satisfy_raic_e' => 'SUM(CASE WHEN raic_e = 1 THEN 1 ELSE 0 END)',
            'very_satisfy_raic_f' => 'SUM(CASE WHEN raic_f = 1 THEN 1 ELSE 0 END)',
            'very_satisfy_af_a' => 'SUM(CASE WHEN af_a = 1 THEN 1 ELSE 0 END)',
            'very_satisfy_af_b' => 'SUM(CASE WHEN af_b = 1 THEN 1 ELSE 0 END)',
            'very_satisfy_af_c' => 'SUM(CASE WHEN af_c = 1 THEN 1 ELSE 0 END)',
            'very_satisfy_rao' => 'SUM(CASE WHEN rao = 1 THEN 1 ELSE 0 END)',
        ])
        ->from('financial_claim')
        ->where(['like', 'process_id', '%FCO%', false])
        ->all();
        //END

        //To get the count of each cell of the row in Satisfied
        $satisfy = (new \yii\db\Query())
        ->select([
            'satisfy_raic_a' => 'SUM(CASE WHEN raic_a = 2 THEN 1 ELSE 0 END)',
            'satisfy_raic_b' => 'SUM(CASE WHEN raic_b = 2 THEN 1 ELSE 0 END)',
            'satisfy_raic_c' => 'SUM(CASE WHEN raic_c = 2 THEN 1 ELSE 0 END)',
            'satisfy_raic_d' => 'SUM(CASE WHEN raic_d = 2 THEN 1 ELSE 0 END)',
            'satisfy_raic_e' => 'SUM(CASE WHEN raic_e = 2 THEN 1 ELSE 0 END)',
            'satisfy_raic_f' => 'SUM(CASE WHEN raic_f = 2 THEN 1 ELSE 0 END)',
            'satisfy_af_a' => 'SUM(CASE WHEN af_a = 2 THEN 1 ELSE 0 END)',
            'satisfy_af_b' => 'SUM(CASE WHEN af_b = 2 THEN 1 ELSE 0 END)',
            'satisfy_af_c' => 'SUM(CASE WHEN af_c = 2 THEN 1 ELSE 0 END)',
            'satisfy_rao' => 'SUM(CASE WHEN rao = 2 THEN 1 ELSE 0 END)',
        ])
        ->from('financial_claim')
        ->where(['like', 'process_id', '%FCO%', false])
        ->all();
        //END

        //To get the count of each cell of the row in Dissatisfied
        $dissatisfy = (new \yii\db\Query())
        ->select([
            'dissatisfy_raic_a' => 'SUM(CASE WHEN raic_a = 3 THEN 1 ELSE 0 END)',
            'dissatisfy_raic_b' => 'SUM(CASE WHEN raic_b = 3 THEN 1 ELSE 0 END)',
            'dissatisfy_raic_c' => 'SUM(CASE WHEN raic_c = 3 THEN 1 ELSE 0 END)',
            'dissatisfy_raic_d' => 'SUM(CASE WHEN raic_d = 3 THEN 1 ELSE 0 END)',
            'dissatisfy_raic_e' => 'SUM(CASE WHEN raic_e = 3 THEN 1 ELSE 0 END)',
            'dissatisfy_raic_f' => 'SUM(CASE WHEN raic_f = 3 THEN 1 ELSE 0 END)',
            'dissatisfy_af_a' => 'SUM(CASE WHEN af_a = 3 THEN 1 ELSE 0 END)',
            'dissatisfy_af_b' => 'SUM(CASE WHEN af_b = 3 THEN 1 ELSE 0 END)',
            'dissatisfy_af_c' => 'SUM(CASE WHEN af_c = 3 THEN 1 ELSE 0 END)',
            'dissatisfy_rao' => 'SUM(CASE WHEN rao = 3 THEN 1 ELSE 0 END)',
        ])
        ->from('financial_claim')
        ->where(['like', 'process_id', '%FCO%', false])
        ->all();
        //END

        //To get the count of each cell of the row in Very Dissatisfied
        $very_dissatisfy = (new \yii\db\Query())
        ->select([
            'very_dissatisfy_raic_a' => 'SUM(CASE WHEN raic_a = 4 THEN 1 ELSE 0 END)',
            'very_dissatisfy_raic_b' => 'SUM(CASE WHEN raic_b = 4 THEN 1 ELSE 0 END)',
            'very_dissatisfy_raic_c' => 'SUM(CASE WHEN raic_c = 4 THEN 1 ELSE 0 END)',
            'very_dissatisfy_raic_d' => 'SUM(CASE WHEN raic_d = 4 THEN 1 ELSE 0 END)',
            'very_dissatisfy_raic_e' => 'SUM(CASE WHEN raic_e = 4 THEN 1 ELSE 0 END)',
            'very_dissatisfy_raic_f' => 'SUM(CASE WHEN raic_f = 4 THEN 1 ELSE 0 END)',
            'very_dissatisfy_af_a' => 'SUM(CASE WHEN af_a = 4 THEN 1 ELSE 0 END)',
            'very_dissatisfy_af_b' => 'SUM(CASE WHEN af_b = 4 THEN 1 ELSE 0 END)',
            'very_dissatisfy_af_c' => 'SUM(CASE WHEN af_c = 4 THEN 1 ELSE 0 END)',
            'very_dissatisfy_rao' => 'SUM(CASE WHEN rao = 4 THEN 1 ELSE 0 END)',
        ])
        ->from('financial_claim')
        ->where(['like', 'process_id', '%FCO%', false])
        ->all();
        //END

        //To get the count of each cell of the row in No Response
        $no_response = (new \yii\db\Query())
        ->select([
            'no_responses_raic_a' => 'SUM(CASE WHEN raic_a = 5 THEN 1 ELSE 0 END)',
            'no_responses_raic_b' => 'SUM(CASE WHEN raic_b = 5 THEN 1 ELSE 0 END)',
            'no_responses_raic_c' => 'SUM(CASE WHEN raic_c = 5 THEN 1 ELSE 0 END)',
            'no_responses_raic_d' => 'SUM(CASE WHEN raic_d = 5 THEN 1 ELSE 0 END)',
            'no_responses_raic_e' => 'SUM(CASE WHEN raic_e = 5 THEN 1 ELSE 0 END)',
            'no_responses_raic_f' => 'SUM(CASE WHEN raic_f = 5 THEN 1 ELSE 0 END)',
            'no_responses_af_a' => 'SUM(CASE WHEN af_a = 5 THEN 1 ELSE 0 END)',
            'no_responses_af_b' => 'SUM(CASE WHEN af_b = 5 THEN 1 ELSE 0 END)',
            'no_responses_af_c' => 'SUM(CASE WHEN af_c = 5 THEN 1 ELSE 0 END)',
            'no_responses_rao' => 'SUM(CASE WHEN rao = 5 THEN 1 ELSE 0 END)',
        ])
        ->from('financial_claim')
        ->where(['like', 'process_id', '%FCO%', false])
        ->all();
        //END

        //To get the count of each cell of the row in For Validation
        $for_validation = (new \yii\db\Query())
        ->select([
            'for_validation_raic_a' => 'SUM(CASE WHEN raic_a = 6 THEN 1 ELSE 0 END)',
            'for_validation_raic_b' => 'SUM(CASE WHEN raic_b = 6 THEN 1 ELSE 0 END)',
            'for_validation_raic_c' => 'SUM(CASE WHEN raic_c = 6 THEN 1 ELSE 0 END)',
            'for_validation_raic_d' => 'SUM(CASE WHEN raic_d = 6 THEN 1 ELSE 0 END)',
            'for_validation_raic_e' => 'SUM(CASE WHEN raic_e = 6 THEN 1 ELSE 0 END)',
            'for_validation_raic_f' => 'SUM(CASE WHEN raic_f = 6 THEN 1 ELSE 0 END)',
            'for_validation_af_a' => 'SUM(CASE WHEN af_a = 6 THEN 1 ELSE 0 END)',
            'for_validation_af_b' => 'SUM(CASE WHEN af_b = 6 THEN 1 ELSE 0 END)',
            'for_validation_af_c' => 'SUM(CASE WHEN af_c = 6 THEN 1 ELSE 0 END)',
            'for_validation_rao' => 'SUM(CASE WHEN rao = 6 THEN 1 ELSE 0 END)',
        ])
        ->from('financial_claim')
        ->where(['like', 'process_id', '%FCO%', false])
        ->all();
        //END

        //To get the count of each cell of the row in Overall
        $overall = (new \yii\db\Query())
        ->select([
            'overall_very_satisfy' => 'SUM(CASE WHEN ovr = 1 THEN 1 ELSE 0 END)',
            'overall_satisfy' => 'SUM(CASE WHEN ovr = 2 THEN 1 ELSE 0 END)',
            'overall_dissatisfy' => 'SUM(CASE WHEN ovr = 3 THEN 1 ELSE 0 END)',
            'overall_very_dissatisfy' => 'SUM(CASE WHEN ovr = 4 THEN 1 ELSE 0 END)',
            'overall_no_responses' => 'SUM(CASE WHEN ovr = 5 THEN 1 ELSE 0 END)',
            'overall_for_validation' => 'SUM(CASE WHEN ovr = 6 THEN 1 ELSE 0 END)',
        ])
        ->from('financial_claim')
        ->where(['like', 'process_id', '%FCO%', false])
        ->one();
        //END


        //To ge the total response total count of the response
            $total_count = (new \yii\db\Query())
            ->select(['COUNT(*) as total_count'])
            ->from('financial_claim')
            ->where(['like', 'process_id', '%FCO%', false])
            ->scalar();
        //END

        //OVERALL PMT 

        //Average and Percentage of Very Satisfy
        $total_sum_very_satisfy = 0;
        foreach ($very_satisfy as $row) {
            foreach ($row as $count) {
                $total_sum_very_satisfy += $count;
            }
        }

        $num_columns = count($very_satisfy[0]);
        $average = $total_sum_very_satisfy / $num_columns;

        $percentage_very_satisfy = round(($average / $total_count) * 100);
        //End

        //Average and Percentage of Satisfy
        
        $total_sum_satisfy = 0;
        foreach ($satisfy as $row) {
            foreach ($row as $count) {
                $total_sum_satisfy += $count;
            }
        }

        $average_satisfy = $total_sum_satisfy / $num_columns;

        $percentage_satisfy = round(($average_satisfy / $total_count) * 100);
        
        //End

        //Average and Percentage of Dissatisfied

        $total_sum_dissatisfy = 0;
        foreach ($dissatisfy as $row) {
            foreach ($row as $count) {
                $total_sum_dissatisfy += $count;
            }
        }

        $average_dissatisfy = $total_sum_dissatisfy / $num_columns;

        $percentage_dissatisfy = round(($average_dissatisfy / $total_count) * 100);
        
        //End

        //Average and Percentage of Very Dissatisfied

        $total_sum_very_dissatisfy = 0;
        foreach ($very_dissatisfy as $row) {
            foreach ($row as $count) {
                $total_sum_very_dissatisfy += $count;
            }
        }

        $average_very_dissatisfy = $total_sum_very_dissatisfy / $num_columns;

        $percentage_very_dissatisfy = intval(($average_very_dissatisfy / $total_count) * 100);
        
        //End

        //Average and Percentage of No Responses

        $total_sum_no_response = 0;
        foreach ($no_response as $row) {
            foreach ($row as $count) {
                $total_sum_no_response += $count;
            }
        }

        $average_no_response = $total_sum_no_response / $num_columns;

        $percentage_no_response = round(($average_no_response / $total_count) * 100);
        
        //End

        //Average and Percentage of For Validation

        $total_sum_for_validation = 0;
        foreach ($for_validation as $row) {
            foreach ($row as $count) {
                $total_sum_for_validation += $count;
            }
        }

        $average_for_validation = $total_sum_for_validation / $num_columns;

        $percentage_for_validation = round(($average_for_validation / $total_count) * 100);
        
        //End

        //END

        //To get the Satisfaction(%)

        // Define an array to hold satisfaction values for each column
        $satisfaction = [];

        // Define the columns to iterate over
        $columns = ['raic_a', 'raic_b', 'raic_c', 'raic_d', 'raic_e', 'raic_f',
                    'af_a', 'af_b', 'af_c', 'rao'];

        // Loop over each column
        foreach ($columns as $column) {
            // Initialize variables for very satisfaction and satisfaction for current column
            $satisfaction_very_satisfy = 0;
            $satisfaction_satisfy = 0;
            // Get very satisfaction count from $results
            foreach ($very_satisfy as $data) {
                $satisfaction_very_satisfy += $data["very_satisfy_$column"];
            }
            // Get satisfaction count from $data_satisfy
            foreach ($satisfy as $data) {
                $satisfaction_satisfy += $data["satisfy_$column"];
            }
            // Calculate satisfaction percentage for current column
            $satisfaction[$column] = round(($satisfaction_very_satisfy + $satisfaction_satisfy) / $total_count * 100);
        }

        //END

        //CSF SCORE

        $score = [];
        $result = [];

        foreach ($columns as $category) {
            $score[$category] = $this->calcu_satisfaction($category, $very_satisfy, $satisfy, $dissatisfy, $very_dissatisfy, $no_response, $for_validation, $total_count); 
        }

        $result = array_map('floatval', $score);

        $ratings = [];
        
        foreach($result as $category => $value)
        {
            $rating = ($value / 4) * 100;
            $ratings[$category] = $rating;
        }

        //END

        //(ARTA) QUALITY DIMENSION

        $responsiveness = round(($score['raic_e'] + $score['raic_f']) / 2, 2);
        $assurance = round(($score['raic_c'] + $score['raic_d']) / 2, 2);
        $integrity = $score['raic_b'];
        $realibility = $score['rao'];
        $outcome = $score['rao'];
        $communication = $score['raic_a'];
        $access_facilities = round(($score['af_a'] + $score['af_b'] + $score['af_c']) / 3, 2);

        $overall_ave = round(($responsiveness + $assurance + $integrity + $realibility + $outcome + $communication + $access_facilities) / 7, 2);
        $overall_rating = ($overall_ave / 4) * 100;

        //END

        //(ARTA) DIMENSION (% SATISFACTION

        $responsiveness_satisfaction = ($satisfaction['raic_e'] + $satisfaction['raic_f']) / 2;
        $assurance_satisfaction = ($satisfaction['raic_c'] + $satisfaction['raic_d']) / 2;
        $integrity_satisfaction = $satisfaction['raic_b'];
        $realibility_satisfaction = $satisfaction['rao'];
        $outcome_satisfaction = $satisfaction['rao'];
        $communication_satisfaction = $satisfaction['raic_a'];
        $access_facilities_satisfaction = ($satisfaction['af_a'] + $satisfaction['af_b'] + $satisfaction['af_c']) / 3;
        
        $overall_ave_satisfaction = round(($responsiveness_satisfaction + $assurance_satisfaction + $integrity_satisfaction + $communication_satisfaction + $communication_satisfaction + $access_facilities_satisfaction) / 7, 2);
        
        //END

        //SEX DISAGGREGATE

        $count_sex = (new \yii\db\Query())
        ->select([
            'count_male' => 'SUM(CASE WHEN sex = 4 THEN 1 ELSE 0 END)',
            'count_female' => 'SUM(CASE WHEN sex = 5 THEN 1 ELSE 0 END)',
        ])
        ->from('csf')
        ->where(['like', 'id', '%FCO%', false])
        ->one();

        $count_male = $count_sex['count_male'];
        $count_female = $count_sex['count_female'];


        $total_sex = $count_male + $count_female;

        $male_percent = round(($count_male / $total_sex) * 100);
        $female_percent = round(($count_female / $total_sex) * 100);

        $total_sex_percent = $male_percent + $female_percent;

        //END


        return $this->renderPartial('financial-internal-tabulation', [
            'very_satisfy' => $very_satisfy,
            'satisfy' => $satisfy,
            'dissatisfy' => $dissatisfy,
            'very_dissatisfy' => $very_dissatisfy,
            'no_response' => $no_response,
            'for_validation' => $for_validation,
            'total_count' => $total_count,
            'percentage_very_satisfy' => $percentage_very_satisfy,
            'percentage_satisfy' => $percentage_satisfy,
            'percentage_dissatisfy' => $percentage_dissatisfy,
            'percentage_very_dissatisfy' => $percentage_very_dissatisfy,
            'percentage_for_validation' => $percentage_for_validation,
            'percentage_no_response' => $percentage_no_response,
            'satisfaction' => $satisfaction,
            'score' => $score,
            'ratings' => $ratings,
            'responsiveness' => $responsiveness,
            'assurance' => $assurance,
            'integrity' => $integrity,
            'realibility' => $realibility,
            'outcome' => $outcome,
            'communication' => $communication,
            'access_facilities' => $access_facilities,
            'overall_ave' => $overall_ave,
            'overall_rating' => $overall_rating,
            'responsiveness_satisfaction' => $responsiveness_satisfaction,
            'assurance_satisfaction' => $assurance_satisfaction,
            'integrity_satisfaction' => $integrity_satisfaction,
            'realibility_satisfaction' => $realibility_satisfaction,
            'access_facilities_satisfaction' => $access_facilities_satisfaction,
            'overall_ave_satisfaction' => $overall_ave_satisfaction,
            'outcome_satisfaction' => $outcome_satisfaction,
            'communication_satisfaction' => $communication_satisfaction,
            'count_male' => $count_male,
            'count_female' => $count_female,
            'total_sex' => $total_sex,
            'male_percent' => $male_percent,
            'female_percent' => $female_percent,
            'total_sex_percent' => $total_sex_percent,
        ]);
    }

}
