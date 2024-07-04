<?php

use frontend\models\FeedbackMonitoring;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var frontend\models\FeedbackMonitoringSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Feedback Monitorings');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="feedback-monitoring-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Feedback Monitoring'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'reporting_period',
            'office_id',
            'process_id',
            'date',
            //'source_document',
            //'feedback',
            //'action_plan:ntext',
            //'action_taken:ntext',
            //'status',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, FeedbackMonitoring $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>


</div>
