<?php

use frontend\models\Recruitment;
use frontend\models\Rating;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Recruitments');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recruitment-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Recruitment'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'process_id',
            [
                'attribute' => 'qs_a',
                'value' => function ($model) {
                    $rating = Rating::findOne($model->qs_a);
                    return $rating !== null ? $rating->numeric_score : null;
                },
                'label' => 'qs_a',
            ],
            [
                'attribute' => 'qs_b',
                'value' => function ($model) {
                    $rating = Rating::findOne($model->qs_b);
                    return $rating !== null ? $rating->numeric_score : null;
                },
                'label' => 'qs_b',
            ],
            [
                'attribute' => 'qs_c',
                'value' => function ($model) {
                    $rating = Rating::findOne($model->qs_c);
                    return $rating !== null ? $rating->numeric_score : null;
                },
                'label' => 'qs_c',
            ],
            [
                'attribute' => 'qs_d',
                'value' => function ($model) {
                    $rating = Rating::findOne($model->qs_d);
                    return $rating !== null ? $rating->numeric_score : null;
                },
                'label' => 'qs_d',
            ],
            [
                'attribute' => 'rsi_a',
                'value' => function ($model) {
                    $rating = Rating::findOne($model->rsi_a);
                    return $rating !== null ? $rating->numeric_score : null;
                },
                'label' => 'rsi_a',
            ],
            [
                'attribute' => 'rsi_b',
                'value' => function ($model) {
                    $rating = Rating::findOne($model->rsi_b);
                    return $rating !== null ? $rating->numeric_score : null;
                },
                'label' => 'Rai',
            ],
            [
                'attribute' => 'rsi_c',
                'value' => function ($model) {
                    $rating = Rating::findOne($model->rsi_c);
                    return $rating !== null ? $rating->numeric_score : null;
                },
                'label' => 'rsi_c',
            ],
            [
                'attribute' => 'rsi_d',
                'value' => function ($model) {
                    $rating = Rating::findOne($model->rsi_d);
                    return $rating !== null ? $rating->numeric_score : null;
                },
                'label' => 'rsi_d',
            ],
            [
                'attribute' => 'tv_a',
                'value' => function ($model) {
                    $rating = Rating::findOne($model->tv_a);
                    return $rating !== null ? $rating->numeric_score : null;
                },
                'label' => 'tv_a',
            ],
            [
                'attribute' => 'tv_b',
                'value' => function ($model) {
                    $rating = Rating::findOne($model->tv_b);
                    return $rating !== null ? $rating->numeric_score : null;
                },
                'label' => 'tv_b',
            ],
            [
                'attribute' => 'tv_c',
                'value' => function ($model) {
                    $rating = Rating::findOne($model->tv_c);
                    return $rating !== null ? $rating->numeric_score : null;
                },
                'label' => 'tv_c',
            ],
            [
                'attribute' => 'tv_d',
                'value' => function ($model) {
                    $rating = Rating::findOne($model->tv_d);
                    return $rating !== null ? $rating->numeric_score : null;
                },
                'label' => 'tv_d',
            ],
            [
                'attribute' => 'osr',
                'value' => function ($model) {
                    $rating = Rating::findOne($model->osr);
                    return $rating !== null ? $rating->numeric_score : null;
                },
                'label' => 'osr',
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Recruitment $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->process_id]);
                }
            ],
        ],
    ]); ?>


</div>
