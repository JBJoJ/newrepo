<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var frontend\models\Processes $model */
/** @var ActiveForm $form */
?>
<div class="dropdown">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'process') ?>
        <?= $form->field($model, 'process_id') ?>
        <?= $form->field($model, 'transaction_id') ?>
        <?= $form->field($model, 'prefix') ?>
    
        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Submit'), ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- dropdown -->
