<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var frontend\models\FeedbackMonitoringSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="feedback-monitoring-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'reporting_period') ?>

    <?= $form->field($model, 'office_id') ?>

    <?= $form->field($model, 'process_id') ?>

    <?= $form->field($model, 'date') ?>

    <?php // echo $form->field($model, 'source_document') ?>

    <?php // echo $form->field($model, 'feedback') ?>

    <?php // echo $form->field($model, 'action_plan') ?>

    <?php // echo $form->field($model, 'action_taken') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
