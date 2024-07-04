<?php

use frontend\models\ImprovementActionPlan;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var frontend\models\ImprovementSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Improvement Action Plans');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="improvement-action-plan-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Improvement Action Plan'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            [
                'attribute' => 'reporting_period',
                'value' => function ($model) {
                    // Use asDate formatter to display only the year and month
                    return Yii::$app->formatter->asDate($model->reporting_period, 'yyyy-MM');
                },
            ],
            // 'office',
            // 'process',
            'source_improvement:ntext',
            'improvement:ntext',
            'responsibility:ntext',
            'timeline:ntext',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, ImprovementActionPlan $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>


</div>
