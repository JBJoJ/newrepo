<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\models\FeedbackStatus $model */

$this->title = Yii::t('app', 'Create Feedback Status');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Feedback Statuses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="feedback-status-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
