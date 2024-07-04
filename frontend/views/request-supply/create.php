<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\models\RequestSupply $model */

$this->title = Yii::t('app', 'Create Request Supply');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Request Supplies'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="request-supply-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
