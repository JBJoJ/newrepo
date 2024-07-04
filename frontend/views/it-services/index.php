<?php

use frontend\models\ItServices;
use frontend\models\Rating;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'It Services');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="it-services-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create It Services'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'process_id',
            [
                'attribute' => 'rai',
                'value' => function ($model) {
                    $rating = Rating::findOne($model->rai);
                    return $rating !== null ? $rating->numeric_score : null;
                },
                'label' => 'Rai',
            ],
            [
                'attribute' => 'ro',
                'value' => function ($model) {
                    $rating = Rating::findOne($model->ro);
                    return $rating !== null ? $rating->numeric_score : null;
                },
                'label' => 'RO',
            ],
            [
                'attribute' => 'af',
                'value' => function ($model) {
                    $rating = Rating::findOne($model->af);
                    return $rating !== null ? $rating->numeric_score : null;
                },
                'label' => 'AF',
            ],
            [
                'attribute' => 'com',
                'value' => function ($model) {
                    $rating = Rating::findOne($model->com);
                    return $rating !== null ? $rating->numeric_score : null;
                },
                'label' => 'COM',
            ],
            [
                'attribute' => 'osr',
                'value' => function ($model) {
                    $rating = Rating::findOne($model->osr);
                    return $rating !== null ? $rating->numeric_score : null;
                },
                'label' => 'OSR',
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, ItServices $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>


</div>
