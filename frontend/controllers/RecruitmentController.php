<?php

namespace frontend\controllers;

use frontend\models\Recruitment;
use frontend\models\Comments;
use frontend\models\Csf;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;

/**
 * RecruitmentController implements the CRUD actions for Recruitment model.
 */
class RecruitmentController extends Controller
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
     * Lists all Recruitment models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Recruitment::find(),
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
     * Displays a single Recruitment model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModelProcessId($id);
        $csf = $this->findModelCsf($id);
        $comment = $this->findModelComment($id);

        return $this->renderPartial('view', [
            'model' => $model,
            'csf' => $csf,
            'comment' => $comment,
        ]);
    }

    private function findModelProcessId($id)
    {
        if (($model = Recruitment::findOne(['process_id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    private function findModelCsf($id)
    {
        if (($csf = Csf::findOne($id)) !== null) {
            return $csf;
        }
    
        throw new NotFoundHttpException('The requested page does not exist.');
    }

    private function findModelComment($id)
    {
        if (($comment = Comments::findOne(['process_id' => $id])) !== null) {
            return $comment;
        }
    
        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * Creates a new Recruitment model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Recruitment();

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
     * Updates an existing Recruitment model.
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
     * Deletes an existing Recruitment model.
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
     * Finds the Recruitment model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Recruitment the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Recruitment::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    public function actionRecruitmentsSelection($process_id)
    {
        $model = new Recruitment();
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

        return $this->renderPartial('recruitments-selection', [
            'model' => $model,
            'commentsmodel' => $commentsmodel,
        ]);
    }

    public function actionRecruitmentsTabulation()
    {
        $model = new \frontend\models\Recruitment();

        //To get the count of each cell of the row in Very Satisfied
        $query = (new \yii\db\Query())
            ->select([
                'count_qs_a' => 'SUM(CASE WHEN qs_a = 1 THEN 1 ELSE 0 END)',
                'count_qs_b' => 'SUM(CASE WHEN qs_b = 1 THEN 1 ELSE 0 END)',
                'count_qs_c' => 'SUM(CASE WHEN qs_c = 1 THEN 1 ELSE 0 END)',
                'count_qs_d' => 'SUM(CASE WHEN qs_d = 1 THEN 1 ELSE 0 END)',
                'count_rsi_a' => 'SUM(CASE WHEN rsi_a = 1 THEN 1 ELSE 0 END)',
                'count_rsi_b' => 'SUM(CASE WHEN rsi_b = 1 THEN 1 ELSE 0 END)',
                'count_rsi_c' => 'SUM(CASE WHEN rsi_c = 1 THEN 1 ELSE 0 END)',
                'count_rsi_d' => 'SUM(CASE WHEN rsi_d = 1 THEN 1 ELSE 0 END)',
                'count_tv_a' => 'SUM(CASE WHEN tv_a = 1 THEN 1 ELSE 0 END)',
                'count_tv_b' => 'SUM(CASE WHEN tv_b = 1 THEN 1 ELSE 0 END)',
                'count_tv_c' => 'SUM(CASE WHEN tv_c = 1 THEN 1 ELSE 0 END)',
                'count_tv_d' => 'SUM(CASE WHEN tv_d = 1 THEN 1 ELSE 0 END)',
            ])
            ->from('recruitment');
        //End
        
        //To get the count of each cell of the row in Satisfied
        $query_satisfy = (new \yii\db\Query())
            ->select([
                'satisfy_qs_a' => 'SUM(CASE WHEN qs_a = 2 THEN 1 ELSE 0 END)',
                'satisfy_qs_b' => 'SUM(CASE WHEN qs_b = 2 THEN 1 ELSE 0 END)',
                'satisfy_qs_c' => 'SUM(CASE WHEN qs_c = 2 THEN 1 ELSE 0 END)',
                'satisfy_qs_d' => 'SUM(CASE WHEN qs_d = 2 THEN 1 ELSE 0 END)',
                'satisfy_rsi_a' => 'SUM(CASE WHEN rsi_a = 2 THEN 1 ELSE 0 END)',
                'satisfy_rsi_b' => 'SUM(CASE WHEN rsi_b = 2 THEN 1 ELSE 0 END)',
                'satisfy_rsi_c' => 'SUM(CASE WHEN rsi_c = 2 THEN 1 ELSE 0 END)',
                'satisfy_rsi_d' => 'SUM(CASE WHEN rsi_d = 2 THEN 1 ELSE 0 END)',
                'satisfy_tv_a' => 'SUM(CASE WHEN tv_a = 2 THEN 1 ELSE 0 END)',
                'satisfy_tv_b' => 'SUM(CASE WHEN tv_b = 2 THEN 1 ELSE 0 END)',
                'satisfy_tv_c' => 'SUM(CASE WHEN tv_c = 2 THEN 1 ELSE 0 END)',
                'satisfy_tv_d' => 'SUM(CASE WHEN tv_d = 2 THEN 1 ELSE 0 END)',
            ])
            ->from('recruitment');
        //End

        //To get the count of each cell of the row in Dissatisfied
        $dissatisfy = (new \yii\db\Query())
            ->select([
                'dissatisfy_qs_a' => 'SUM(CASE WHEN qs_a = 3 THEN 1 ELSE 0 END)',
                'dissatisfy_qs_b' => 'SUM(CASE WHEN qs_b = 3 THEN 1 ELSE 0 END)',
                'dissatisfy_qs_c' => 'SUM(CASE WHEN qs_c = 3 THEN 1 ELSE 0 END)',
                'dissatisfy_qs_d' => 'SUM(CASE WHEN qs_d = 3 THEN 1 ELSE 0 END)',
                'dissatisfy_rsi_a' => 'SUM(CASE WHEN rsi_a = 3 THEN 1 ELSE 0 END)',
                'dissatisfy_rsi_b' => 'SUM(CASE WHEN rsi_b = 3 THEN 1 ELSE 0 END)',
                'dissatisfy_rsi_c' => 'SUM(CASE WHEN rsi_c = 3 THEN 1 ELSE 0 END)',
                'dissatisfy_rsi_d' => 'SUM(CASE WHEN rsi_d = 3 THEN 1 ELSE 0 END)',
                'dissatisfy_tv_a' => 'SUM(CASE WHEN tv_a = 3 THEN 1 ELSE 0 END)',
                'dissatisfy_tv_b' => 'SUM(CASE WHEN tv_b = 3 THEN 1 ELSE 0 END)',
                'dissatisfy_tv_c' => 'SUM(CASE WHEN tv_c = 3 THEN 1 ELSE 0 END)',
                'dissatisfy_tv_d' => 'SUM(CASE WHEN tv_d = 3 THEN 1 ELSE 0 END)',
            ])
            ->from('recruitment');
        //End

        //To get the count of each cell of the row in Very Dissatisfied
        $very_dissatisfy = (new \yii\db\Query())
            ->select([
                'very_dissatisfy_qs_a' => 'SUM(CASE WHEN qs_a = 4 THEN 1 ELSE 0 END)',
                'very_dissatisfy_qs_b' => 'SUM(CASE WHEN qs_b = 4 THEN 1 ELSE 0 END)',
                'very_dissatisfy_qs_c' => 'SUM(CASE WHEN qs_c = 4 THEN 1 ELSE 0 END)',
                'very_dissatisfy_qs_d' => 'SUM(CASE WHEN qs_d = 4 THEN 1 ELSE 0 END)',
                'very_dissatisfy_rsi_a' => 'SUM(CASE WHEN rsi_a = 4 THEN 1 ELSE 0 END)',
                'very_dissatisfy_rsi_b' => 'SUM(CASE WHEN rsi_b = 4 THEN 1 ELSE 0 END)',
                'very_dissatisfy_rsi_c' => 'SUM(CASE WHEN rsi_c = 4 THEN 1 ELSE 0 END)',
                'very_dissatisfy_rsi_d' => 'SUM(CASE WHEN rsi_d = 4 THEN 1 ELSE 0 END)',
                'very_dissatisfy_tv_a' => 'SUM(CASE WHEN tv_a = 4 THEN 1 ELSE 0 END)',
                'very_dissatisfy_tv_b' => 'SUM(CASE WHEN tv_b = 4 THEN 1 ELSE 0 END)',
                'very_dissatisfy_tv_c' => 'SUM(CASE WHEN tv_c = 4 THEN 1 ELSE 0 END)',
                'very_dissatisfy_tv_d' => 'SUM(CASE WHEN tv_d = 4 THEN 1 ELSE 0 END)',
            ])
            ->from('recruitment');
        //End

        //To get the count of each cell of the row in No Responses
        $no_responses = (new \yii\db\Query())
        ->select([
            'no_responses_qs_a' => 'SUM(CASE WHEN qs_a = 5 THEN 1 ELSE 0 END)',
            'no_responses_qs_b' => 'SUM(CASE WHEN qs_b = 5 THEN 1 ELSE 0 END)',
            'no_responses_qs_c' => 'SUM(CASE WHEN qs_c = 5 THEN 1 ELSE 0 END)',
            'no_responses_qs_d' => 'SUM(CASE WHEN qs_d = 5 THEN 1 ELSE 0 END)',
            'no_responses_rsi_a' => 'SUM(CASE WHEN rsi_a = 5 THEN 1 ELSE 0 END)',
            'no_responses_rsi_b' => 'SUM(CASE WHEN rsi_b = 5 THEN 1 ELSE 0 END)',
            'no_responses_rsi_c' => 'SUM(CASE WHEN rsi_c = 5 THEN 1 ELSE 0 END)',
            'no_responses_rsi_d' => 'SUM(CASE WHEN rsi_d = 5 THEN 1 ELSE 0 END)',
            'no_responses_tv_a' => 'SUM(CASE WHEN tv_a = 5 THEN 1 ELSE 0 END)',
            'no_responses_tv_b' => 'SUM(CASE WHEN tv_b = 5 THEN 1 ELSE 0 END)',
            'no_responses_tv_c' => 'SUM(CASE WHEN tv_c = 5 THEN 1 ELSE 0 END)',
            'no_responses_tv_d' => 'SUM(CASE WHEN tv_d = 5 THEN 1 ELSE 0 END)',
        ])
        ->from('recruitment');
         //End

        //To get the count of each cell of the row in For Validation
        $for_validation = (new \yii\db\Query())
        ->select([
            'for_validation_qs_a' => 'SUM(CASE WHEN qs_a = 6 THEN 1 ELSE 0 END)',
            'for_validation_qs_b' => 'SUM(CASE WHEN qs_b = 6 THEN 1 ELSE 0 END)',
            'for_validation_qs_c' => 'SUM(CASE WHEN qs_c = 6 THEN 1 ELSE 0 END)',
            'for_validation_qs_d' => 'SUM(CASE WHEN qs_d = 6 THEN 1 ELSE 0 END)',
            'for_validation_rsi_a' => 'SUM(CASE WHEN rsi_a = 6 THEN 1 ELSE 0 END)',
            'for_validation_rsi_b' => 'SUM(CASE WHEN rsi_b = 6 THEN 1 ELSE 0 END)',
            'for_validation_rsi_c' => 'SUM(CASE WHEN rsi_c = 6 THEN 1 ELSE 0 END)',
            'for_validation_rsi_d' => 'SUM(CASE WHEN rsi_d = 6 THEN 1 ELSE 0 END)',
            'for_validation_tv_a' => 'SUM(CASE WHEN tv_a = 6 THEN 1 ELSE 0 END)',
            'for_validation_tv_b' => 'SUM(CASE WHEN tv_b = 6 THEN 1 ELSE 0 END)',
            'for_validation_tv_c' => 'SUM(CASE WHEN tv_c = 6 THEN 1 ELSE 0 END)',
            'for_validation_tv_d' => 'SUM(CASE WHEN tv_d = 6 THEN 1 ELSE 0 END)',
        ])
        ->from('recruitment');
        //End

        //To get the count of each cell of the row in Very Dissatisfied
        $overall = (new \yii\db\Query())
        ->select([
            'overall_very_satisfy' => 'SUM(CASE WHEN osr = 1 THEN 1 ELSE 0 END)',
            'overall_satisfy' => 'SUM(CASE WHEN osr = 2 THEN 1 ELSE 0 END)',
            'overall_dissatisfy' => 'SUM(CASE WHEN osr = 3 THEN 1 ELSE 0 END)',
            'overall_very_dissatisfy' => 'SUM(CASE WHEN osr = 4 THEN 1 ELSE 0 END)',
            'overall_no_responses' => 'SUM(CASE WHEN osr = 5 THEN 1 ELSE 0 END)',
            'overall_for_validation' => 'SUM(CASE WHEN osr = 6 THEN 1 ELSE 0 END)',
        ])
        ->from('recruitment');
            //End

        $results = $query->all();
        $data_satisfy = $query_satisfy->all();
        $data_dissatisfy = $dissatisfy->all();
        $data_very_dissatisfy = $very_dissatisfy->all();
        $data_no_responses = $no_responses->all();
        $data_for_validation = $for_validation->all();
        $data_overall = $overall->all();

        //To ge the total response total count of the response
        $total_count = (new \yii\db\Query())
            ->select(['COUNT(*) as total_count'])
            ->from('recruitment')
            ->scalar();
        
        //Average and Percentage of Very Satisfy
        $total_sum = 0;
        foreach ($results as $row) {
            foreach ($row as $count) {
                $total_sum += $count;
            }
        }

        $num_columns = count($results[0]);
        $average = $total_sum / $num_columns;

        $percentage = intval(($average / $total_count) * 100);
        //End

        //Average and Percentage of Satisfy
        $total_sum_satisfy = 0;
        foreach ($data_satisfy as $row) {
            foreach ($row as $count) {
                $total_sum_satisfy += $count;
            }
        }

        $average_satisfy = $total_sum_satisfy / $num_columns;

        $percentage_satisfy = intval(($average_satisfy / $total_count) * 100);
        //End

        //Average and Percentage of Dissatisfied
        $total_sum_dissatisfy = 0;
        foreach ($data_dissatisfy as $row) {
            foreach ($row as $count) {
                $total_sum_dissatisfy += $count;
            }
        }

        $average_dissatisfy = $total_sum_dissatisfy / $num_columns;

        $percentage_dissatisfy = intval(($average_dissatisfy / $total_count) * 100);
        //End

        //Average and Percentage of Very Dissatisfied
        $total_sum_very_dissatisfy = 0;
        foreach ($data_very_dissatisfy as $row) {
            foreach ($row as $count) {
                $total_sum_very_dissatisfy += $count;
            }
        }

        $average_very_dissatisfy = $total_sum_very_dissatisfy / $num_columns;

        $percentage_very_dissatisfy = intval(($average_very_dissatisfy / $total_count) * 100);
        //End

        //Average and Percentage of No Responses
        $total_sum_no_response = 0;
        foreach ($data_no_responses as $row) {
            foreach ($row as $count) {
                $total_sum_no_response += $count;
            }
        }

        $average_no_response = $total_sum_no_response / $num_columns;

        $percentage_no_response = round(($average_no_response / $total_count) * 100);
        //End

        //Average and Percentage of For Validation
        $total_sum_for_validation = 0;
        foreach ($data_for_validation as $row) {
            foreach ($row as $count) {
                $total_sum_for_validation += $count;
            }
        }

        $average_for_validation = $total_sum_for_validation / $num_columns;

        $percentage_for_validation = round(($average_for_validation / $total_count) * 100);
        //End

        
        //To get the Satisfaction(%)

            // Define an array to hold satisfaction values for each column
            $satisfaction = [];

            // Define the columns to iterate over
            $columns = ['qs_a', 'qs_b', 'qs_c', 'qs_d',
                        'rsi_a', 'rsi_b', 'rsi_c', 'rsi_d',
                        'tv_a', 'tv_b', 'tv_c', 'tv_d'];

            // Loop over each column
            foreach ($columns as $column) {
                // Initialize variables for very satisfaction and satisfaction for current column
                $very_satisfy = 0;
                $satisfy = 0;

                // Get very satisfaction count from $results
                foreach ($results as $data) {
                    $very_satisfy += $data["count_$column"];
                }

                // Get satisfaction count from $data_satisfy
                foreach ($data_satisfy as $data) {
                    $satisfy += $data["satisfy_$column"];
                }

                // Calculate satisfaction percentage for current column
                $satisfaction[$column] = intval(($very_satisfy + $satisfy) / $total_count * 100);
            }
            $responsiveness_satisfaction = ($satisfaction['qs_b'] + $satisfaction['qs_c']) / 2; 
            $reliability_satisfaction = ($satisfaction['qs_a'] + $satisfaction['rsi_c']) / 2; 
            $outcome_satisfaction = ($satisfaction['qs_d'] + $satisfaction['rsi_a']) / 2; 
            $facilities_satisfaction = ($satisfaction['tv_a'] + $satisfaction['tv_b'] + $satisfaction['tv_c'] + $satisfaction['tv_d']) / 4;
            $comms_satisfaction = $satisfaction['rsi_b'];
            $integrity_satisfaction = $satisfaction['rsi_d'];

            $overall_satisfaction = round(($responsiveness_satisfaction + $reliability_satisfaction + $outcome_satisfaction + $facilities_satisfaction + $comms_satisfaction + $integrity_satisfaction) / 6, 2);

            // Now $satisfaction array holds satisfaction values for each column

        //End

        //CSF SCORE

            //add ang no responses and for validation

            $query_qs_a = array_sum(array_column($results, 'count_qs_a'));
            $satisfy_qs_a = array_sum(array_column($query_satisfy->all(), 'satisfy_qs_a'));
            $dissatisfy_qs_a = array_sum(array_column($dissatisfy->all(), 'dissatisfy_qs_a'));
            $very_dissatisfy_qs_a = array_sum(array_column($very_dissatisfy->all(), 'very_dissatisfy_qs_a'));

            $qs_score = round( (($query_qs_a * 4) + ($satisfy_qs_a * 3) + ($dissatisfy_qs_a * 2) + ($very_dissatisfy_qs_a * 1)) / $total_count, 2);

            $query_qs_b = array_sum(array_column($query->all(), 'count_qs_b'));
            $satisfy_qs_b = array_sum(array_column($query_satisfy->all(), 'satisfy_qs_b'));
            $dissatisfy_qs_b = array_sum(array_column($dissatisfy->all(), 'dissatisfy_qs_b'));
            $very_dissatisfy_qs_b = array_sum(array_column($very_dissatisfy->all(), 'very_dissatisfy_qs_b'));
            
            $qs_b_score = round( (($query_qs_b * 4) + ($satisfy_qs_b * 3) + ($dissatisfy_qs_b * 2) + ($very_dissatisfy_qs_b * 1)) / $total_count, 2);

            $query_qs_c = array_sum(array_column($query->all(), 'count_qs_c'));
            $satisfy_qs_c = array_sum(array_column($query_satisfy->all(), 'satisfy_qs_c'));
            $dissatisfy_qs_c = array_sum(array_column($dissatisfy->all(), 'dissatisfy_qs_c'));
            $very_dissatisfy_qs_c = array_sum(array_column($very_dissatisfy->all(), 'very_dissatisfy_qs_c'));
            
            $qs_c_score = round((($query_qs_c * 4) + ($satisfy_qs_c * 3) + ($dissatisfy_qs_c * 2) + ($very_dissatisfy_qs_c * 1)) / $total_count, 2);

            $query_qs_d = array_sum(array_column($query->all(), 'count_qs_d'));
            $satisfy_qs_d = array_sum(array_column($query_satisfy->all(), 'satisfy_qs_d'));
            $dissatisfy_qs_d = array_sum(array_column($dissatisfy->all(), 'dissatisfy_qs_d'));
            $very_dissatisfy_qs_d = array_sum(array_column($very_dissatisfy->all(), 'very_dissatisfy_qs_d'));
            
            $qs_d_score = round((($query_qs_d * 4) + ($satisfy_qs_d * 3) + ($dissatisfy_qs_d * 2) + ($very_dissatisfy_qs_d * 1)) / $total_count, 2);

            $query_rsi_a = array_sum(array_column($query->all(), 'count_rsi_a'));
            $satisfy_rsi_a = array_sum(array_column($query_satisfy->all(), 'satisfy_rsi_a'));
            $dissatisfy_rsi_a = array_sum(array_column($dissatisfy->all(), 'dissatisfy_rsi_a'));
            $very_dissatisfy_rsi_a = array_sum(array_column($very_dissatisfy->all(), 'very_dissatisfy_rsi_a'));
            
            $rsi_a_score = round((($query_rsi_a * 4) + ($satisfy_rsi_a * 3) + ($dissatisfy_rsi_a * 2) + ($very_dissatisfy_rsi_a * 1)) / $total_count, 2);

            $query_rsi_b = array_sum(array_column($query->all(), 'count_rsi_b'));
            $satisfy_rsi_b = array_sum(array_column($query_satisfy->all(), 'satisfy_rsi_b'));
            $dissatisfy_rsi_b = array_sum(array_column($dissatisfy->all(), 'dissatisfy_rsi_b'));
            $very_dissatisfy_rsi_b = array_sum(array_column($very_dissatisfy->all(), 'very_dissatisfy_rsi_b'));
            
            $rsi_b_score = round((($query_rsi_b * 4) + ($satisfy_rsi_b * 3) + ($dissatisfy_rsi_b * 2) + ($very_dissatisfy_rsi_b * 1)) / $total_count, 2);

            $query_rsi_c = array_sum(array_column($query->all(), 'count_rsi_c'));
            $satisfy_rsi_c = array_sum(array_column($query_satisfy->all(), 'satisfy_rsi_c'));
            $dissatisfy_rsi_c = array_sum(array_column($dissatisfy->all(), 'dissatisfy_rsi_c'));
            $very_dissatisfy_rsi_c = array_sum(array_column($very_dissatisfy->all(), 'very_dissatisfy_rsi_c'));
            
            $rsi_c_score = round((($query_rsi_c * 4) + ($satisfy_rsi_c * 3) + ($dissatisfy_rsi_c * 2) + ($very_dissatisfy_rsi_c * 1)) / $total_count, 2);

            $query_rsi_d = array_sum(array_column($query->all(), 'count_rsi_d'));
            $satisfy_rsi_d = array_sum(array_column($query_satisfy->all(), 'satisfy_rsi_d'));
            $dissatisfy_rsi_d = array_sum(array_column($dissatisfy->all(), 'dissatisfy_rsi_d'));
            $very_dissatisfy_rsi_d = array_sum(array_column($very_dissatisfy->all(), 'very_dissatisfy_rsi_d'));
            
            $rsi_d_score = round((($query_rsi_d * 4) + ($satisfy_rsi_d * 3) + ($dissatisfy_rsi_d * 2) + ($very_dissatisfy_rsi_d * 1)) / $total_count, 2);

            $query_tv_a = array_sum(array_column($query->all(), 'count_tv_a'));
            $satisfy_tv_a = array_sum(array_column($query_satisfy->all(), 'satisfy_tv_a'));
            $dissatisfy_tv_a = array_sum(array_column($dissatisfy->all(), 'dissatisfy_tv_a'));
            $very_dissatisfy_tv_a = array_sum(array_column($very_dissatisfy->all(), 'very_dissatisfy_tv_a'));
            
            $tv_a_score = round((($query_tv_a * 4) + ($satisfy_tv_a * 3) + ($dissatisfy_tv_a * 2) + ($very_dissatisfy_tv_a * 1)) / $total_count, 2);

            $query_tv_b = array_sum(array_column($query->all(), 'count_tv_b'));
            $satisfy_tv_b = array_sum(array_column($query_satisfy->all(), 'satisfy_tv_b'));
            $dissatisfy_tv_b = array_sum(array_column($dissatisfy->all(), 'dissatisfy_tv_b'));
            $very_dissatisfy_tv_b = array_sum(array_column($very_dissatisfy->all(), 'very_dissatisfy_tv_b'));
            
            $tv_b_score = round((($query_tv_b * 4) + ($satisfy_tv_b * 3) + ($dissatisfy_tv_b * 2) + ($very_dissatisfy_tv_b * 1)) / $total_count, 2);

            $query_tv_c = array_sum(array_column($query->all(), 'count_tv_c'));
            $satisfy_tv_c = array_sum(array_column($query_satisfy->all(), 'satisfy_tv_c'));
            $dissatisfy_tv_c = array_sum(array_column($dissatisfy->all(), 'dissatisfy_tv_c'));
            $very_dissatisfy_tv_c = array_sum(array_column($very_dissatisfy->all(), 'very_dissatisfy_tv_c'));
            
            $tv_c_score = round((($query_tv_c * 4) + ($satisfy_tv_c * 3) + ($dissatisfy_tv_c * 2) + ($very_dissatisfy_tv_c * 1)) / $total_count, 2);

            $query_tv_d = array_sum(array_column($query->all(), 'count_tv_d'));
            $satisfy_tv_d = array_sum(array_column($query_satisfy->all(), 'satisfy_tv_d'));
            $dissatisfy_tv_d = array_sum(array_column($dissatisfy->all(), 'dissatisfy_tv_d'));
            $very_dissatisfy_tv_d = array_sum(array_column($very_dissatisfy->all(), 'very_dissatisfy_tv_d'));
            
            $tv_d_score = round((($query_tv_d * 4) + ($satisfy_tv_d * 3) + ($dissatisfy_tv_d * 2) + ($very_dissatisfy_tv_d * 1)) / $total_count, 2);

        //END


        //CSF RATING

            $qs_a_rating = ($qs_score / 4) * 100;
            $qs_b_rating = ($qs_b_score / 4) * 100;
            $qs_c_rating = ($qs_c_score / 4) * 100;
            $qs_d_rating = ($qs_d_score / 4) * 100;

            $rsi_a_rating = ($rsi_a_score / 4) * 100;
            $rsi_b_rating = ($rsi_b_score / 4) * 100;
            $rsi_c_rating = ($rsi_c_score / 4) * 100;
            $rsi_d_rating = ($rsi_d_score / 4) * 100;

            $tv_a_rating = ($tv_a_score / 4) * 100;
            $tv_b_rating = ($tv_b_score / 4) * 100;
            $tv_c_rating = ($tv_c_score / 4) * 100;
            $tv_d_rating = ($tv_d_score / 4) * 100;


        //END


        //(ARTA) DIMENSION

            $responsiveness = round(($qs_b_score + $qs_c_score) / 2, 2);
            $reliability = round(($qs_score + $rsi_c_score) / 2, 2);
            $outcome = round(($qs_d_score + $rsi_a_score) / 2, 2);
            $access_facilities = round(($tv_a_score + $tv_b_score + $tv_c_score + $tv_d_score) / 2, 2);
            //COMMS from the rsi_b_score
            //INTEGRITY from the rsi_d_score

            $overall_ave = round(($responsiveness + $reliability + $outcome + $access_facilities + $rsi_b_score + $rsi_d_score) / 6, 2);
            $overall_rating = ($overall_ave / 4) * 100;

        //END

        //(ARTA) DIMENSION



        //END

        //(ARTA) OVERALL SATISFACTION

            $overall_very_satisfy = array_sum(array_column($data_overall, 'overall_very_satisfy'));
            $overall_very_satisfy_rating = round($overall_very_satisfy / $total_count * 100);

            $overall_satisfy = array_sum(array_column($data_overall, 'overall_satisfy'));
            $overall_satisfy_rating = round($overall_satisfy / $total_count * 100);

            $overall_dissatisfy = array_sum(array_column($data_overall, 'overall_dissatisfy'));
            $overall_dissatisfy_rating = round($overall_dissatisfy / $total_count * 100);

            $overall_very_dissatisfy = array_sum(array_column($data_overall, 'overall_very_dissatisfy'));
            $overall_very_dissatisfy_rating = round($overall_very_dissatisfy / $total_count * 100);

            $total_overall_satisfaction = $overall_very_satisfy_rating + $overall_satisfy_rating + $overall_dissatisfy_rating + $overall_very_dissatisfy_rating;

            $sum = $overall_very_satisfy_rating + $overall_satisfy_rating;

        //END

        //CRITERIA

        $quality_service = round(($qs_score + $qs_b_score + $qs_c_score + $qs_d_score) / 4, 2 );
        $dti_staff = round(($rsi_a_score + $rsi_b_score + $rsi_c_score + $rsi_d_score) / 4, 2 );
        $venue = round(($tv_a_score + $tv_b_score + $tv_c_score + $tv_d_score) / 4, 2 );

        $overall_criteria = round(($quality_service + $dti_staff + $venue) / 3, 2);
        $overall_criteria_rating = ($overall_criteria / 4) * 100;

        //END

        //SEX DISAGGREGATE

        $count_sex = (new \yii\db\Query())
        ->select([
            'count_male' => 'SUM(CASE WHEN sex = 4 THEN 1 ELSE 0 END)',
            'count_female' => 'SUM(CASE WHEN sex = 5 THEN 1 ELSE 0 END)',
        ])
        ->from('csf');

        $data_sex = $count_sex->one();

        $count_male = $data_sex['count_male'];
        $count_female = $data_sex['count_female'];


        $total_sex = $count_male + $count_female;

        $male_percent = round(($count_male / $total_sex) * 100);
        $female_percent = round(($count_female / $total_sex) * 100);

        $total_sex_percent = $male_percent + $female_percent;

        //END

        return $this->renderPartial('recruitments-tabulation', [
            //'data' => $data,
            'results' => $results,
            'data_satisfy' => $data_satisfy,
            'data_dissatisfy' => $data_dissatisfy,
            'data_very_dissatisfy' => $data_very_dissatisfy,
            'data_no_responses' => $data_no_responses,
            'data_for_validation' => $data_for_validation,
            'count_male' => $count_male,
            'count_female' => $count_female,
            'total_count' => $total_count,
            'total_sex' => $total_sex,
            'total_sex_percent' => $total_sex_percent,
            'percentage' => $percentage,
            'percentage_satisfy' => $percentage_satisfy,
            'percentage_dissatisfy' => $percentage_dissatisfy,
            'percentage_very_dissatisfy' => $percentage_very_dissatisfy,
            'percentage_no_response' => $percentage_no_response,
            'percentage_for_validation' => $percentage_for_validation,
            'male_percent' => $male_percent,
            'female_percent' => $female_percent,
            'satisfaction' => $satisfaction,
            'qs_score' => $qs_score,
            'qs_b_score' => $qs_b_score,
            'qs_c_score' => $qs_c_score,
            'qs_d_score' => $qs_d_score,
            'rsi_a_score' => $rsi_a_score,
            'rsi_b_score' => $rsi_b_score,
            'rsi_c_score' => $rsi_c_score,
            'rsi_d_score' => $rsi_d_score,
            'tv_a_score' => $tv_a_score,
            'tv_b_score' => $tv_b_score,
            'tv_c_score' => $tv_c_score,
            'tv_d_score' => $tv_d_score,
            'qs_a_rating' => $qs_a_rating,
            'qs_b_rating' => $qs_b_rating,
            'qs_c_rating' => $qs_c_rating,
            'qs_d_rating' => $qs_d_rating,
            'rsi_a_rating' => $rsi_a_rating,
            'rsi_b_rating' => $rsi_b_rating,
            'rsi_c_rating' => $rsi_c_rating,
            'rsi_d_rating' => $rsi_d_rating,
            'tv_a_rating' => $tv_a_rating,
            'tv_b_rating' => $tv_b_rating,
            'tv_c_rating' => $tv_c_rating,
            'tv_d_rating' => $tv_d_rating,
            'responsiveness' => $responsiveness,
            'reliability' => $reliability,
            'outcome' => $outcome,
            'access_facilities' => $access_facilities,
            'overall_ave' => $overall_ave,
            'overall_rating' => $overall_rating,
            'overall_very_satisfy_rating' => $overall_very_satisfy_rating,
            'overall_satisfy_rating' => $overall_satisfy_rating,
            'overall_dissatisfy_rating' => $overall_dissatisfy_rating,
            'overall_very_dissatisfy_rating' => $overall_very_dissatisfy_rating,
            'total_overall_satisfaction' => $total_overall_satisfaction,
            'sum' => $sum,
            'responsiveness_satisfaction' => $responsiveness_satisfaction,
            'reliability_satisfaction' => $reliability_satisfaction,
            'outcome_satisfaction' => $outcome_satisfaction,
            'facilities_satisfaction' => $facilities_satisfaction,
            'comms_satisfaction' => $comms_satisfaction,
            'integrity_satisfaction' => $integrity_satisfaction,
            'overall_satisfaction' => $overall_satisfaction,
            'quality_service' => $quality_service,
            'dti_staff' => $dti_staff,
            'venue' => $venue,
            'overall_criteria' => $overall_criteria,
            'overall_criteria_rating' => $overall_criteria_rating,
        ]);
    }
}
