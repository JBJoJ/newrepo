<?php

namespace frontend\controllers;

use frontend\models\RequestSupply;
use frontend\models\Comments;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;

/**
 * RequestSupplyController implements the CRUD actions for RequestSupply model.
 */
class RequestSupplyController extends Controller
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
     * Lists all RequestSupply models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => RequestSupply::find(),
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
     * Displays a single RequestSupply model.
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
     * Creates a new RequestSupply model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new RequestSupply();

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
     * Updates an existing RequestSupply model.
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
     * Deletes an existing RequestSupply model.
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
     * Finds the RequestSupply model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return RequestSupply the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = RequestSupply::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    public function actionRequestSupplies($process_id)
    {
        $model = new RequestSupply();
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

        return $this->renderPartial('request-supplies', [
            'model' => $model,
            'commentsmodel' => $commentsmodel,
        ]);
    }

    public function actionRequestSuppliesTabulation()
    {
        //To get the count of each cell of the row in Very Satisfied
        $very_satisfy = (new \yii\db\Query())
        ->select([
            'very_satisfy_qs_a' => 'SUM(CASE WHEN qs_a = 1 THEN 1 ELSE 0 END)',
            'very_satisfy_qs_b' => 'SUM(CASE WHEN qs_b = 1 THEN 1 ELSE 0 END)',
            'very_satisfy_staff_a' => 'SUM(CASE WHEN staff_a = 1 THEN 1 ELSE 0 END)',
            'very_satisfy_staff_b' => 'SUM(CASE WHEN staff_b = 1 THEN 1 ELSE 0 END)',
            'very_satisfy_staff_c' => 'SUM(CASE WHEN staff_c = 1 THEN 1 ELSE 0 END)',
            'very_satisfy_staff_d' => 'SUM(CASE WHEN staff_d = 1 THEN 1 ELSE 0 END)',
            'very_satisfy_staff_e' => 'SUM(CASE WHEN staff_e  = 1 THEN 1 ELSE 0 END)',
            'very_satisfy_os_a' => 'SUM(CASE WHEN os_a = 1 THEN 1 ELSE 0 END)',
        ])
        ->from('request_supply')
        ->all();
        //END

        //To get the count of each cell of the row in Satisfied
        $satisfy = (new \yii\db\Query())
        ->select([
            'satisfy_qs_a' => 'SUM(CASE WHEN qs_a = 2 THEN 1 ELSE 0 END)',
            'satisfy_qs_b' => 'SUM(CASE WHEN qs_b = 2 THEN 1 ELSE 0 END)',
            'satisfy_staff_a' => 'SUM(CASE WHEN staff_a = 2 THEN 1 ELSE 0 END)',
            'satisfy_staff_b' => 'SUM(CASE WHEN staff_b = 2 THEN 1 ELSE 0 END)',
            'satisfy_staff_c' => 'SUM(CASE WHEN staff_c = 2 THEN 1 ELSE 0 END)',
            'satisfy_staff_d' => 'SUM(CASE WHEN staff_d = 2 THEN 1 ELSE 0 END)',
            'satisfy_staff_e' => 'SUM(CASE WHEN staff_e  = 2 THEN 1 ELSE 0 END)',
            'satisfy_os_a' => 'SUM(CASE WHEN os_a = 2 THEN 1 ELSE 0 END)',
        ])
        ->from('request_supply')
        ->all();
        //END

      //To get the count of each cell of the row in Dissatisfied
        $dissatisfy = (new \yii\db\Query())
        ->select([
            'dissatisfy_qs_a' => 'SUM(CASE WHEN qs_a = 3 THEN 1 ELSE 0 END)',
            'dissatisfy_qs_b' => 'SUM(CASE WHEN qs_b = 3 THEN 1 ELSE 0 END)',
            'dissatisfy_staff_a' => 'SUM(CASE WHEN staff_a = 3 THEN 1 ELSE 0 END)',
            'dissatisfy_staff_b' => 'SUM(CASE WHEN staff_b = 3 THEN 1 ELSE 0 END)',
            'dissatisfy_staff_c' => 'SUM(CASE WHEN staff_c = 3 THEN 1 ELSE 0 END)',
            'dissatisfy_staff_d' => 'SUM(CASE WHEN staff_d = 3 THEN 1 ELSE 0 END)',
            'dissatisfy_staff_e' => 'SUM(CASE WHEN staff_e  = 3 THEN 1 ELSE 0 END)',
            'dissatisfy_os_a' => 'SUM(CASE WHEN os_a = 3 THEN 1 ELSE 0 END)',
        ])
        ->from('request_supply')
        ->all();
        //END

        //To get the count of each cell of the row in Very Dissatisfied
        $very_dissatisfy = (new \yii\db\Query())
        ->select([
            'very_dissatisfy_qs_a' => 'SUM(CASE WHEN qs_a = 4 THEN 1 ELSE 0 END)',
            'very_dissatisfy_qs_b' => 'SUM(CASE WHEN qs_b = 4 THEN 1 ELSE 0 END)',
            'very_dissatisfy_staff_a' => 'SUM(CASE WHEN staff_a = 4 THEN 1 ELSE 0 END)',
            'very_dissatisfy_staff_b' => 'SUM(CASE WHEN staff_b = 4 THEN 1 ELSE 0 END)',
            'very_dissatisfy_staff_c' => 'SUM(CASE WHEN staff_c = 4 THEN 1 ELSE 0 END)',
            'very_dissatisfy_staff_d' => 'SUM(CASE WHEN staff_d = 4 THEN 1 ELSE 0 END)',
            'very_dissatisfy_staff_e' => 'SUM(CASE WHEN staff_e  = 4 THEN 1 ELSE 0 END)',
            'very_dissatisfy_os_a' => 'SUM(CASE WHEN os_a = 4 THEN 1 ELSE 0 END)',
        ])
        ->from('request_supply')
        ->all();
        //END

        //To get the count of each cell of the row in No Response
        $no_response = (new \yii\db\Query())
        ->select([
            'no_response_qs_a' => 'SUM(CASE WHEN qs_a = 5 THEN 1 ELSE 0 END)',
            'no_response_qs_b' => 'SUM(CASE WHEN qs_b = 5 THEN 1 ELSE 0 END)',
            'no_response_staff_a' => 'SUM(CASE WHEN staff_a = 5 THEN 1 ELSE 0 END)',
            'no_response_staff_b' => 'SUM(CASE WHEN staff_b = 5 THEN 1 ELSE 0 END)',
            'no_response_staff_c' => 'SUM(CASE WHEN staff_c = 5 THEN 1 ELSE 0 END)',
            'no_response_staff_d' => 'SUM(CASE WHEN staff_d = 5 THEN 1 ELSE 0 END)',
            'no_response_staff_e' => 'SUM(CASE WHEN staff_e  = 5 THEN 1 ELSE 0 END)',
            'no_response_os_a' => 'SUM(CASE WHEN os_a = 5 THEN 1 ELSE 0 END)',
        ])
        ->from('request_supply')
        ->all();
        //END

        //To get the count of each cell of the row in For Validation
        $for_validation = (new \yii\db\Query())
        ->select([
            'for_validation_qs_a' => 'SUM(CASE WHEN qs_a = 6 THEN 1 ELSE 0 END)',
            'for_validation_qs_b' => 'SUM(CASE WHEN qs_b = 6 THEN 1 ELSE 0 END)',
            'for_validation_staff_a' => 'SUM(CASE WHEN staff_a = 6 THEN 1 ELSE 0 END)',
            'for_validation_staff_b' => 'SUM(CASE WHEN staff_b = 6 THEN 1 ELSE 0 END)',
            'for_validation_staff_c' => 'SUM(CASE WHEN staff_c = 6 THEN 1 ELSE 0 END)',
            'for_validation_staff_d' => 'SUM(CASE WHEN staff_d = 6 THEN 1 ELSE 0 END)',
            'for_validation_staff_e' => 'SUM(CASE WHEN staff_e  = 6 THEN 1 ELSE 0 END)',
            'for_validation_os_a' => 'SUM(CASE WHEN os_a = 6 THEN 1 ELSE 0 END)',
        ])
        ->from('request_supply')
        ->all();
        //END

        //To get the count of each cell of the row in Overall
        $overall = (new \yii\db\Query())
        ->select([
            'overall_very_satisfy' => 'SUM(CASE WHEN osr = 1 THEN 1 ELSE 0 END)',
            'overall_satisfy' => 'SUM(CASE WHEN osr = 2 THEN 1 ELSE 0 END)',
            'overall_dissatisfy' => 'SUM(CASE WHEN osr = 3 THEN 1 ELSE 0 END)',
            'overall_very_dissatisfy' => 'SUM(CASE WHEN osr = 4 THEN 1 ELSE 0 END)',
            'overall_no_responses' => 'SUM(CASE WHEN osr = 5 THEN 1 ELSE 0 END)',
            'overall_for_validation' => 'SUM(CASE WHEN osr = 6 THEN 1 ELSE 0 END)',
        ])
        ->from('request_supply')
        ->one();
        //END

        //To ge the total response total count of the response
        $total_count = (new \yii\db\Query())
        ->select(['COUNT(*) as total_count'])
        ->from('request_supply')
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

        //END

        //To get the Satisfaction(%)

        // Define an array to hold satisfaction values for each column
        $satisfaction = [];

        // Define the columns to iterate over
        $columns = [
            'qs_a', 'qs_b', 'staff_a', 'staff_b', 'staff_c','staff_d', 'staff_e', 'os_a'
    
        ];

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

       //CRITERIA (CSF SCORE)

        $quality_service = 0;
        foreach ($score as $key => $value) {if(strpos($key, 'qs_') === 0) $quality_service += $value; }

        $dti_staff = 0;
        foreach ($score as $key => $value) { if(strpos($key, 'staff_') === 0) $dti_staff += $value; }

        $result_requested = $score['os_a'];

        $overall_ave_score = round(($quality_service + $dti_staff + $result_requested) / 3, 2);
        $overall_ave_score_rating = round(($overall_ave_score / 4), 2);

        //END

        //(ARTA) QUALITY DIMENSION (CSF SCORE)

        $realibility = round(($score['staff_a'] + $score['staff_d']) / 2, 2);
        $responsiveness = round(($score['qs_a'] + $score['staff_e']) / 2, 2);
        $integrity = $score['qs_b'];
        $communication = round(($score['staff_c'] + $score['staff_d']) / 2, 2);
        $assurance = $score['staff_b'];
        $outcome = $score['os_a'];

        $overall_ave = round(($realibility + $responsiveness + $integrity + $communication + $assurance + $outcome) / 6, 2);
        $overall_rating = round($overall_ave / 4, 2);

        //END

        //(ARTA) DIMENSION (% SATISFACTION)

        $realibility_satisfaction = round(($satisfaction['staff_a'] + $satisfaction['staff_d']) / 2, 2);
        $responsiveness_satisfaction = round(($satisfaction['qs_a'] + $satisfaction['staff_e']) / 2, 2);
        $integrity_satisfaction = $satisfaction['qs_b'];
        $communication_satisfaction =  round(($satisfaction['staff_c'] + $satisfaction['staff_d']) / 2, 2);
        $assurance_satisfaction = $satisfaction['staff_b'];
        $outcome_satisfaction = $satisfaction['os_a'];

        $overall_ave_satisfaction = round(($realibility_satisfaction + $responsiveness_satisfaction + $integrity_satisfaction + $communication_satisfaction + $assurance_satisfaction + $outcome_satisfaction) / 6, 2);
        
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

        //SEX DISAGGREGATE
        $count_sex = (new \yii\db\Query())
        ->select([
            'count_male' => 'SUM(CASE WHEN sex = 4 THEN 1 ELSE 0 END)',
            'count_female' => 'SUM(CASE WHEN sex = 5 THEN 1 ELSE 0 END)',
        ])
        ->from('csf')
        ->where(['like', 'id', '%RIS%', false])
        ->one();

        $count_male = $count_sex['count_male'];
        $count_female = $count_sex['count_female'];


        $total_sex = $count_male + $count_female;

        $male_percent = round(($count_male / $total_sex) * 100);
        $female_percent = round(($count_female / $total_sex) * 100);

        $total_sex_percent = $male_percent + $female_percent;

        //END



        return $this->renderPartial('request-supplies-tabulation', [
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
            'quality_service' => $quality_service,
            'dti_staff' => $dti_staff,
            'result_requested' => $result_requested,
            'overall_ave_score' => $overall_ave_score,
            'overall_ave_score_rating' => $overall_ave_score_rating,
            'realibility' => $realibility,
            'responsiveness' => $responsiveness,
            'integrity' => $integrity,
            'communication' => $communication,
            'assurance' => $assurance,
            'outcome' => $outcome,
            'overall_ave' => $overall_ave,
            'overall_rating' => $overall_rating,
            'realibility_satisfaction' => $realibility_satisfaction,
            'responsiveness_satisfaction' => $responsiveness_satisfaction,
            'integrity_satisfaction' => $integrity_satisfaction,
            'communication_satisfaction' => $communication_satisfaction,
            'assurance_satisfaction' => $assurance_satisfaction,
            'outcome_satisfaction' => $outcome_satisfaction,
            'overall_ave_satisfaction' => $overall_ave_satisfaction,
            'overall_satisfaction_calculation' => $overall_satisfaction_calculation,
            'total_overall_satisfaction' => $total_overall_satisfaction,
            'satisfaction_level' => $satisfaction_level,
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
}
