<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var frontend\models\Disbursement $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="disbursement-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'disbursement_type')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
