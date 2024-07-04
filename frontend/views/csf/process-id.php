<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\Processes;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var frontend\models\Csf $model */
/** @var ActiveForm $form */
?>
<div class="process-id">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->dropDownList(
    ArrayHelper::map(Processes::find()->all(), 'id', 'process'), ['prompt'=>'Select Process', 'id' => 'process_dropdown']
    ) ?>
    
        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Submit'), ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- process-id -->
