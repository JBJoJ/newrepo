<?php

namespace frontend\controllers;

use frontend\models\Csf;
use frontend\models\Processes;
use frontend\models\CsfSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;

/**
 * CsfController implements the CRUD actions for Csf model.
 */
class CsfController extends Controller
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
     * Lists all Csf models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new CsfSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Csf model.
     * @param string $id ID
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
     * Creates a new Csf model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Csf();

        if ($model->load(Yii::$app->request->post())) {
            $processId = Yii::$app->request->post('Csf')['process']; // Get the selected process ID from the form
            $process = Processes::findOne($processId); // Find the process model using the ID
            // if ($process) {
            //     // Generate the ID and save it
            //     $model->id = $this->generateId($process);
            //     if ($model->save()) {
            //         // ID saved successfully
            //         return $this->redirect(['view', 'id' => $model->id]);
            //     }
            // }
       // Age validation logic
        $ageDistributionId = $model->age_distribution;
        $age = $model->age;

        $ageDistribution = AgeDistribution::findOne($ageDistributionId);

        if ($ageDistribution) {
            list($minAge, $maxAge) = explode('-', $ageDistribution->range);
            $minAge = (int) $minAge;
            $maxAge = (int) $maxAge;

            if ($age < $minAge || $age > $maxAge) {
                $model->addError('age', 'The age must be between ' . $minAge . ' and ' . $maxAge . '.');
            }
        }


            if ($process)
            {
                $model->id = $this->generateId($process);
                if ($model->save())
                {
                    switch ($process->process)
                    {
                        case 'Financial Claim - External':
                            return $this->redirect(['financial-claim/financial-external', 'process_id' => $model->id]);
                        case 'Financial Claim - Internal':
                            return $this->redirect(['financial-claim/financial-internal', 'process_id' => $model->id]);
                        case 'Financial Claim - Online':
                            return $this->redirect(['financial-claim/financial-online', 'process_id' => $model->id]);
                        case 'IT Services':
                            return $this->redirect(['it-services/it-service', 'process_id' => $model->id]);
                        case 'Recruitment and Selection':
                            return $this->redirect(['recruitment/recruitments-selection', 'process_id' => $model->id]);
                        case 'Request and Issuance of Supply':
                            return $this->redirect(['request-supply/request-supplies', 'process_id' => $model->id]);
                        case 'Training and Development - F2F':
                            return $this->redirect(['td-ftof/training-ftof', 'process_id' => $model->id]);
                        case 'Training and Development - Online':
                            return $this->redirect(['td-online/training-online', 'process_id' => $model->id]);
                        case 'Janitor, Driving, Property Maintenance':
                            return $this->redirect(['services/rating-service', 'process_id' => $model->id]);
                        // Add more cases for other processes as needed
                        default:
                            return $this->redirect(['default-page']);
                    }
                }
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Csf model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id ID
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
     * Deletes an existing Csf model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Csf model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id ID
     * @return Csf the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Csf::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    // public function actionGenerate_id()
    // {
    //     $model = new Csf();

    //     if ($model->load(Yii::$app->request->post())) {
    //         $processId = Yii::$app->request->post('Csf')['id']; // Get the selected process ID from the form
    //         $process = Processes::findOne($processId); // Find the process model using the ID
    //         if ($process) {
    //             // Generate the ID and save it
    //             $model->id = $this->generateId($process);
    //             if ($model->save()) {
    //                 // ID saved successfully
    //                 return $this->redirect(['create']);
    //             }
    //         }
    //     }

    //     return $this->render('create', [
    //         'model' => $model,
    //     ]);
    // }

    public function actionProcessId()
    {
        $model = new Csf();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('process-id', [
            'model' => $model,
        ]);
    }
    // Method to generate ID based on the process
    private function generateId($process)
    {
        // Retrieve prefix from the process
        $prefix = $process->prefix;

        // Generate the year and date part of the ID
        $year = date('Y');
        $date = date('m');

        // Find the last ID generated for the process
        $lastGeneratedId = Csf::find()
            ->where(['like', 'id', $prefix . '-' . $year . '-' . $date])
            ->orderBy(['id' => SORT_DESC])
            ->one();

        // Extract the last serial number and increment by 1
        $serialNumber = 1;
        if ($lastGeneratedId) {
            $lastSerial = substr($lastGeneratedId->id, -4); // Extract the last 4 digits
            $serialNumber = intval($lastSerial) + 1;
        }
        if($date === '01')
        {
            if($lastGeneratedId && substr($lastGeneratedId->generated_id, 5, 4) != $year)
            {
                $reset_id = true;
            }
            else
            {
                $reset_id = false;
            }
        }
        else
        {
            $reset_id = false;
        }
        if($reset_id)
        {
            $next_serial = 1;
        }
        else
        {
            $next_serial = $serialNumber;
        }

        // Format the serial number to have leading zeros
        $formattedSerial = str_pad($serialNumber, 4, '0', STR_PAD_LEFT);

        // Concatenate all parts to form the final generated ID
        $generatedId = $prefix . '-' . $year . '-' . $date . '-' . $formattedSerial;

        return $generatedId;
    }

    public function actionCsfTabulation()
    {
        $model = new Csf();

        if ($model->load(Yii::$app->request->post())) {
            $processId = Yii::$app->request->post('Csf')['process']; // Get the selected process ID from the form
            $process = Processes::findOne($processId); // Find the process model using the ID

            $prefix = $process->prefix;

            switch($process->process)
            {
                case 'Financial Claim - External':
                    return $this->redirect(['financial-claim/financial-tabulation', 'prefix' => $prefix]); 
                case 'Financial Claim - Internal':
                    return $this->redirect(['financial-claim/financial-internal-tabulation', 'prefix' => $prefix]); 
                case 'Financial Claim - Online':
                    return $this->redirect(['financial-claim/financial-online-tabulation', 'prefix' => $prefix]); 
                case 'Janitor, Driving, Property Maintenance':
                    return $this->redirect(['services/rating-service-tabulation', 'prefix' => $prefix]); 
                case 'Request and Issuance of Supply':
                    return $this->redirect(['request-supply/request-supplies-tabulation']); 
                case 'Training and Development - F2F':
                    return $this->redirect(['td-ftof/training-ftof-tabulation']); 
                case 'Training and Development - Online':
                    return $this->redirect(['td-online/training-online-tabulation']); 
                case 'IT Services':
                    return $this->redirect(['it-services/it-tabulation']); 
                case 'Recruitment and Selection':
                    return $this->redirect(['recruitment/recruitments-tabulation']);
            }
        }

        return $this->render('csf-tabulation', [
            'model' => $model,
        ]);
    }
}
