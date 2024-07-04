<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var frontend\models\RequestSupply $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="request-supply-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'process_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'qs_a')->textInput() ?>

    <?= $form->field($model, 'qs_b')->textInput() ?>

    <?= $form->field($model, 'staff_a')->textInput() ?>

    <?= $form->field($model, 'staff_b')->textInput() ?>

    <?= $form->field($model, 'staff_c')->textInput() ?>

    <?= $form->field($model, 'staff_d')->textInput() ?>

    <?= $form->field($model, 'staff_e')->textInput() ?>

    <?= $form->field($model, 'os_a')->textInput() ?>

    <?= $form->field($model, 'osr')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
