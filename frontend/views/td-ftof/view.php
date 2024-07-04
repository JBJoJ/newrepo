<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var frontend\models\TdFtof $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Td Ftofs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="td-ftof-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'process_id',
            'ocd_a',
            'ocd_b',
            'ocd_c',
            'ocd_d',
            'ocd_e',
            'meth_a',
            'meth_b',
            'meth_c',
            'meth_d',
            'rs1_a',
            'rs1_b',
            'rs1_c',
            'rs2_a',
            'rs2_b',
            'rs2_c',
            'rs3_a',
            'rs3_b',
            'rs3_c',
            'trn_host_a',
            'trn_host_b',
            'trn_host_c',
            'trn_host_d',
            'admin_a',
            'admin_b',
            'admin_c',
            'admin_d',
            'admin_e',
            'osr',
        ],
    ]) ?>

</div>
