<?php

use frontend\models\Csf;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\LinkPager;

/** @var yii\web\View $this */
/** @var frontend\models\CsfSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Csfs');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="csf-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Csf'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'reporting_period',
                'value' => function ($model) {
                    // Use asDate formatter to display only the year and month
                    return Yii::$app->formatter->asDate($model->reporting_period, 'yyyy-MM');
                },
            ],
            'office',
            'process',
            'date',
            // 'client_name',
            // 'program',
            // 'duration',
            // 'platform',
            'sex',
            // 'age_distribution',
            // 'age',
            // 'region',
            // 'contact_number',
            // 'email:email',
            // 'business_name',
            // 'business_address',
            // 'transaction_type',
            // 'disbursement_type',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Csf $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

    <?= LinkPager::widget([
        'pagination' => $dataProvider->pagination,
    ]); ?>


</div>
