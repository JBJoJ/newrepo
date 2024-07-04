<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\models\ImprovementActionPlan $model */

$this->title = Yii::t('app', 'Create Improvement Action Plan');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Improvement Action Plans'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="improvement-action-plan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
