<?php

namespace frontend\controllers;

use frontend\models\Services;
use frontend\models\Comments;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;

/**
 * ServicesController implements the CRUD actions for Services model.
 */
class ServicesController extends Controller
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
     * Lists all Services models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Services::find(),
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
     * Displays a single Services model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Services model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Services();

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
     * Updates an existing Services model.
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
     * Deletes an existing Services model.
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
     * Finds the Services model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Services the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Services::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    public function actionRatingService($process_id)
    {
        $model = new Services();
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
        return $this->renderPartial('rating-service', [
            'model' => $model,
            'commentsmodel' => $commentsmodel,
        ]);
    }

    public function actionRatingServiceTabulation()
    {
        //To get the count of each cell of the row in Very Satisfied
        $very_satisfy = (new \yii\db\Query())
        ->select([
            'very_satisfy_raic_a' => 'SUM(CASE WHEN raic_a = 1 THEN 1 ELSE 0 END)',
            'very_satisfy_raic_b' => 'SUM(CASE WHEN raic_b = 1 THEN 1 ELSE 0 END)',
            'very_satisfy_raic_c' => 'SUM(CASE WHEN raic_c = 1 THEN 1 ELSE 0 END)',
            'very_satisfy_raic_d' => 'SUM(CASE WHEN raic_d = 1 THEN 1 ELSE 0 END)',
            'very_satisfy_af_a' => 'SUM(CASE WHEN af_a = 1 THEN 1 ELSE 0 END)',
            'very_satisfy_af_b' => 'SUM(CASE WHEN af_b = 1 THEN 1 ELSE 0 END)',
            'very_satisfy_af_c' => 'SUM(CASE WHEN af_c = 1 THEN 1 ELSE 0 END)',
            'very_satisfy_ro_a' => 'SUM(CASE WHEN ro_a = 1 THEN 1 ELSE 0 END)',
        ])
        ->from('services')
        ->all();
        //END

        //To get the count of each cell of the row in Satisfied
        $satisfy = (new \yii\db\Query())
        ->select([
            'satisfy_raic_a' => 'SUM(CASE WHEN raic_a = 2 THEN 1 ELSE 0 END)',
            'satisfy_raic_b' => 'SUM(CASE WHEN raic_b = 2 THEN 1 ELSE 0 END)',
            'satisfy_raic_c' => 'SUM(CASE WHEN raic_c = 2 THEN 1 ELSE 0 END)',
            'satisfy_raic_d' => 'SUM(CASE WHEN raic_d = 2 THEN 1 ELSE 0 END)',
            'satisfy_af_a' => 'SUM(CASE WHEN af_a = 2 THEN 1 ELSE 0 END)',
            'satisfy_af_b' => 'SUM(CASE WHEN af_b = 2 THEN 1 ELSE 0 END)',
            'satisfy_af_c' => 'SUM(CASE WHEN af_c = 2 THEN 1 ELSE 0 END)',
            'satisfy_ro_a' => 'SUM(CASE WHEN ro_a = 2 THEN 1 ELSE 0 END)',
        ])
        ->from('services')
        ->all();
        //END

        //To get the count of each cell of the row in Dissatisfied
        $dissatisfy = (new \yii\db\Query())
        ->select([
            'dissatisfy_raic_a' => 'SUM(CASE WHEN raic_a = 3 THEN 1 ELSE 0 END)',
            'dissatisfy_raic_b' => 'SUM(CASE WHEN raic_b = 3 THEN 1 ELSE 0 END)',
            'dissatisfy_raic_c' => 'SUM(CASE WHEN raic_c = 3 THEN 1 ELSE 0 END)',
            'dissatisfy_raic_d' => 'SUM(CASE WHEN raic_d = 3 THEN 1 ELSE 0 END)',
            'dissatisfy_af_a' => 'SUM(CASE WHEN af_a = 3 THEN 1 ELSE 0 END)',
            'dissatisfy_af_b' => 'SUM(CASE WHEN af_b = 3 THEN 1 ELSE 0 END)',
            'dissatisfy_af_c' => 'SUM(CASE WHEN af_c = 3 THEN 1 ELSE 0 END)',
            'dissatisfy_ro_a' => 'SUM(CASE WHEN ro_a = 3 THEN 1 ELSE 0 END)',
        ])
        ->from('services')
        ->all();
        //END

        //To get the count of each cell of the row in Very Dissatisfied
        $very_dissatisfy = (new \yii\db\Query())
        ->select([
            'very_dissatisfy_raic_a' => 'SUM(CASE WHEN raic_a = 4 THEN 1 ELSE 0 END)',
            'very_dissatisfy_raic_b' => 'SUM(CASE WHEN raic_b = 4 THEN 1 ELSE 0 END)',
            'very_dissatisfy_raic_c' => 'SUM(CASE WHEN raic_c = 4 THEN 1 ELSE 0 END)',
            'very_dissatisfy_raic_d' => 'SUM(CASE WHEN raic_d = 4 THEN 1 ELSE 0 END)',
            'very_dissatisfy_af_a' => 'SUM(CASE WHEN af_a = 4 THEN 1 ELSE 0 END)',
            'very_dissatisfy_af_b' => 'SUM(CASE WHEN af_b = 4 THEN 1 ELSE 0 END)',
            'very_dissatisfy_af_c' => 'SUM(CASE WHEN af_c = 4 THEN 1 ELSE 0 END)',
            'very_dissatisfy_ro_a' => 'SUM(CASE WHEN ro_a = 4 THEN 1 ELSE 0 END)',
        ])
        ->from('services')
        ->all();
        //END

        //To get the count of each cell of the row in No Response
        $no_response = (new \yii\db\Query())
        ->select([
            'no_response_raic_a' => 'SUM(CASE WHEN raic_a = 5 THEN 1 ELSE 0 END)',
            'no_response_raic_b' => 'SUM(CASE WHEN raic_b = 5 THEN 1 ELSE 0 END)',
            'no_response_raic_c' => 'SUM(CASE WHEN raic_c = 5 THEN 1 ELSE 0 END)',
            'no_response_raic_d' => 'SUM(CASE WHEN raic_d = 5 THEN 1 ELSE 0 END)',
            'no_response_af_a' => 'SUM(CASE WHEN af_a = 5 THEN 1 ELSE 0 END)',
            'no_response_af_b' => 'SUM(CASE WHEN af_b = 5 THEN 1 ELSE 0 END)',
            'no_response_af_c' => 'SUM(CASE WHEN af_c = 5 THEN 1 ELSE 0 END)',
            'no_response_ro_a' => 'SUM(CASE WHEN ro_a = 5 THEN 1 ELSE 0 END)',
        ])
        ->from('services')
        ->all();
        //END

        //To get the count of each cell of the row in No Response
        $for_validation = (new \yii\db\Query())
        ->select([
            'for_validation_raic_a' => 'SUM(CASE WHEN raic_a = 6 THEN 1 ELSE 0 END)',
            'for_validation_raic_b' => 'SUM(CASE WHEN raic_b = 6 THEN 1 ELSE 0 END)',
            'for_validation_raic_c' => 'SUM(CASE WHEN raic_c = 6 THEN 1 ELSE 0 END)',
            'for_validation_raic_d' => 'SUM(CASE WHEN raic_d = 6 THEN 1 ELSE 0 END)',
            'for_validation_af_a' => 'SUM(CASE WHEN af_a = 6 THEN 1 ELSE 0 END)',
            'for_validation_af_b' => 'SUM(CASE WHEN af_b = 6 THEN 1 ELSE 0 END)',
            'for_validation_af_c' => 'SUM(CASE WHEN af_c = 6 THEN 1 ELSE 0 END)',
            'for_validation_ro_a' => 'SUM(CASE WHEN ro_a = 6 THEN 1 ELSE 0 END)',
        ])
        ->from('services')
        ->all();
        //END

        //To ge the total response total count of the response
        $total_count = (new \yii\db\Query())
        ->select(['COUNT(*) as total_count'])
        ->from('services')
        ->scalar();
        //END

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

        //To get the Satisfaction(%)

        // Define an array to hold satisfaction values for each column
        $satisfaction = [];

        // Define the columns to iterate over
        $columns = ['raic_a', 'raic_b', 'raic_c', 'raic_d', 'af_a', 'af_b', 'af_c', 'ro_a'];

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

        //(ARTA) QUALITY DIMENSION (CSF SCORE)

        $responsiveness = $score['raic_b'];
        $assurance = $score['raic_a'];
        $integrity = $score['raic_c'];
        $realibility = $score['ro_a'];
        $outcome = $score['ro_a'];
        $communication = $score['raic_d'];
        $access_facilities = round(($score['af_a'] + $score['af_b'] + $score['af_c']) / 3, 2);

        $overall_ave = round(($responsiveness + $assurance + $integrity + $realibility + $outcome + $communication + $access_facilities) / 7, 2);
        $overall_rating = ($overall_ave / 4) * 100;

        //END

        //(ARTA) DIMENSION (% SATISFACTION)

        $responsiveness_satisfaction = $satisfaction['raic_b'];
        $assurance_satisfaction = $satisfaction['raic_a'];
        $integrity_satisfaction = $satisfaction['raic_c'];
        $realibility_satisfaction = $satisfaction['ro_a'];
        $outcome_satisfaction = $satisfaction['ro_a'];
        $communication_satisfaction = $satisfaction['raic_d'];
        $access_facilities_satisfaction = round(($satisfaction['af_a'] + $satisfaction['af_b'] + $satisfaction['af_c']) / 3, 2);
        
        $overall_ave_satisfaction = round(($responsiveness_satisfaction + $assurance_satisfaction + $integrity_satisfaction + $access_facilities_satisfaction) / 4, 2);
        
        //END

        //SEX DISAGGREGATE
        $count_sex = (new \yii\db\Query())
        ->select([
            'count_male' => 'SUM(CASE WHEN sex = 4 THEN 1 ELSE 0 END)',
            'count_female' => 'SUM(CASE WHEN sex = 5 THEN 1 ELSE 0 END)',
        ])
        ->from('csf')
        ->where(['like', 'id', '%WEI%', false])
        ->one();

        $count_male = $count_sex['count_male'];
        $count_female = $count_sex['count_female'];


        $total_sex = $count_male + $count_female;

        $male_percent = round(($count_male / $total_sex) * 100);
        $female_percent = round(($count_female / $total_sex) * 100);

        $total_sex_percent = $male_percent + $female_percent;

        //END
        
        //SERVICE REQUESTED
        //To ge the total response total count of the driving, janitorial, and vehicle/equipment maintenance

        $requested = (new \yii\db\Query())
        ->select([
            'driving' => 'COUNT(CASE WHEN driving != :value THEN 1 END)',
            'janitorial' => 'COUNT(CASE WHEN janitorial != :value THEN 1 END)',
            'equipment' => 'COUNT(CASE WHEN equipment != :value THEN 1 END)',
        ])
        ->from('services')
        ->params([':value' => ' '])
        ->one();

        $total_requested = array_sum($requested);
        //END

        $driving_percent = round(($requested['driving'] / $total_requested) * 100, 2);
        $janitorial_percent = round(($requested['janitorial'] / $total_requested) * 100, 2);
        $equipment_percent = round(($requested['equipment'] / $total_requested) * 100, 2);

        $service_percent = round((($driving_percent + $janitorial_percent + $equipment_percent) / 3), 2);



        //END

        return $this->renderPartial('rating-service-tabulation', [
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
            'outcome_satisfaction' => $realibility_satisfaction,
            'communication_satisfaction' => $realibility_satisfaction,
            'access_facilities_satisfaction' => $access_facilities_satisfaction,
            'overall_ave_satisfaction' => $overall_ave_satisfaction,
            'count_male' => $count_male,
            'count_female' => $count_female,
            'total_sex' => $total_sex,
            'male_percent' => $male_percent,
            'female_percent' => $female_percent,
            'total_sex_percent' => $total_sex_percent,
            // 'driving' => $driving,
            // 'janitorial' => $janitorial,
            // 'equipment' => $equipment,
            'requested' => $requested,
            'total_requested' => $total_requested,
            'driving_percent' => $driving_percent,
            'janitorial_percent' => $janitorial_percent,
            'equipment_percent' => $equipment_percent,
            'service_percent' => $service_percent,
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
}
