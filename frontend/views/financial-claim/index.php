<?php

use frontend\models\FinancialClaim;
use frontend\models\Rating;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Financial Claims');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="financial-claim-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Financial Claim'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'process_id',
            [
                'attribute' => 'raic_a',
                'value' => function ($model) {
                    $rating = Rating::findOne($model->raic_a);
                    return $rating !== null ? $rating->numeric_score : null;
                },
                'label' => 'Raic A',
            ],
            [
                'attribute' => 'raic_b',
                'value' => function ($model) {
                    $rating = Rating::findOne($model->raic_b);
                    return $rating !== null ? $rating->numeric_score : null;
                },
                'label' => 'Raic B',
            ],
            [
                'attribute' => 'raic_c',
                'value' => function ($model) {
                    $rating = Rating::findOne($model->raic_c);
                    return $rating !== null ? $rating->numeric_score : null;
                },
                'label' => 'Raic C',
            ],
            [
                'attribute' => 'raic_d',
                'value' => function ($model) {
                    $rating = Rating::findOne($model->raic_d);
                    return $rating !== null ? $rating->numeric_score : null;
                },
                'label' => 'Raic D',
            ],
            [
                'attribute' => 'raic_e',
                'value' => function ($model) {
                    $rating = Rating::findOne($model->raic_e);
                    return $rating !== null ? $rating->numeric_score : null;
                },
                'label' => 'Raic E',
            ],
            [
                'attribute' => 'raic_f',
                'value' => function ($model) {
                    $rating = Rating::findOne($model->raic_f);
                    return $rating !== null ? $rating->numeric_score : null;
                },
                'label' => 'Raic F',
            ],
            [
                'attribute' => 'af_a',
                'value' => function ($model) {
                    $rating = Rating::findOne($model->af_a);
                    return $rating !== null ? $rating->numeric_score : null;
                },
                'label' => 'Raic A',
            ],
            [
                'attribute' => 'af_b',
                'value' => function ($model) {
                    $rating = Rating::findOne($model->af_b);
                    return $rating !== null ? $rating->numeric_score : null;
                },
                'label' => 'AF B',
            ],
            [
                'attribute' => 'af_c',
                'value' => function ($model) {
                    $rating = Rating::findOne($model->af_c);
                    return $rating !== null ? $rating->numeric_score : null;
                },
                'label' => 'AF C',
            ],
            [
                'attribute' => 'rao',
                'value' => function ($model) {
                    $rating = Rating::findOne($model->rao);
                    return $rating !== null ? $rating->numeric_score : null;
                },
                'label' => 'RAO',
            ],
            [
                'attribute' => 'ovr',
                'value' => function ($model) {
                    $rating = Rating::findOne($model->ovr);
                    return $rating !== null ? $rating->numeric_score : null;
                },
                'label' => 'OVR',
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, FinancialClaim $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>


</div>
