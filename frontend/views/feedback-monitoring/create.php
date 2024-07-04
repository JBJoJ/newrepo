<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\models\FeedbackMonitoring $model */

$this->title = Yii::t('app', 'Create Feedback Monitoring');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Feedback Monitorings'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="feedback-monitoring-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
