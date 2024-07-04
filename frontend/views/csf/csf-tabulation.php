<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\Processes;

/** @var yii\web\View $this */
/** @var frontend\models\Csf $model */
/** @var ActiveForm $form */
?>
<div class="csf-tabulation">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'process')->label('Process', ['for' => 'process-dropdown'])->dropDownList(Processes::getProcessesList(), ['prompt' => 'Select Process', 'id' => 'process-dropdown']) ?>
    
        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Next'), ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- csf-tabulation -->
