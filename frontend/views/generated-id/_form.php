<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\Processes;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var frontend\models\GeneratedId $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="generated-id-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'generated_id')->dropDownList(
    ArrayHelper::map(Processes::find()->all(), 'id', 'process'), ['prompt'=>'Select Process', 'id' => 'process_dropdown']
    ) ?>

    <div class="form-group">
    <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
