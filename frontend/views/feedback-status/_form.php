<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var frontend\models\FeedbackStatus $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="feedback-status-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'feedback_status')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
