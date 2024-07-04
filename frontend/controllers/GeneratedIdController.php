<?php

namespace frontend\controllers;

use frontend\models\GeneratedId;
use frontend\models\Processes;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;
/**
 * GeneratedIdController implements the CRUD actions for GeneratedId model.
 */
class GeneratedIdController extends Controller
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
     * Lists all GeneratedId models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => GeneratedId::find(),
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
     * Displays a single GeneratedId model.
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
     * Creates a new GeneratedId model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new GeneratedId();

        if ($model->load(Yii::$app->request->post())) {
            $processId = Yii::$app->request->post('GeneratedId')['generated_id']; // Get the selected process ID from the form
            $process = Processes::findOne($processId); // Find the process model using the ID
            if ($process) {
                // Generate the ID and save it
                $model->generated_id = $this->generateId($process);
                if ($model->save()) {
                    // ID saved successfully
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing GeneratedId model.
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
     * Deletes an existing GeneratedId model.
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
     * Finds the GeneratedId model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return GeneratedId the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = GeneratedId::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    // public function actionNextStep()
    // {
    //     if ($this->request->isPost) {
    //         Yii::$app->response->format = Response::FORMAT_JSON;
    
    //         // Retrieve selected process name from the POST request
    //         $processName = Yii::$app->request->post('process');
    
    //         // Find the process model based on the process name
    //         $process = Processes::findOne(['process' => $processName]);
    
    //         if ($process) {
    //             // Retrieve the prefix from the process model
    //             $prefix = $process->prefix;
    
    //             // Create a new model instance to save data
    //             $model = new GeneratedId();
    
    //             // Load data from the POST request into the model
    //             if ($model->load(Yii::$app->request->post())) {
    //                 // Save the model to generate an ID
    //                 if ($model->save()) {
    //                     // Generate custom ID based on the prefix
    //                     $generatedIdModel = new GeneratedId();
    //                     $customId = $generatedIdModel->generateCustomId($prefix);
    
    //                     // Redirect to the view action with the generated ID
    //                     return $this->redirect(['view', 'id' => $model->id]);
    //                 } else {
    //                     // Handle errors if save fails
    //                     // You can either return errors to the frontend or throw an exception
    //                     // Example: return ['errors' => $model->errors];
    //                     throw new ServerErrorHttpException('Failed to save data.');
    //                 }
    //             } else {
    //                 // Handle validation errors if data cannot be loaded into the model
    //                 // Example: return ['errors' => $model->errors];
    //                 throw new ServerErrorHttpException('Failed to load data into the model.');
    //             }
    //         } else {
    //             throw new NotFoundHttpException('Process not found.');
    //         }
    //     }
    // }
    

    // protected function getFormRoute($processName)
    // {
    //     // Define a mapping between process names and form routes
    //     $processFormRoutes = [
    //         'Accreditation of SRE' => 'sex/create',
    //         // Add more mappings for other process names as needed
    //     ];
        
    //     // Return the form route based on the process name
    //     return $processFormRoutes[$processName] ?? null;
    // }

        // Method to generate ID based on the process
        private function generateId($process)
        {
            // Retrieve prefix from the process
            $prefix = $process->prefix;
    
            // Generate the year and date part of the ID
            $year = date('Y');
            $date = date('m');
    
            // Find the last ID generated for the process
            $lastGeneratedId = GeneratedId::find()
                ->where(['like', 'generated_id', $prefix . '-' . $year . '-' . $date])
                ->orderBy(['generated_id' => SORT_DESC])
                ->one();
    
            // Extract the last serial number and increment by 1
            $serialNumber = 1;

            if ($lastGeneratedId) {
                $lastSerial = substr($lastGeneratedId->generated_id, -4); // Extract the last 4 digits
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

}
