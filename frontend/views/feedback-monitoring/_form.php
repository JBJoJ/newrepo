<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var frontend\models\FeedbackMonitoring $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="feedback-monitoring-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'reporting_period')->textInput() ?>

    <?= $form->field($model, 'office_id')->textInput() ?>

    <?= $form->field($model, 'process_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date')->textInput() ?>

    <?= $form->field($model, 'source_document')->textInput() ?>

    <?= $form->field($model, 'feedback')->textInput() ?>

    <?= $form->field($model, 'action_plan')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'action_taken')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
