<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var frontend\models\Services $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="services-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'process_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'driving')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'janitorial')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'equipment')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'raic_a')->textInput() ?>

    <?= $form->field($model, 'raic_b')->textInput() ?>

    <?= $form->field($model, 'raic_c')->textInput() ?>

    <?= $form->field($model, 'raic_d')->textInput() ?>

    <?= $form->field($model, 'af_a')->textInput() ?>

    <?= $form->field($model, 'af_b')->textInput() ?>

    <?= $form->field($model, 'af_c')->textInput() ?>

    <?= $form->field($model, 'ro_a')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
