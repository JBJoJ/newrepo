<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use frontend\models\AgeDistribution;
use frontend\models\Sex;
use frontend\models\Office;
use frontend\models\Processes;
use frontend\models\Transaction;
use frontend\models\Disbursement;
use kartik\form\ActiveForm;
use kartik\date\DatePicker;
use kartik\form\ActiveForm as KartikActiveForm;
use yii\web\View;


/** @var yii\web\View $this */
/** @var frontend\models\Csf $model */
/** @var yii\widgets\ActiveForm $form */


// Fetch the age ranges from the database
$ageDistributions = AgeDistribution::find()->asArray()->all();
$ageRanges = [];

foreach ($ageDistributions as $distribution) {
    if (isset($distribution['age_range']) && preg_match('/\d+\s*-\s*\d+/', $distribution['age_range'])) {
        list($min, $max) = array_map('trim', explode('-', $distribution['age_range']));
        $ageRanges[$distribution['id']] = [
            'min' => (int) $min,
            'max' => (int) $max
        ];
    }
}
?>

<div class="csf-form">
    <!-- <div class="csf-form"> -->
    <div style="border: 2px solid black; padding: 15px">
    <?php $form = ActiveForm::begin([
        'id' => 'csf-form', 
        'type' => ActiveForm::TYPE_HORIZONTAL,
        'formConfig' => ['labelSpan' => 3, 'deviceSize' => ActiveForm::SIZE_SMALL]
    ]); ?>


    
            <!-- <?= $form->field($model, 'id') ?> -->

    <?php $form = KartikActiveForm::begin(); ?>

    <!-- <?= $form->field($model, 'id')->textInput(['maxlength' => true]) ?> -->

    <?= $form->field($model, 'process')->label('Process', ['for' => 'process-dropdown'])->dropDownList(Processes::getProcessesList(), ['prompt' => 'Select Process', 'id' => 'process-dropdown']) ?>

    <!-- <?= $form->field($model, 'office')->textInput() ?> -->
    <?= $form->field($model, 'office')->label('Office', ['for' => 'office-field'])->dropDownList(Office::getOfficeList(), ['prompt' => 'Select Office', 'id' => 'office-field']) ?>

    <div class="row">
        <div class="col-md-5">
            <!-- <?= $form->field($model, 'reporting_period')->textInput() ?> -->
            <?= $form->field($model, 'reporting_period')->widget(DatePicker::class, [
                        'options' => ['class' => 'form-control'],
                        'pluginOptions' => [
                            'format' => 'yyyy-mm',
                            'minViewMode' => 1, // Show only month and year
                            'autoclose'=>true,
                        ]
                    ]) ?>
        </div>
        <div class="col-md-5">
            <!-- <?= $form->field($model, 'date')->textInput() ?> -->
            <?= $form->field($model, 'date')->label('Date')->widget(DatePicker::class, [
                        'options' => ['class' => 'form-control'],
                        'pluginOptions' => [
                            'format' => 'yyyy-mm-dd',
                            'autoclose'=>true,
                        ]
                    ]) 
            ?>
        </div>
    </div>

    <?= $form->field($model, 'client_name')->textInput(['maxlength' => true, 'id' => 'cleint-field']) ?>

    <?= $form->field($model, 'program')->textInput(['maxlength' => true, 'id' => 'program-field']) ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'duration')->textInput(['maxlength' => true, 'id' => 'duration-field']) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'platform')->textInput(['maxlength' => true, 'id' => 'platform-field']) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <!-- <?= $form->field($model, 'sex')->textInput() ?> -->
            <?= $form->field($model, 'sex')->label('Sex', ['for' => 'sex-field'])->dropDownList(Sex::getSexList(), ['prompt' => 'Select Sex', 'id' => 'sex-field']) ?>
        </div>
        <div class="col-md-4">
                <!-- <?= $form->field($model, 'age_distribution')->textInput() ?> -->
                <?= $form->field($model, 'age_distribution')->label('Age Distribution', ['for' => 'agedis-field'])->dropDownList(AgeDistribution::getDistributionList(), ['prompt' => 'Select Age Range', 'id' => 'agedis-field']) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'age')->textInput(['id' => 'age-field']) ?>
        </div>
    </div>

    <?= $form->field($model, 'region')->textInput(['maxlength' => true, 'id' => 'region-field']) ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'email')->textInput(['maxlength' => true, 'id' => 'email-field']) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'contact_number')->textInput(['maxlength' => true, 'id' => 'contanct-field']) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'business_name')->textInput(['maxlength' => true, 'id' => 'business_name-field']) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'business_address')->textInput(['maxlength' => true, 'id' => 'business_add-field']) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <!-- <?= $form->field($model, 'transaction_type')->textInput() ?> -->
            <?= $form->field($model, 'transaction_type')->label('Transaction', ['for' => 'transaction-field'])->dropDownList(Transaction::getTransactionList(), ['prompt' => 'Select Transaction', 'id' => 'transaction-field']) ?>
        </div>
        <div class="col-md-6">
            <!-- <?= $form->field($model, 'disbursement_type')->textInput() ?> -->
            <?= $form->field($model, 'disbursement_type')->label('Disbursement', ['for' => 'disbursement-field'])->dropDownList(Disbursement::getDisbursementList(), ['prompt' => 'Select Disbursement', 'id' => 'disbursement-field']) ?>
        </div>
    </div>

    <div class="form-group" style="position: relative; top: 15px;">
        <?= Html::submitButton(Yii::t('app', 'Next'), ['class' => 'btn btn-success', 'id' => 'save-button']) ?>
    </div>
    <?php ActiveForm::end(); ?>
    
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</div>

<?php

$ageRangesJson = json_encode($ageRanges);
// JavaScript to toggle field visibility based on selected process
$script = <<< JS

$(document).ready(function(){
    
     // Function to toggle visibility of the fields based on selected process
    function toggleVisibility(processValue) {

        console.log(processValue);
        switch (processValue) {
            case 'Accreditation of SRE - F2F':
            case 'Accreditation of SRE - Online':
            case 'BMBE Registration - F2F':
            case 'BMBE Registration - Online':
            case 'Business Counselling - F2F':
            case 'Business Name Registration - F2F':
            case 'Business Name Registration - Online':
            case 'Conduct of Training - F2F':
            case 'Conduct of Training - Online':
            case 'Consumer Advocacy - F2F':
            case 'Consumer Advocacy - Online':
            case 'Consumer Complaints Handling':
            case 'Issuance of Sales Promotion - F2F':
            case 'Issuance of Sales Promotion - Online':
            case 'Issuance of Sales Promotion - Online':
            case 'Trade and Industry Information':
            case 'Trade and Industry Information':
            case 'Janitor, Driving, Property Maintenance':
            case 'Request and Issuance of Supply':
            case 'IT Services':
                hideFields(['#program-field', '#duration-field', '#platform-field', '#business_name-field', '#business_add-field', '#transaction-field', '#disbursement-field']);
                break;
            case 'Recruitment and Selection':
                hideFields(['#program-field', '#duration-field', '#platform-field', '#region-field', '#agedis-field', '#age-field', '#business_name-field', '#business_add-field', '#transaction-field', '#disbursement-field']);
                break;
            case 'Financial Claim - External':
            case 'Financial Claim - Internal':
            case 'Financial Claim - Online':
                hideFields(['#program-field', '#duration-field', '#platform-field', '#business_name-field', '#business_add-field']);
                break;
            case 'Conduct of Traid - Exhibitors':
            case 'Conduct of Traid - Buyers':
                hideFields(['#program-field', '#duration-field', '#platform-field', '#transaction-field', '#disbursement-field']);
                break;
            case 'Training and Development - F2F':
            case 'Training and Development - Online':
                hideFields(['#region-field', '#agedis-field', '#age-field', '#business_name-field', '#business_add-field', '#transaction-field', '#disbursement-field']);
                break;
            default:
                showAllFields();
        }
    }

    // Function to hide specified fields
    function hideFields(fields) {
    fields.forEach(function(field) {
        $(field).closest('.form-group').hide();
        //$(field).find('input, select').removeAttr('required');
    });
    }

    // Function to show all fields
    function showAllFields() {
    $('.form-group').show();
    }

    // Triggering the function initially
    toggleVisibility($('#process-dropdown').find('option:selected').text());

    // Binding change event to the dropdown
    $('#process-dropdown').change(function() {
    toggleVisibility($(this).find('option:selected').text());
    });

});

    var ageRanges = $ageRangesJson;

    document.getElementById('agedis-field').addEventListener('change', function() {
        var ageField = document.getElementById('age-field');
        var selectedRange = this.value;

        if (ageRanges[selectedRange]) {
            var minAge = ageRanges[selectedRange].min;
            var maxAge = ageRanges[selectedRange].max;

            ageField.setAttribute('placeholder', 'Enter age between ' + minAge + ' and ' + maxAge);
            ageField.value = '';
        } else {
            ageField.removeAttribute('placeholder');
        }
    });


JS;
$this->registerJs($script, yii\web\View::POS_READY);
?>

