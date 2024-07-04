<?php

namespace frontend\controllers;

use frontend\models\TdOnline;
use frontend\models\Comments;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;

/**
 * TdOnlineController implements the CRUD actions for TdOnline model.
 */
class TdOnlineController extends Controller
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
     * Lists all TdOnline models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => TdOnline::find(),
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
     * Displays a single TdOnline model.
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
     * Creates a new TdOnline model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new TdOnline();

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
     * Updates an existing TdOnline model.
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
     * Deletes an existing TdOnline model.
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
     * Finds the TdOnline model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return TdOnline the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TdOnline::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    public function actionTrainingOnline($process_id)
    {
        $model = new TdOnline();
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

        return $this->renderPartial('training-online', [
            'model' => $model,
            'commentsmodel' => $commentsmodel,
        ]);
    }

    public function actionTrainingOnlineTabulation()
    {
        //To get the count of each cell of the row in Very Satisfied
        $very_satisfy = (new \yii\db\Query())
        ->select([
            'very_satisfy_ocd_a' => 'SUM(CASE WHEN ocd_a = 1 THEN 1 ELSE 0 END)',
            'very_satisfy_ocd_b' => 'SUM(CASE WHEN ocd_b = 1 THEN 1 ELSE 0 END)',
            'very_satisfy_ocd_c' => 'SUM(CASE WHEN ocd_c = 1 THEN 1 ELSE 0 END)',
            'very_satisfy_ocd_d' => 'SUM(CASE WHEN ocd_d = 1 THEN 1 ELSE 0 END)',
            'very_satisfy_ocd_e' => 'SUM(CASE WHEN ocd_e = 1 THEN 1 ELSE 0 END)',
            'very_satisfy_meth_a' => 'SUM(CASE WHEN meth_a = 1 THEN 1 ELSE 0 END)',
            'very_satisfy_meth_b' => 'SUM(CASE WHEN meth_b = 1 THEN 1 ELSE 0 END)',
            'very_satisfy_meth_c' => 'SUM(CASE WHEN meth_c = 1 THEN 1 ELSE 0 END)',
            'very_satisfy_meth_d' => 'SUM(CASE WHEN meth_d = 1 THEN 1 ELSE 0 END)',
            'very_satisfy_meth_e' => 'SUM(CASE WHEN meth_d = 1 THEN 1 ELSE 0 END)',
            'very_satisfy_rs1_a' => 'SUM(CASE WHEN rs1_a = 1 THEN 1 ELSE 0 END)',
            'very_satisfy_rs1_b' => 'SUM(CASE WHEN rs1_b = 1 THEN 1 ELSE 0 END)',
            'very_satisfy_rs1_c' => 'SUM(CASE WHEN rs1_c = 1 THEN 1 ELSE 0 END)',
            'very_satisfy_rs1_d' => 'SUM(CASE WHEN rs1_d = 1 THEN 1 ELSE 0 END)',
            'very_satisfy_rs2_a' => 'SUM(CASE WHEN rs2_a = 1 THEN 1 ELSE 0 END)',
            'very_satisfy_rs2_b' => 'SUM(CASE WHEN rs2_b = 1 THEN 1 ELSE 0 END)',
            'very_satisfy_rs2_c' => 'SUM(CASE WHEN rs2_c = 1 THEN 1 ELSE 0 END)',
            'very_satisfy_rs2_d' => 'SUM(CASE WHEN rs2_d = 1 THEN 1 ELSE 0 END)',
            'very_satisfy_rs3_a' => 'SUM(CASE WHEN rs3_a = 1 THEN 1 ELSE 0 END)',
            'very_satisfy_rs3_b' => 'SUM(CASE WHEN rs3_b = 1 THEN 1 ELSE 0 END)',
            'very_satisfy_rs3_c' => 'SUM(CASE WHEN rs3_c = 1 THEN 1 ELSE 0 END)',
            'very_satisfy_rs3_d' => 'SUM(CASE WHEN rs3_d = 1 THEN 1 ELSE 0 END)',
            'very_satisfy_trn_host_a' => 'SUM(CASE WHEN trn_host_a = 1 THEN 1 ELSE 0 END)',
            'very_satisfy_trn_host_b' => 'SUM(CASE WHEN trn_host_b = 1 THEN 1 ELSE 0 END)',
            'very_satisfy_trn_host_c' => 'SUM(CASE WHEN trn_host_c = 1 THEN 1 ELSE 0 END)',
            'very_satisfy_trn_host_d' => 'SUM(CASE WHEN trn_host_d = 1 THEN 1 ELSE 0 END)',
            'very_satisfy_vp_a' => 'SUM(CASE WHEN vp_a = 1 THEN 1 ELSE 0 END)',
            'very_satisfy_vp_b' => 'SUM(CASE WHEN vp_b = 1 THEN 1 ELSE 0 END)',
            'very_satisfy_vp_c' => 'SUM(CASE WHEN vp_c = 1 THEN 1 ELSE 0 END)',
        ])
        ->from('td_online')
        ->all();
        //END

        //To get the count of each cell of the row in Satisfied
        $satisfy = (new \yii\db\Query())
        ->select([
            'satisfy_ocd_a' => 'SUM(CASE WHEN ocd_a = 2 THEN 1 ELSE 0 END)',
            'satisfy_ocd_b' => 'SUM(CASE WHEN ocd_b = 2 THEN 1 ELSE 0 END)',
            'satisfy_ocd_c' => 'SUM(CASE WHEN ocd_c = 2 THEN 1 ELSE 0 END)',
            'satisfy_ocd_d' => 'SUM(CASE WHEN ocd_d = 2 THEN 1 ELSE 0 END)',
            'satisfy_ocd_e' => 'SUM(CASE WHEN ocd_e = 2 THEN 1 ELSE 0 END)',
            'satisfy_meth_a' => 'SUM(CASE WHEN meth_a = 2 THEN 1 ELSE 0 END)',
            'satisfy_meth_b' => 'SUM(CASE WHEN meth_b = 2 THEN 1 ELSE 0 END)',
            'satisfy_meth_c' => 'SUM(CASE WHEN meth_c = 2 THEN 1 ELSE 0 END)',
            'satisfy_meth_d' => 'SUM(CASE WHEN meth_d = 2 THEN 1 ELSE 0 END)',
            'satisfy_meth_e' => 'SUM(CASE WHEN meth_d = 2 THEN 1 ELSE 0 END)',
            'satisfy_rs1_a' => 'SUM(CASE WHEN rs1_a = 2 THEN 1 ELSE 0 END)',
            'satisfy_rs1_b' => 'SUM(CASE WHEN rs1_b = 2 THEN 1 ELSE 0 END)',
            'satisfy_rs1_c' => 'SUM(CASE WHEN rs1_c = 2 THEN 1 ELSE 0 END)',
            'satisfy_rs1_d' => 'SUM(CASE WHEN rs1_d = 2 THEN 1 ELSE 0 END)',
            'satisfy_rs2_a' => 'SUM(CASE WHEN rs2_a = 2 THEN 1 ELSE 0 END)',
            'satisfy_rs2_b' => 'SUM(CASE WHEN rs2_b = 2 THEN 1 ELSE 0 END)',
            'satisfy_rs2_c' => 'SUM(CASE WHEN rs2_c = 2 THEN 1 ELSE 0 END)',
            'satisfy_rs2_d' => 'SUM(CASE WHEN rs2_d = 2 THEN 1 ELSE 0 END)',
            'satisfy_rs3_a' => 'SUM(CASE WHEN rs3_a = 2 THEN 1 ELSE 0 END)',
            'satisfy_rs3_b' => 'SUM(CASE WHEN rs3_b = 2 THEN 1 ELSE 0 END)',
            'satisfy_rs3_c' => 'SUM(CASE WHEN rs3_c = 2 THEN 1 ELSE 0 END)',
            'satisfy_rs3_d' => 'SUM(CASE WHEN rs3_d = 2 THEN 1 ELSE 0 END)',
            'satisfy_trn_host_a' => 'SUM(CASE WHEN trn_host_a = 2 THEN 1 ELSE 0 END)',
            'satisfy_trn_host_b' => 'SUM(CASE WHEN trn_host_b = 2 THEN 1 ELSE 0 END)',
            'satisfy_trn_host_c' => 'SUM(CASE WHEN trn_host_c = 2 THEN 1 ELSE 0 END)',
            'satisfy_trn_host_d' => 'SUM(CASE WHEN trn_host_d = 2 THEN 1 ELSE 0 END)',
            'satisfy_vp_a' => 'SUM(CASE WHEN vp_a = 2 THEN 1 ELSE 0 END)',
            'satisfy_vp_b' => 'SUM(CASE WHEN vp_b = 2 THEN 1 ELSE 0 END)',
            'satisfy_vp_c' => 'SUM(CASE WHEN vp_c = 2 THEN 1 ELSE 0 END)',
        ])
        ->from('td_online')
        ->all();
        //END

      //To get the count of each cell of the row in Dissatisfied
        $dissatisfy = (new \yii\db\Query())
        ->select([
            'dissatisfy_ocd_a' => 'SUM(CASE WHEN ocd_a = 3 THEN 1 ELSE 0 END)',
            'dissatisfy_ocd_b' => 'SUM(CASE WHEN ocd_b = 3 THEN 1 ELSE 0 END)',
            'dissatisfy_ocd_c' => 'SUM(CASE WHEN ocd_c = 3 THEN 1 ELSE 0 END)',
            'dissatisfy_ocd_d' => 'SUM(CASE WHEN ocd_d = 3 THEN 1 ELSE 0 END)',
            'dissatisfy_ocd_e' => 'SUM(CASE WHEN ocd_e = 3 THEN 1 ELSE 0 END)',
            'dissatisfy_meth_a' => 'SUM(CASE WHEN meth_a = 3 THEN 1 ELSE 0 END)',
            'dissatisfy_meth_b' => 'SUM(CASE WHEN meth_b = 3 THEN 1 ELSE 0 END)',
            'dissatisfy_meth_c' => 'SUM(CASE WHEN meth_c = 3 THEN 1 ELSE 0 END)',
            'dissatisfy_meth_d' => 'SUM(CASE WHEN meth_d = 3 THEN 1 ELSE 0 END)',
            'dissatisfy_meth_e' => 'SUM(CASE WHEN meth_d = 3 THEN 1 ELSE 0 END)',
            'dissatisfy_rs1_a' => 'SUM(CASE WHEN rs1_a = 3 THEN 1 ELSE 0 END)',
            'dissatisfy_rs1_b' => 'SUM(CASE WHEN rs1_b = 3 THEN 1 ELSE 0 END)',
            'dissatisfy_rs1_c' => 'SUM(CASE WHEN rs1_c = 3 THEN 1 ELSE 0 END)',
            'dissatisfy_rs1_d' => 'SUM(CASE WHEN rs1_d = 3 THEN 1 ELSE 0 END)',
            'dissatisfy_rs2_a' => 'SUM(CASE WHEN rs2_a = 3 THEN 1 ELSE 0 END)',
            'dissatisfy_rs2_b' => 'SUM(CASE WHEN rs2_b = 3 THEN 1 ELSE 0 END)',
            'dissatisfy_rs2_c' => 'SUM(CASE WHEN rs2_c = 3 THEN 1 ELSE 0 END)',
            'dissatisfy_rs2_d' => 'SUM(CASE WHEN rs2_d = 3 THEN 1 ELSE 0 END)',
            'dissatisfy_rs3_a' => 'SUM(CASE WHEN rs3_a = 3 THEN 1 ELSE 0 END)',
            'dissatisfy_rs3_b' => 'SUM(CASE WHEN rs3_b = 3 THEN 1 ELSE 0 END)',
            'dissatisfy_rs3_c' => 'SUM(CASE WHEN rs3_c = 3 THEN 1 ELSE 0 END)',
            'dissatisfy_rs3_d' => 'SUM(CASE WHEN rs3_d = 3 THEN 1 ELSE 0 END)',
            'dissatisfy_trn_host_a' => 'SUM(CASE WHEN trn_host_a = 3 THEN 1 ELSE 0 END)',
            'dissatisfy_trn_host_b' => 'SUM(CASE WHEN trn_host_b = 3 THEN 1 ELSE 0 END)',
            'dissatisfy_trn_host_c' => 'SUM(CASE WHEN trn_host_c = 3 THEN 1 ELSE 0 END)',
            'dissatisfy_trn_host_d' => 'SUM(CASE WHEN trn_host_d = 3 THEN 1 ELSE 0 END)',
            'dissatisfy_vp_a' => 'SUM(CASE WHEN vp_a = 3 THEN 1 ELSE 0 END)',
            'dissatisfy_vp_b' => 'SUM(CASE WHEN vp_b = 3 THEN 1 ELSE 0 END)',
            'dissatisfy_vp_c' => 'SUM(CASE WHEN vp_c = 3 THEN 1 ELSE 0 END)',
        ])
        ->from('td_online')
        ->all();
        //END

        //To get the count of each cell of the row in Very Dissatisfied
        $very_dissatisfy = (new \yii\db\Query())
        ->select([
            'very_dissatisfy_ocd_a' => 'SUM(CASE WHEN ocd_a = 4 THEN 1 ELSE 0 END)',
            'very_dissatisfy_ocd_b' => 'SUM(CASE WHEN ocd_b = 4 THEN 1 ELSE 0 END)',
            'very_dissatisfy_ocd_c' => 'SUM(CASE WHEN ocd_c = 4 THEN 1 ELSE 0 END)',
            'very_dissatisfy_ocd_d' => 'SUM(CASE WHEN ocd_d = 4 THEN 1 ELSE 0 END)',
            'very_dissatisfy_ocd_e' => 'SUM(CASE WHEN ocd_e = 4 THEN 1 ELSE 0 END)',
            'very_dissatisfy_meth_a' => 'SUM(CASE WHEN meth_a = 4 THEN 1 ELSE 0 END)',
            'very_dissatisfy_meth_b' => 'SUM(CASE WHEN meth_b = 4 THEN 1 ELSE 0 END)',
            'very_dissatisfy_meth_c' => 'SUM(CASE WHEN meth_c = 4 THEN 1 ELSE 0 END)',
            'very_dissatisfy_meth_d' => 'SUM(CASE WHEN meth_d = 4 THEN 1 ELSE 0 END)',
            'very_dissatisfy_meth_e' => 'SUM(CASE WHEN meth_d = 4 THEN 1 ELSE 0 END)',
            'very_dissatisfy_rs1_a' => 'SUM(CASE WHEN rs1_a = 4 THEN 1 ELSE 0 END)',
            'very_dissatisfy_rs1_b' => 'SUM(CASE WHEN rs1_b = 4 THEN 1 ELSE 0 END)',
            'very_dissatisfy_rs1_c' => 'SUM(CASE WHEN rs1_c = 4 THEN 1 ELSE 0 END)',
            'very_dissatisfy_rs1_d' => 'SUM(CASE WHEN rs1_d = 4 THEN 1 ELSE 0 END)',
            'very_dissatisfy_rs2_a' => 'SUM(CASE WHEN rs2_a = 4 THEN 1 ELSE 0 END)',
            'very_dissatisfy_rs2_b' => 'SUM(CASE WHEN rs2_b = 4 THEN 1 ELSE 0 END)',
            'very_dissatisfy_rs2_c' => 'SUM(CASE WHEN rs2_c = 4 THEN 1 ELSE 0 END)',
            'very_dissatisfy_rs2_d' => 'SUM(CASE WHEN rs2_d = 4 THEN 1 ELSE 0 END)',
            'very_dissatisfy_rs3_a' => 'SUM(CASE WHEN rs3_a = 4 THEN 1 ELSE 0 END)',
            'very_dissatisfy_rs3_b' => 'SUM(CASE WHEN rs3_b = 4 THEN 1 ELSE 0 END)',
            'very_dissatisfy_rs3_c' => 'SUM(CASE WHEN rs3_c = 4 THEN 1 ELSE 0 END)',
            'very_dissatisfy_rs3_d' => 'SUM(CASE WHEN rs3_d = 4 THEN 1 ELSE 0 END)',
            'very_dissatisfy_trn_host_a' => 'SUM(CASE WHEN trn_host_a = 4 THEN 1 ELSE 0 END)',
            'very_dissatisfy_trn_host_b' => 'SUM(CASE WHEN trn_host_b = 4 THEN 1 ELSE 0 END)',
            'very_dissatisfy_trn_host_c' => 'SUM(CASE WHEN trn_host_c = 4 THEN 1 ELSE 0 END)',
            'very_dissatisfy_trn_host_d' => 'SUM(CASE WHEN trn_host_d = 4 THEN 1 ELSE 0 END)',
            'very_dissatisfy_vp_a' => 'SUM(CASE WHEN vp_a = 4 THEN 1 ELSE 0 END)',
            'very_dissatisfy_vp_b' => 'SUM(CASE WHEN vp_b = 4 THEN 1 ELSE 0 END)',
            'very_dissatisfy_vp_c' => 'SUM(CASE WHEN vp_c = 4 THEN 1 ELSE 0 END)',
        ])
        ->from('td_online')
        ->all();
        //END

        //To get the count of each cell of the row in No Response
        $no_response = (new \yii\db\Query())
        ->select([
            'no_response_ocd_a' => 'SUM(CASE WHEN ocd_a = 5 THEN 1 ELSE 0 END)',
            'no_response_ocd_b' => 'SUM(CASE WHEN ocd_b = 5 THEN 1 ELSE 0 END)',
            'no_response_ocd_c' => 'SUM(CASE WHEN ocd_c = 5 THEN 1 ELSE 0 END)',
            'no_response_ocd_d' => 'SUM(CASE WHEN ocd_d = 5 THEN 1 ELSE 0 END)',
            'no_response_ocd_e' => 'SUM(CASE WHEN ocd_e = 5 THEN 1 ELSE 0 END)',
            'no_response_meth_a' => 'SUM(CASE WHEN meth_a = 5 THEN 1 ELSE 0 END)',
            'no_response_meth_b' => 'SUM(CASE WHEN meth_b = 5 THEN 1 ELSE 0 END)',
            'no_response_meth_c' => 'SUM(CASE WHEN meth_c = 5 THEN 1 ELSE 0 END)',
            'no_response_meth_d' => 'SUM(CASE WHEN meth_d = 5 THEN 1 ELSE 0 END)',
            'no_response_meth_e' => 'SUM(CASE WHEN meth_d = 5 THEN 1 ELSE 0 END)',
            'no_response_rs1_a' => 'SUM(CASE WHEN rs1_a = 5 THEN 1 ELSE 0 END)',
            'no_response_rs1_b' => 'SUM(CASE WHEN rs1_b = 5 THEN 1 ELSE 0 END)',
            'no_response_rs1_c' => 'SUM(CASE WHEN rs1_c = 5 THEN 1 ELSE 0 END)',
            'no_response_rs1_d' => 'SUM(CASE WHEN rs1_d = 5 THEN 1 ELSE 0 END)',
            'no_response_rs2_a' => 'SUM(CASE WHEN rs2_a = 5 THEN 1 ELSE 0 END)',
            'no_response_rs2_b' => 'SUM(CASE WHEN rs2_b = 5 THEN 1 ELSE 0 END)',
            'no_response_rs2_c' => 'SUM(CASE WHEN rs2_c = 5 THEN 1 ELSE 0 END)',
            'no_response_rs2_d' => 'SUM(CASE WHEN rs2_d = 5 THEN 1 ELSE 0 END)',
            'no_response_rs3_a' => 'SUM(CASE WHEN rs3_a = 5 THEN 1 ELSE 0 END)',
            'no_response_rs3_b' => 'SUM(CASE WHEN rs3_b = 5 THEN 1 ELSE 0 END)',
            'no_response_rs3_c' => 'SUM(CASE WHEN rs3_c = 5 THEN 1 ELSE 0 END)',
            'no_response_rs3_d' => 'SUM(CASE WHEN rs3_d = 5 THEN 1 ELSE 0 END)',
            'no_response_trn_host_a' => 'SUM(CASE WHEN trn_host_a = 5 THEN 1 ELSE 0 END)',
            'no_response_trn_host_b' => 'SUM(CASE WHEN trn_host_b = 5 THEN 1 ELSE 0 END)',
            'no_response_trn_host_c' => 'SUM(CASE WHEN trn_host_c = 5 THEN 1 ELSE 0 END)',
            'no_response_trn_host_d' => 'SUM(CASE WHEN trn_host_d = 5 THEN 1 ELSE 0 END)',
            'no_response_vp_a' => 'SUM(CASE WHEN vp_a = 5 THEN 1 ELSE 0 END)',
            'no_response_vp_b' => 'SUM(CASE WHEN vp_b = 5 THEN 1 ELSE 0 END)',
            'no_response_vp_c' => 'SUM(CASE WHEN vp_c = 5 THEN 1 ELSE 0 END)',
        ])
        ->from('td_online')
        ->all();
        //END

        //To get the count of each cell of the row in For Validation
        $for_validation = (new \yii\db\Query())
        ->select([
            'for_validation_ocd_a' => 'SUM(CASE WHEN ocd_a = 6 THEN 1 ELSE 0 END)',
            'for_validation_ocd_b' => 'SUM(CASE WHEN ocd_b = 6 THEN 1 ELSE 0 END)',
            'for_validation_ocd_c' => 'SUM(CASE WHEN ocd_c = 6 THEN 1 ELSE 0 END)',
            'for_validation_ocd_d' => 'SUM(CASE WHEN ocd_d = 6 THEN 1 ELSE 0 END)',
            'for_validation_ocd_e' => 'SUM(CASE WHEN ocd_e = 6 THEN 1 ELSE 0 END)',
            'for_validation_meth_a' => 'SUM(CASE WHEN meth_a = 6 THEN 1 ELSE 0 END)',
            'for_validation_meth_b' => 'SUM(CASE WHEN meth_b = 6 THEN 1 ELSE 0 END)',
            'for_validation_meth_c' => 'SUM(CASE WHEN meth_c = 6 THEN 1 ELSE 0 END)',
            'for_validation_meth_d' => 'SUM(CASE WHEN meth_d = 6 THEN 1 ELSE 0 END)',
            'for_validation_meth_e' => 'SUM(CASE WHEN meth_d = 6 THEN 1 ELSE 0 END)',
            'for_validation_rs1_a' => 'SUM(CASE WHEN rs1_a = 6 THEN 1 ELSE 0 END)',
            'for_validation_rs1_b' => 'SUM(CASE WHEN rs1_b = 6 THEN 1 ELSE 0 END)',
            'for_validation_rs1_c' => 'SUM(CASE WHEN rs1_c = 6 THEN 1 ELSE 0 END)',
            'for_validation_rs1_d' => 'SUM(CASE WHEN rs1_d = 6 THEN 1 ELSE 0 END)',
            'for_validation_rs2_a' => 'SUM(CASE WHEN rs2_a = 6 THEN 1 ELSE 0 END)',
            'for_validation_rs2_b' => 'SUM(CASE WHEN rs2_b = 6 THEN 1 ELSE 0 END)',
            'for_validation_rs2_c' => 'SUM(CASE WHEN rs2_c = 6 THEN 1 ELSE 0 END)',
            'for_validation_rs2_d' => 'SUM(CASE WHEN rs2_d = 6 THEN 1 ELSE 0 END)',
            'for_validation_rs3_a' => 'SUM(CASE WHEN rs3_a = 6 THEN 1 ELSE 0 END)',
            'for_validation_rs3_b' => 'SUM(CASE WHEN rs3_b = 6 THEN 1 ELSE 0 END)',
            'for_validation_rs3_c' => 'SUM(CASE WHEN rs3_c = 6 THEN 1 ELSE 0 END)',
            'for_validation_rs3_d' => 'SUM(CASE WHEN rs3_d = 6 THEN 1 ELSE 0 END)',
            'for_validation_trn_host_a' => 'SUM(CASE WHEN trn_host_a = 6 THEN 1 ELSE 0 END)',
            'for_validation_trn_host_b' => 'SUM(CASE WHEN trn_host_b = 6 THEN 1 ELSE 0 END)',
            'for_validation_trn_host_c' => 'SUM(CASE WHEN trn_host_c = 6 THEN 1 ELSE 0 END)',
            'for_validation_trn_host_d' => 'SUM(CASE WHEN trn_host_d = 6 THEN 1 ELSE 0 END)',
            'for_validation_vp_a' => 'SUM(CASE WHEN vp_a = 6 THEN 1 ELSE 0 END)',
            'for_validation_vp_b' => 'SUM(CASE WHEN vp_b = 6 THEN 1 ELSE 0 END)',
            'for_validation_vp_c' => 'SUM(CASE WHEN vp_c = 6 THEN 1 ELSE 0 END)',
        ])
        ->from('td_online')
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
        ->from('td_online')
        ->one();
        //END

        //To ge the total response total count of the response
        $total_count = (new \yii\db\Query())
        ->select(['COUNT(*) as total_count'])
        ->from('td_online')
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
            'ocd_a', 'ocd_b', 'ocd_c', 'ocd_d', 'ocd_e', 
            'meth_a', 'meth_b', 'meth_c', 'meth_d', 'meth_e',
            'rs1_a', 'rs1_b', 'rs1_c', 'rs1_d', 'rs2_a', 'rs2_b', 'rs2_c', 
            'rs2_d', 'rs3_a', 'rs3_b', 'rs3_c','rs3_d', 'trn_host_a', 'trn_host_b', 
            'trn_host_c', 'trn_host_d', 'vp_a', 'vp_b', 'vp_c'
    
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

        //(ARTA) QUALITY DIMENSION (CSF SCORE)

        $responsiveness = round(($score['trn_host_c'] + $score['trn_host_d']) / 2, 2);
        $methodology_score = 0;
        foreach ($score as $key => $value) { if(strpos($key, 'meth_') === 0) $methodology_score += $value; }
        $realibility = round(($score['ocd_b'] + $methodology_score + $score['rs1_b'] + $score['rs1_d'] + $score['trn_host_b']) / 9, 2);
        $outcome = round(($score['ocd_a'] + $score['ocd_c'] + $score['ocd_d'] + $score['ocd_e']) / 4, 2);
        $communication = round(($score['rs1_a'] + $score['rs1_c'] + $score['trn_host_a']) / 3, 2);
        // $access_facilities = round(($score['admin_a'] + $score['admin_b'] + $score['admin_c'] + $score['admin_d'] + $score['admin_e']) / 5, 2);
        $vp = 0;
        foreach ($score as $key => $value) { if(strpos($key, 'vp_') === 0) $vp += $value; }
        $access_facilities = round($vp / 3, 2);
        $overall_ave = round(($responsiveness + $realibility + $outcome + $communication + $access_facilities) / 5, 2);
        $overall_rating = round(($overall_ave / 4), 2);

        //END

        //(ARTA) DIMENSION (% SATISFACTION)

        $responsiveness_satisfaction = round(($satisfaction['trn_host_c'] + $satisfaction['trn_host_d']) / 2, 2);
        $methodology_satisfaction = 0;
        foreach ($satisfaction as $key => $value)
        {
            if(strpos($key, 'meth_') === 0) $methodology_satisfaction += $value; 
        }
        $realibility_satisfaction = round(($satisfaction['ocd_b'] + $methodology_satisfaction + $satisfaction['rs1_b'] + $satisfaction['rs1_b'] + $satisfaction['trn_host_b']) / 9, 2);
        $outcome_satisfaction =  round(($satisfaction['ocd_a'] + $satisfaction['ocd_c'] + $satisfaction['ocd_d'] + $satisfaction['ocd_e']) / 4, 2);
        $communication_satisfaction = round(($satisfaction['rs1_a'] + $satisfaction['rs1_c'] + $satisfaction['trn_host_a']) / 3, 2);;
        $access_facilities_satisfaction = round(($satisfaction['vp_a'] + $satisfaction['vp_b'] + $satisfaction['vp_c']) / 3, 2);
        
        $overall_ave_satisfaction = round(($responsiveness_satisfaction + $realibility_satisfaction + $outcome_satisfaction + $communication_satisfaction + $access_facilities_satisfaction) / 5, 2);
        
        //END

        //CRITERIA (CSF SCORE)

        $ocd_score = 0;
        foreach ($score as $key => $value) {if(strpos($key, 'ocd_') === 0) $ocd_score += $value; }

        $rs1_score = 0;
        foreach ($score as $key => $value) { if(strpos($key, 'rs1_') === 0) $rs1_score += $value; }

        $rs2_score = 0;
        foreach ($score as $key => $value) { if(strpos($key, 'rs2_') === 0) $rs1_score += $value; }

        $rs3_score = 0;
        foreach ($score as $key => $value) { if(strpos($key, 'rs3_') === 0) $rs1_score += $value; }

        $rs_score = $rs1_score + $rs2_score + $rs3_score;

        $moderator_score = $score['trn_host_a'] + $score['trn_host_b'];
        $vp_score = $score['vp_a'];

        $overall_ave_score = round(($ocd_score + $methodology_score + $rs_score + $moderator_score + $vp_score) / 5, 2);
        $overall_ave_score_rating = round(($overall_ave_score / 4), 2);

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
        ->where(['like', 'id', '%TDO%', false])
        ->one();

        $count_male = $count_sex['count_male'];
        $count_female = $count_sex['count_female'];


        $total_sex = $count_male + $count_female;

        $male_percent = round(($count_male / $total_sex) * 100);
        $female_percent = round(($count_female / $total_sex) * 100);

        $total_sex_percent = $male_percent + $female_percent;

        //END


        return $this->renderPartial('training-online-tabulation', [
            'very_satisfy' => $very_satisfy,
            'satisfy' => $satisfy,
            'dissatisfy' => $dissatisfy,
            'very_dissatisfy' => $very_dissatisfy,
            'no_response' => $no_response,
            'for_validation' => $for_validation,
            'overall' => $overall,
            'total_count' => $total_count,
            'percentage_very_satisfy' => $percentage_very_satisfy,
            'percentage_satisfy' => $percentage_satisfy,
            'percentage_dissatisfy' => $percentage_dissatisfy,
            'percentage_very_dissatisfy' => $percentage_very_dissatisfy,
            'satisfaction' => $satisfaction,
            'score' => $score,
            'ratings' => $ratings,
            'responsiveness' => $responsiveness,
            'realibility' => $realibility,
            'outcome' => $outcome,
            'communication' => $communication,
            'access_facilities' => $access_facilities,
            'overall_ave' => $overall_ave,
            'overall_rating' => $overall_rating,
            'responsiveness_satisfaction' => $responsiveness_satisfaction,
            'realibility_satisfaction' => $realibility_satisfaction,
            'outcome_satisfaction' => $outcome_satisfaction,
            'communication_satisfaction' => $communication_satisfaction,
            'access_facilities_satisfaction' => $access_facilities_satisfaction,
            'overall_ave_satisfaction' => $overall_ave_satisfaction,
            'ocd_score' => $ocd_score,
            'methodology_score' => $methodology_score,
            'rs_score' => $rs_score,
            'rs1_score' => $rs1_score,
            'rs2_score' => $rs2_score,
            'rs3_score' => $rs3_score,
            'moderator_score' => $moderator_score,
            'vp_score' => $vp_score,
            'overall_ave_score' => $overall_ave_score,
            'overall_ave_score_rating' => $overall_ave_score_rating,
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
