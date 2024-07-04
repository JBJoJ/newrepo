<?php

use frontend\models\TdOnline;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Td Onlines');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="td-online-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Td Online'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'process_id',
            'ocd_a',
            'ocd_b',
            'ocd_c',
            //'ocd_d',
            //'ocd_e',
            //'meth_a',
            //'meth_b',
            //'meth_c',
            //'meth_d',
            //'meth_e',
            //'rs1_a',
            //'rs1_b',
            //'rs1_c',
            //'rs1_d',
            //'rs2_a',
            //'rs2_b',
            //'rs2_c',
            //'rs2_d',
            //'rs3_a',
            //'rs3_b',
            //'rs3_c',
            //'rs3_d',
            //'trn_host_a',
            //'trn_host_b',
            //'trn_host_c',
            //'trn_host_d',
            //'vp_a',
            //'vp_b',
            //'vp_c',
            //'osr',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, TdOnline $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
