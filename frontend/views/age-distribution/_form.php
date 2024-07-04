<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var frontend\models\AgeDistribution $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="age-distribution-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'age_range')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
