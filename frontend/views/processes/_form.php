<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\TypeProcess;
use frontend\models\TypeTransaction;

/** @var yii\web\View $this */
/** @var frontend\models\Processes $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="processes-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'process')->textInput(['maxlength' => true]) ?>

    <!-- <?= $form->field($model, 'process_id')->textInput() ?> -->
    <?= $form->field($model, 'process_id')->label('Process')->dropDownList(TypeProcess::getProcessList(), ['prompt' => 'Select Process']) ?>

    <!-- <?= $form->field($model, 'transaction_id')->textInput() ?> -->
    <?= $form->field($model, 'transaction_id')->label('Transaction')->dropDownList(TypeTransaction::getTransactionList(), ['prompt' => 'Select Transaction']) ?>

    <?= $form->field($model, 'prefix')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
