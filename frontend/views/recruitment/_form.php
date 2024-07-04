<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var frontend\models\Recruitment $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="recruitment-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'process_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'qs_a')->textInput() ?>

    <?= $form->field($model, 'qs_b')->textInput() ?>

    <?= $form->field($model, 'qs_c')->textInput() ?>

    <?= $form->field($model, 'qs_d')->textInput() ?>

    <?= $form->field($model, 'rsi_a')->textInput() ?>

    <?= $form->field($model, 'rsi_b')->textInput() ?>

    <?= $form->field($model, 'rsi_c')->textInput() ?>

    <?= $form->field($model, 'rsi_d')->textInput() ?>

    <?= $form->field($model, 'tv_a')->textInput() ?>

    <?= $form->field($model, 'tv_b')->textInput() ?>

    <?= $form->field($model, 'tv_c')->textInput() ?>

    <?= $form->field($model, 'tv_d')->textInput() ?>

    <?= $form->field($model, 'osr')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
