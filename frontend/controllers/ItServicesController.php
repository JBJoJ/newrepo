<?php

namespace frontend\controllers;

use frontend\models\ItServices;
use frontend\models\Comments;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;

/**
 * ItServicesController implements the CRUD actions for ItServices model.
 */
class ItServicesController extends Controller
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
     * Lists all ItServices models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => ItServices::find(),
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
     * Displays a single ItServices model.
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
     * Creates a new ItServices model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new ItServices();

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
     * Updates an existing ItServices model.
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
     * Deletes an existing ItServices model.
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
     * Finds the ItServices model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return ItServices the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ItServices::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    public function actionItService()
    {
        $model = new ItServices();
        $commentsmodel = new Comments();

        if ($model->load(Yii::$app->request->post())) {
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
        }

        return $this->renderPartial('it-service', [
            'model' => $model,
            'commentsmodel' => $commentsmodel,
        ]);
    }

        
    public function actionItTabulation()
    {

        //To get the count of each cell of the row in Very Satisfied
        $very_satisfy = (new \yii\db\Query())
        ->select([
            'very_satisfy_rai' => 'SUM(CASE WHEN rai = 1 THEN 1 ELSE 0 END)',
            'very_satisfy_ro' => 'SUM(CASE WHEN ro = 1 THEN 1 ELSE 0 END)',
            'very_satisfy_af' => 'SUM(CASE WHEN af = 1 THEN 1 ELSE 0 END)',
            'very_satisfy_com' => 'SUM(CASE WHEN com = 1 THEN 1 ELSE 0 END)',
            'very_satisfy_osr' => 'SUM(CASE WHEN osr = 1 THEN 1 ELSE 0 END)',
        ])
        ->from('it_services')
        ->all();
        //END

        //To get the count of each cell of the row in Satisfied
        $satisfy = (new \yii\db\Query())
        ->select([
            'satisfy_rai' => 'SUM(CASE WHEN rai = 2 THEN 1 ELSE 0 END)',
            'satisfy_ro' => 'SUM(CASE WHEN ro = 2 THEN 1 ELSE 0 END)',
            'satisfy_af' => 'SUM(CASE WHEN af = 2 THEN 1 ELSE 0 END)',
            'satisfy_com' => 'SUM(CASE WHEN com = 2 THEN 1 ELSE 0 END)',
            'satisfy_osr' => 'SUM(CASE WHEN osr = 2 THEN 1 ELSE 0 END)',
        ])
        ->from('it_services')
        ->all();
        //END

        //To get the count of each cell of the row in Dissatisfied
        $dissatisfy = (new \yii\db\Query())
        ->select([
            'dissatisfy_rai' => 'SUM(CASE WHEN rai = 3 THEN 1 ELSE 0 END)',
            'dissatisfy_ro' => 'SUM(CASE WHEN ro = 3 THEN 1 ELSE 0 END)',
            'dissatisfy_af' => 'SUM(CASE WHEN af = 3 THEN 1 ELSE 0 END)',
            'dissatisfy_com' => 'SUM(CASE WHEN com = 3 THEN 1 ELSE 0 END)',
            'dissatisfy_osr' => 'SUM(CASE WHEN osr = 3 THEN 1 ELSE 0 END)',
        ])
        ->from('it_services')
        ->all();
        //END

        //To get the count of each cell of the row in Very Dissatisfied
        $very_dissatisfy = (new \yii\db\Query())
        ->select([
            'very_dissatisfy_rai' => 'SUM(CASE WHEN rai = 4 THEN 1 ELSE 0 END)',
            'very_dissatisfy_ro' => 'SUM(CASE WHEN ro = 4 THEN 1 ELSE 0 END)',
            'very_dissatisfy_af' => 'SUM(CASE WHEN af = 4 THEN 1 ELSE 0 END)',
            'very_dissatisfy_com' => 'SUM(CASE WHEN com = 4 THEN 1 ELSE 0 END)',
            'very_dissatisfy_osr' => 'SUM(CASE WHEN osr = 4 THEN 1 ELSE 0 END)',
        ])
        ->from('it_services')
        ->all();
        //END

        //To get the count of each cell of the row in No Response
        $no_response = (new \yii\db\Query())
        ->select([
            'no_response_rai' => 'SUM(CASE WHEN rai = 5 THEN 1 ELSE 0 END)',
            'no_response_ro' => 'SUM(CASE WHEN ro = 5 THEN 1 ELSE 0 END)',
            'no_response_af' => 'SUM(CASE WHEN af = 5 THEN 1 ELSE 0 END)',
            'no_response_com' => 'SUM(CASE WHEN com = 5 THEN 1 ELSE 0 END)',
            'no_response_osr' => 'SUM(CASE WHEN osr = 5 THEN 1 ELSE 0 END)',
        ])
        ->from('it_services')
        ->all();
        //END

        //To get the count of each cell of the row in For Validation
        $for_validation = (new \yii\db\Query())
        ->select([
            'for_validation_rai' => 'SUM(CASE WHEN rai = 6 THEN 1 ELSE 0 END)',
            'for_validation_ro' => 'SUM(CASE WHEN ro = 6 THEN 1 ELSE 0 END)',
            'for_validation_af' => 'SUM(CASE WHEN af = 6 THEN 1 ELSE 0 END)',
            'for_validation_com' => 'SUM(CASE WHEN com = 6 THEN 1 ELSE 0 END)',
            'for_validation_osr' => 'SUM(CASE WHEN osr = 6 THEN 1 ELSE 0 END)',
        ])
        ->from('it_services')
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
        ->from('it_services')
        ->one();
        //END

        //To ge the total response total count of the response
        $total_count = (new \yii\db\Query())
        ->select(['COUNT(*) as total_count'])
        ->from('it_services')
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
        $columns = ['rai', 'ro', 'af', 'com'];

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

        $sum = array_sum($score);

        $overall_ave = round($sum / 7, 2);
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

        // //SQD (% SATISFACTION)

        // $very_satisfy_parse = array_map('floatval', $very_satisfy);
        // $satisfy_parse = array_map('floatval', $satisfy);

        //$responsiveness = round((($very_satisfy['very_satisfy_rai'] + $satisfy['satisfy_rai']) / 2 ) * 100, 2);
        // $overall_satisfaction = [
        //     'responsiveness' => round((($very_satisfy['very_satisfy_rai'] + $satisfy['satisfy_roi']) / 2) * 100, 2),
        // ];
        
        // Ensure that the queries return results before accessing the keys
        // if (!empty($very_satisfy) && !empty($satisfy)) {
        //     $responsiveness = round((($very_satisfy['very_satisfy_rai'] + $satisfy['satisfy_rai']) / $total_count ) * 100, 2);
        // } else {
        //     // Handle the case when the query results are empty
        //     $responsiveness = 0;
        // }

        $very_satisfy_rai = array_sum(array_column($very_satisfy, 'very_satisfy_rai'));
        $satisfy_rai = array_sum(array_column($satisfy, 'satisfy_rai'));
        $very_satisfy_ro = array_sum(array_column($very_satisfy, 'very_satisfy_ro'));
        $satisfy_ro = array_sum(array_column($satisfy, 'satisfy_ro'));
        $very_satisfy_af = array_sum(array_column($very_satisfy, 'very_satisfy_af'));
        $satisfy_af = array_sum(array_column($satisfy, 'satisfy_af'));
        $very_satisfy_com = array_sum(array_column($very_satisfy, 'very_satisfy_com'));
        $satisfy_com = array_sum(array_column($satisfy, 'satisfy_com'));

        $responsiveness = round((($very_satisfy_rai + $satisfy_rai) / $total_count) * 100, 2);
        $assurance = $responsiveness;
        $integrity = $responsiveness;

        $realibility = round((($very_satisfy_ro + $satisfy_ro) / $total_count) * 100, 2);
        $outcome = $realibility;

        $access_facilities = round((($very_satisfy_af + $satisfy_af) / $total_count) * 100, 2);

        $comms = round((($very_satisfy_com + $satisfy_com) / $total_count) * 100, 2);

        $sqd_satisfaction_overall = round((($responsiveness * 3) + ($realibility * 2) + $access_facilities + $comms) / 7, 2);



        // //END

        //SEX DISAGGREGATE

        $count_sex = (new \yii\db\Query())
        ->select([
            'count_male' => 'SUM(CASE WHEN sex = 4 THEN 1 ELSE 0 END)',
            'count_female' => 'SUM(CASE WHEN sex = 5 THEN 1 ELSE 0 END)',
        ])
        ->from('csf')
        ->where(['like', 'id', '%IT%', false])
        ->one();

        $count_male = $count_sex['count_male'];
        $count_female = $count_sex['count_female'];


        $total_sex = $count_male + $count_female;

        $male_percent = round(($count_male / $total_sex) * 100);
        $female_percent = round(($count_female / $total_sex) * 100);

        $total_sex_percent = $male_percent + $female_percent;

        //END

        return $this->renderPartial('it-tabulation', [
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
            'overall_ave' => $overall_ave,
            'overall_rating' => $overall_rating,
            'overall_satisfaction_calculation' => $overall_satisfaction_calculation,
            'total_overall_satisfaction' => $total_overall_satisfaction,
            'satisfaction_level' => $satisfaction_level,
            'responsiveness' => $responsiveness,
            'assurance' => $assurance,
            'integrity' => $integrity,
            'realibility' => $realibility,
            'outcome' => $outcome,
            'access_facilities' => $access_facilities,
            'comms' => $comms,
            'sqd_satisfaction_overall' => $sqd_satisfaction_overall,
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
