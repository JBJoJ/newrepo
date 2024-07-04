<?php

use frontend\models\RequestSupply;
use frontend\models\Rating;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Request Supplies');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="request-supply-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Request Supply'), ['create'], ['class' => 'btn btn-success']) ?>
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
                'attribute' => 'staff_a',
                'value' => function ($model) {
                    $rating = Rating::findOne($model->staff_a);
                    return $rating !== null ? $rating->numeric_score : null;
                },
                'label' => 'staff_a',
            ],
            [
                'attribute' => 'staff_b',
                'value' => function ($model) {
                    $rating = Rating::findOne($model->staff_b);
                    return $rating !== null ? $rating->numeric_score : null;
                },
                'label' => 'staff_b',
            ],
            [
                'attribute' => 'staff_c',
                'value' => function ($model) {
                    $rating = Rating::findOne($model->staff_c);
                    return $rating !== null ? $rating->numeric_score : null;
                },
                'label' => 'staff_c',
            ],
            [
                'attribute' => 'staff_d',
                'value' => function ($model) {
                    $rating = Rating::findOne($model->staff_d);
                    return $rating !== null ? $rating->numeric_score : null;
                },
                'label' => 'staff_d',
            ],
            [
                'attribute' => 'staff_e',
                'value' => function ($model) {
                    $rating = Rating::findOne($model->staff_e);
                    return $rating !== null ? $rating->numeric_score : null;
                },
                'label' => 'staff_e',
            ],
            [
                'attribute' => 'os_a',
                'value' => function ($model) {
                    $rating = Rating::findOne($model->os_a);
                    return $rating !== null ? $rating->numeric_score : null;
                },
                'label' => 'os_a',
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
                'urlCreator' => function ($action, RequestSupply $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>


</div>
