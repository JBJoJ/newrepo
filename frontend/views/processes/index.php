<?php

use frontend\models\Processes;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\LinkPager;


/** @var yii\web\View $this */
/** @var frontend\models\ProcessesSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Processes');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="processes-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Processes'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'process',
            // 'process_id',
            // 'transaction_id',
            [
                'attribute' => 'process0.type_process',
                'label' => 'Process',
            ],
            [
                'attribute' => 'transaction.type_transaction',
                'label' => 'Transaction',
            ],
            'prefix',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Processes $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

    <?= LinkPager::widget([
        'pagination' => $dataProvider->pagination,
    ]); ?>

</div>
