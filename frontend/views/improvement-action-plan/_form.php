<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\Office;
use frontend\models\Processes;
use kartik\date\DatePicker;

/** @var yii\web\View $this */
/** @var frontend\models\ImprovementActionPlan $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="improvement-action-plan-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="col-md-5">
            <?= $form->field($model, 'reporting_period')->widget(DatePicker::class, [
                        'options' => ['class' => 'form-control'],
                        'pluginOptions' => [
                            'format' => 'yyyy-mm',
                            'minViewMode' => 1, // Show only month and year
                            'autoclose'=>true,
                        ]
                ]) 
            ?>
    </div>

    <?= $form->field($model, 'process')->label('Process', ['for' => 'process-dropdown'])->dropDownList(Processes::getProcessesList(), ['prompt' => 'Select Process', 'id' => 'process-dropdown']) ?>

    <?= $form->field($model, 'office')->label('Office', ['for' => 'office-field'])->dropDownList(Office::getOfficeList(), ['prompt' => 'Select Office', 'id' => 'office-field']) ?>


    <p>Check the field you want to add</p>

    <div class="checkbox">
        <label>
            <?= Html::checkbox('source_of_improvement_plan_checkbox', false, ['class' => 'toggle-field']) ?>
            Source of Improvement Plan
        </label>
        <div class="source-of-improvement-plan" style="display: none;">
           
            <?= $form->field($model, 'source_improvement')->textarea(['rows' => 6]) ?>
        </div>
    </div>

    <div class="checkbox">
        <label>
            <?= Html::checkbox('improvement_checkbox', false, ['class' => 'toggle-field']) ?>
            Improvement
        </label>
        <div class="improvement" style="display: none;">
            
            <?= $form->field($model, 'improvement')->textarea(['rows' => 6]) ?>
        </div>
    </div>

    <div class="checkbox">
        <label>
            <?= Html::checkbox('responsibility_checkbox', false, ['class' => 'toggle-field']) ?>
            Responsibility
        </label>
        <div class="responsibility" style="display: none;">
           
            <?= $form->field($model, 'responsibility')->textarea(['rows' => 6]) ?>
        </div>
    </div>

    <div class="checkbox">
        <label>
            <?= Html::checkbox('timeline_checkbox', false, ['class' => 'toggle-field']) ?>
            Timeline
        </label>
        <div class="timeline" style="display: none;">
           
            <?= $form->field($model, 'timeline')->textarea(['rows' => 6]) ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php
$js = <<< JS
$(document).ready(function(){
    $('.toggle-field').change(function(){
        var checkboxName = $(this).attr('name').replace('_checkbox', '');
        var target = $(this).closest('.checkbox').find('.' + checkboxName);
        if($(this).prop('checked')){
            target.slideDown();
            target.find('input').prop('required', true); // Set required attribute
        } else {
            target.slideUp();
            target.find('input').prop('required', false); // Remove required attribute
        }
    });

    // Handling the source of improvement plan checkbox separately
    $('input[name="source_of_improvement_plan_checkbox"]').change(function(){
        var target = $(this).closest('.checkbox').find('.source-of-improvement-plan');
        if($(this).prop('checked')){
            target.slideDown();
            target.find('input').prop('required', true); // Set required attribute
        } else {
            target.slideUp();
            target.find('input').prop('required', false); // Remove required attribute
        }
    });
});
JS;
$this->registerJs($js);
?>