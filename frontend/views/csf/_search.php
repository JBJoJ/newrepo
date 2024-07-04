<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var frontend\models\CsfSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="csf-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'reporting_period') ?>

    <?= $form->field($model, 'office') ?>

    <?= $form->field($model, 'process') ?>

    <?= $form->field($model, 'date') ?>

    <?php // echo $form->field($model, 'client_name') ?>

    <?php // echo $form->field($model, 'program') ?>

    <?php // echo $form->field($model, 'duration') ?>

    <?php // echo $form->field($model, 'platform') ?>

    <?php // echo $form->field($model, 'sex') ?>

    <?php // echo $form->field($model, 'age_distribution') ?>

    <?php // echo $form->field($model, 'age') ?>

    <?php // echo $form->field($model, 'region') ?>

    <?php // echo $form->field($model, 'contact_number') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'business_name') ?>

    <?php // echo $form->field($model, 'business_address') ?>

    <?php // echo $form->field($model, 'transaction_type') ?>

    <?php // echo $form->field($model, 'disbursement_type') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
