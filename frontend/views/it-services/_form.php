<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var frontend\models\ItServices $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="it-services-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'process_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rai')->textInput() ?>

    <?= $form->field($model, 'ro')->textInput() ?>

    <?= $form->field($model, 'af')->textInput() ?>

    <?= $form->field($model, 'com')->textInput() ?>

    <?= $form->field($model, 'osr')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
