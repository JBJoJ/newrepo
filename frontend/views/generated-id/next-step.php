<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\Processes;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var frontend\models\GeneratedId $model */
/** @var ActiveForm $form */
?>
<div class="next-step">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'generated_id') ?>
    
        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Submit'), ['class' => 'btn btn-primary']) ?>
        </div>

    <?= $form->field($model, 'generated_id')->dropDownList(
    ArrayHelper::map(Processes::find()->all(), 'process', 'process'), ['prompt'=>'Select Process', 'id' => 'process_dropdown']
    ) ?>

    <div class="form-group">
    <!-- <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?> -->
    <?= Html::button('Next', ['class'=>'btn btn-primary', 'id'=>'next-button']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div><!-- next-step -->
