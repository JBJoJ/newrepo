<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var frontend\models\Recruitment $model */
/** @var ActiveForm $form */
/** @var array $results */
/** @var array $data_satisfy */
/** @var array $data_dissatisfy */
/** @var array $data_very_dissatisfy */
/** @var array $data_no_responses */
/** @var array $data_for_validation */
/** @var int $count_male */
/** @var int $count_female */
/** @var int $total_count */
/** @var float $percentage */
/** @var float $percentage_satisfy */
/** @var float $percentage_dissatisfy */
/** @var float $percentage_very_dissatisfy */
/** @var float $percentage_no_response */
/** @var float $percentage_for_validation */
/** @var float $satisfaction */
/** @var float $qs_score */
/** @var float $qs_b_score */
/** @var float $qs_c_score */
/** @var float $qs_d_score */
/** @var float $rsi_a_score */
/** @var float $rsi_b_score */
/** @var float $rsi_c_score */
/** @var float $tv_a_score */
/** @var float $tv_b_score */
/** @var float $tv_c_score */
/** @var float $tv_d_score */
/** @var float $qs_a_rating */
/** @var float $qs_b_rating */
/** @var float $qs_c_rating */
/** @var float $qs_d_rating */
/** @var float $rsi_a_rating */
/** @var float $rsi_b_rating */
/** @var float $rsi_c_rating */
/** @var float $rsi_d_rating */
/** @var float $tv_a_rating */
/** @var float $tv_b_rating */
/** @var float $tv_c_rating */
/** @var float $tv_d_rating */
/** @var float $responsiveness */
/** @var float $reliability */
/** @var float $outcome */
/** @var float $access_facilities */
/** @var float $overall_ave */
/** @var float $overall_rating */
/** @var float $overall_very_satisfy_rating */
/** @var float $overall_satisfy_rating */
/** @var float $overall_dissatisfy_rating */
/** @var float $overall_very_dissatisfy_rating */
/** @var float $total_overall_satisfaction */
/** @var float $sum */
/** @var float $responsiveness_satisfaction */
/** @var float $reliability_satisfaction */
/** @var float $outcome_satisfaction */
/** @var float $facilities_satisfaction */
/** @var float $comms_satisfaction */
/** @var float $integrity_satisfaction */
/** @var float $overall_satisfaction */
/** @var float $quality_service */
/** @var float $dti_staff */
/** @var float $venue */
/** @var float $overall_criteria */
/** @var float $overall_criteria_rating */


$this->title = Yii::t('app', 'Tabulation');

function satisfaction($rating)
{
    if ($rating >= 90) {return 'Very Satisfied';}
    elseif ($rating >= 80) {return 'Satisfied';}
    elseif ($rating >= 50) {return 'Dissatisfied';}
    else {return 'Very Dissatisfied';}
}

function adjectival_rating($adjectival_rating)
{
    if ($adjectival_rating >= 95) {return 'Outstanding';}
    elseif ($adjectival_rating >= 80) {return 'Satisfactory';}
    elseif ($adjectival_rating >= 60) {return 'Fair';}
    else {return 'Poor';}
}

$ratingVar = [
    $qs_a_rating ,
    $qs_b_rating ,
    $qs_c_rating ,
    $qs_d_rating ,
    $rsi_a_rating,
    $rsi_b_rating,
    $rsi_c_rating,
    $rsi_d_rating,
    $tv_a_rating ,
    $tv_b_rating ,
    $tv_c_rating ,
    $tv_d_rating ,
]

?>
<body>

<h2>Recruitment and Selection Tabulation Sheet Summary</h2>

<!-- First Table: Tabulation Sheet Summary -->
<table>
    <thead>
        <tr>
            <th colspan="2" style="background-color: #002060; color: white;">Proposed Formula</th>
            <th colspan="4" style="background-color: #FFC000; color: white;">QUALITY SERVICE</th>
            <th colspan="4" style="background-color: #FFC000; color: white;">DTI STAFF</th>
            <th colspan="4" style="background-color: #FFC000; color: white;">Testing/Interview Venue/Platform</th>
            <th>OVERALL PMT</th>
        </tr>
        <tr>
            <th>Weights</th>
            <th>Level of Satisfaction</th>
            <th>a</th>
            <th>b</th>
            <th>c</th>
            <th>d</th>
            <th>a</th>
            <th>b</th>
            <th>c</th>
            <th>d</th>
            <th>a</th>
            <th>b</th>
            <th>c</th>
            <th>d</th>
            <th>%</th>
        </tr>
    </thead>
    <tbody>
        <!-- Placeholder rows for Proposed Formula -->
        <tr>
            <td>4</td>
            <td>Very Satisfied</td>
            <?php foreach ($results as $result): ?>
            <td><?= $result['count_qs_a'] ?></td>
            <td><?= $result['count_qs_b'] ?></td>
            <td><?= $result['count_qs_c'] ?></td>
            <td><?= $result['count_qs_d'] ?></td>
            <td><?= $result['count_rsi_a'] ?></td>
            <td><?= $result['count_rsi_b'] ?></td>
            <td><?= $result['count_rsi_c'] ?></td>
            <td><?= $result['count_rsi_d'] ?></td>
            <td><?= $result['count_tv_a'] ?></td>
            <td><?= $result['count_tv_b'] ?></td>
            <td><?= $result['count_tv_c'] ?></td>
            <td><?= $result['count_tv_d'] ?></td>
            <?php endforeach; ?>
            <td><?= $percentage ?>%</td>
        </tr>
        <!-- Add more rows as needed -->
        <tr>
            <td>3</td>
            <td>Satisfied</td>
            <?php foreach ($data_satisfy as $result): ?>
                <td><?= $result['satisfy_qs_a'] ?></td>
                <td><?= $result['satisfy_qs_b'] ?></td>
                <td><?= $result['satisfy_qs_c'] ?></td>
                <td><?= $result['satisfy_qs_d'] ?></td>
                <td><?= $result['satisfy_rsi_a'] ?></td>
                <td><?= $result['satisfy_rsi_b'] ?></td>
                <td><?= $result['satisfy_rsi_c'] ?></td>
                <td><?= $result['satisfy_rsi_d'] ?></td>
                <td><?= $result['satisfy_tv_a'] ?></td>
                <td><?= $result['satisfy_tv_b'] ?></td>
                <td><?= $result['satisfy_tv_c'] ?></td>
                <td><?= $result['satisfy_tv_d'] ?></td>
            <?php endforeach; ?>
            <td><?= $percentage_satisfy ?>%</td>
        </tr>
        <tr>
            <td>2</td>
            <td>Dissatisfied</td>
            <?php foreach ($data_dissatisfy as $result): ?>
                <td><?= $result['dissatisfy_qs_a'] ?></td>
                <td><?= $result['dissatisfy_qs_b'] ?></td>
                <td><?= $result['dissatisfy_qs_c'] ?></td>
                <td><?= $result['dissatisfy_qs_d'] ?></td>
                <td><?= $result['dissatisfy_rsi_a'] ?></td>
                <td><?= $result['dissatisfy_rsi_b'] ?></td>
                <td><?= $result['dissatisfy_rsi_c'] ?></td>
                <td><?= $result['dissatisfy_rsi_d'] ?></td>
                <td><?= $result['dissatisfy_tv_a'] ?></td>
                <td><?= $result['dissatisfy_tv_b'] ?></td>
                <td><?= $result['dissatisfy_tv_c'] ?></td>
                <td><?= $result['dissatisfy_tv_d'] ?></td>
            <?php endforeach; ?>
            <td><?= $percentage_dissatisfy ?>%</td>
        </tr>
        <tr>
            <td>1</td>
            <td>Very Dissatisfied</td>
            <?php foreach ($data_very_dissatisfy as $result): ?>
                <td><?= $result['very_dissatisfy_qs_a'] ?></td>
                <td><?= $result['very_dissatisfy_qs_b'] ?></td>
                <td><?= $result['very_dissatisfy_qs_c'] ?></td>
                <td><?= $result['very_dissatisfy_qs_d'] ?></td>
                <td><?= $result['very_dissatisfy_rsi_a'] ?></td>
                <td><?= $result['very_dissatisfy_rsi_b'] ?></td>
                <td><?= $result['very_dissatisfy_rsi_c'] ?></td>
                <td><?= $result['very_dissatisfy_rsi_d'] ?></td>
                <td><?= $result['very_dissatisfy_tv_a'] ?></td>
                <td><?= $result['very_dissatisfy_tv_b'] ?></td>
                <td><?= $result['very_dissatisfy_tv_c'] ?></td>
                <td><?= $result['very_dissatisfy_tv_d'] ?></td>
            <?php endforeach; ?>
            <td><?= $percentage_very_dissatisfy ?>%</td>
        </tr>
        <tr>
            <td></td>
            <td>No Responses (888)</td>
            <?php foreach ($data_no_responses as $result): ?>
                <td><?= $result['no_responses_qs_a'] ?></td>
                <td><?= $result['no_responses_qs_b'] ?></td>
                <td><?= $result['no_responses_qs_c'] ?></td>
                <td><?= $result['no_responses_qs_d'] ?></td>
                <td><?= $result['no_responses_rsi_a'] ?></td>
                <td><?= $result['no_responses_rsi_b'] ?></td>
                <td><?= $result['no_responses_rsi_c'] ?></td>
                <td><?= $result['no_responses_rsi_d'] ?></td>
                <td><?= $result['no_responses_tv_a'] ?></td>
                <td><?= $result['no_responses_tv_b'] ?></td>
                <td><?= $result['no_responses_tv_c'] ?></td>
                <td><?= $result['no_responses_tv_d'] ?></td>
            <?php endforeach; ?>
            <td><?= $percentage_no_response ?>%</td>
        </tr>
        <tr>
            <td></td>
            <td>For Validation (999)</td>
            <?php foreach ($data_for_validation as $result): ?>
                <td><?= $result['for_validation_qs_a'] ?></td>
                <td><?= $result['for_validation_qs_b'] ?></td>
                <td><?= $result['for_validation_qs_c'] ?></td>
                <td><?= $result['for_validation_qs_d'] ?></td>
                <td><?= $result['for_validation_rsi_a'] ?></td>
                <td><?= $result['for_validation_rsi_b'] ?></td>
                <td><?= $result['for_validation_rsi_c'] ?></td>
                <td><?= $result['for_validation_rsi_d'] ?></td>
                <td><?= $result['for_validation_tv_a'] ?></td>
                <td><?= $result['for_validation_tv_b'] ?></td>
                <td><?= $result['for_validation_tv_c'] ?></td>
                <td><?= $result['for_validation_tv_d'] ?></td>
            <?php endforeach; ?>
            <td><?= $percentage_for_validation ?>%</td>
        </tr>
        <tr class="total-responses">
            <td></td>
            <td>TOTAL RESPONSES</td>
            <?php for ($i = 0; $i < 12; $i++): ?>
                <td style="background-color: #B6DDE8; color: black;"><?= $total_count ?></td>
            <?php endfor; ?>
            <td></td>
        </tr>
        <tr class="percent-satisfaction">
            <td></td>
            <td>% SATISFACTION</td>
            <?php foreach ($satisfaction as $value): ?>
                <td style="background-color: #B6DDE8; color: black;"> <?= $value ?>% </td>
            <?php endforeach; ?>

            <td></td>
        </tr>
        <tr class="csf-score">
            <td></td>
            <td>CSF SCORE</td>
            <td style="background-color: #B6DDE8; color: black;"><?= $qs_score ?></td>
            <td style="background-color: #B6DDE8; color: black;"><?= $qs_b_score ?></td>
            <td style="background-color: #B6DDE8; color: black;"><?= $qs_c_score ?></td>
            <td style="background-color: #B6DDE8; color: black;"><?= $qs_d_score ?></td>
            <td style="background-color: #B6DDE8; color: black;"><?= $rsi_a_score ?></td>
            <td style="background-color: #B6DDE8; color: black;"><?= $rsi_b_score ?></td>
            <td style="background-color: #B6DDE8; color: black;"><?= $rsi_c_score ?></td>
            <td style="background-color: #B6DDE8; color: black;"><?= $rsi_d_score ?></td>
            <td style="background-color: #B6DDE8; color: black;"><?= $tv_a_score ?></td>
            <td style="background-color: #B6DDE8; color: black;"><?= $tv_b_score ?></td>
            <td style="background-color: #B6DDE8; color: black;"><?= $tv_c_score ?></td>
            <td style="background-color: #B6DDE8; color: black;"><?= $tv_d_score ?></td>
            <td></td>
        </tr>
        <tr class="csf-rating">
            <td></td>
            <td>CSF RATING</td>
            <td style="background-color: #B6DDE8; color: black;"><?= $qs_a_rating ?>%</td>
            <td style="background-color: #B6DDE8; color: black;"><?= $qs_b_rating ?>%</td>
            <td style="background-color: #B6DDE8; color: black;"><?= $qs_c_rating ?>%</td>
            <td style="background-color: #B6DDE8; color: black;"><?= $qs_d_rating ?>%</td>
            <td style="background-color: #B6DDE8; color: black;"><?= $rsi_a_rating ?>%</td>
            <td style="background-color: #B6DDE8; color: black;"><?= $rsi_b_rating ?>%</td>
            <td style="background-color: #B6DDE8; color: black;"><?= $rsi_c_rating ?>%</td>
            <td style="background-color: #B6DDE8; color: black;"><?= $rsi_d_rating ?>%</td>
            <td style="background-color: #B6DDE8; color: black;"><?= $tv_a_rating ?>%</td>
            <td style="background-color: #B6DDE8; color: black;"><?= $tv_b_rating ?>%</td>
            <td style="background-color: #B6DDE8; color: black;"><?= $tv_c_rating ?>%</td>
            <td style="background-color: #B6DDE8; color: black;"><?= $tv_d_rating ?>%</td>
            <td></td>
        </tr>
        <tr class="level-satisfaction">
            <td></td>
            <td>Level of Satisfaction</td>
            <?php foreach ($ratingVar as $ratingVariable): ?>
                <td style="background-color: #B6DDE8; color: black;"><?= satisfaction($ratingVariable) ?></td>
            <?php endforeach; ?>
            <td></td>
        </tr>
    </tbody>
</table>

<!-- Container for three (ARTA) QUALITY DIMENSIONS tables -->
<div class="container">
    <!-- Table 1 -->
    <table>
    <thead>
        <tr>
            <th style="background-color: #002060; color: white;">(ARTA)  DIMENSIONS</th>
            <th style="background-color: #002060; color: white;">CSF SCORE</th>
        </tr>
    </thead>
    <tbody>
        <tr class="left-align">
            <td>RESPONSIVENESS</td>
            <td class="placeholder"><?= $responsiveness ?></td>
        </tr>
        <tr class="left-align">
            <td>RELIABILITY</td>
            <td class="placeholder"><?= $reliability ?></td>
        </tr>
        <tr class="left-align">
            <td>OUTCOME</td>
            <td class="placeholder"><?= $outcome ?></td>
        </tr>
        <tr class="left-align">
            <td>ACCESS TO FACILITIES</td>
            <td class="placeholder"><?= $access_facilities ?></td>
        </tr>
        <tr class="left-align">
            <td>COMMS</td>
            <td class="placeholder"><?= $rsi_b_score ?></td>
        </tr>
        <tr class="left-align">
            <td>INTEGRITY</td>
            <td class="placeholder"><?= $rsi_d_score ?></td>
        </tr>
        <tr class="blue-background left-align">
            <td style="background-color: #002060; color: white;">OVERALL AVE</td>
            <td class="placeholder" style="background-color: #002060; color: white;"><?= $overall_ave ?></td>
        </tr>
        <tr class="orange-background left-align">
            <td style="background-color: #974806; color: white;">OVERALL RATING</td>
            <td class="placeholder" style="background-color: #974806; color: white;"><?= $overall_rating ?>%</td>
        </tr>
        <tr class="dark-purple-background left-align">
            <td style="background-color: #002060; color: white;">OVERALL SATISFACTION</td>
            <td class="placeholder" style="background-color: #002060; color: white;"><?= satisfaction($overall_rating) ?></td>
        </tr>
    </tbody>
    </table>

    <!-- Table 2 -->
    <table class="arta-table">
        <thead>
            <tr>
                <th style="background-color: #002060; color: white;">(ARTA) DIMENSIONS</th>
                <th style="background-color: #002060; color: white;">% SATISFACTION</th>
            </tr>
        </thead>
        <tbody>
            <tr class="left-align">
                <td>RESPONSIVENESS</td>
                <td class="placeholder"><?= $responsiveness_satisfaction ?>%</td>
            </tr>
            <tr class="left-align">
                <td>RELIABILITY</td>
                <td class="placeholder"><?= $reliability_satisfaction ?>%</td>
            </tr>
            <tr class="left-align">
                <td>OUTCOME</td>
                <td class="placeholder"><?= $outcome_satisfaction ?>%</td>
            </tr>
            <tr class="left-align">
                <td>ACCESS TO FACILITIES</td>
                <td class="placeholder"><?= $facilities_satisfaction ?>%</td>
            </tr>
            <tr class="left-align">
                <td>COMMS.</td>
                <td class="placeholder"><?= $comms_satisfaction ?>%</td>
            </tr>
            <tr class="left-align">
                <td>INTEGRITY</td>
                <td class="placeholder"><?= $integrity_satisfaction ?>%</td>
            </tr>
            <tr class="blue-background left-align">
                <td style="background-color: #002060; color: white;">OVERALL AVE</td>
                <td class="placeholder" style="background-color: #002060; color: white;"><?= $overall_satisfaction ?>%</td>
            </tr>
            <tr class="orange-background left-align">
                <td style="background-color: #974806; color: white;">ADJECTIVAL RATING</td>
                <td class="placeholder" style="background-color: #974806; color: white;"><?= adjectival_rating($overall_satisfaction) ?></td>
            </tr>
        </tbody>
    </table>
</div>

<div class="container">
    <!-- Table 1 -->
    <table class="arta-table">
        <thead>
            <tr>
                <th  style="background-color: #002060; color: white;">CRITERIA</th>
                <th  style="background-color: #002060; color: white;">CSF SCORE</th>
            </tr>
        </thead>
        <tbody>
            <tr class="left-align">
                <td>QUALITY SERVICE</td>
                <td class="placeholder"><?= $quality_service ?></td>
            </tr>
            <tr class="left-align">
                <td>DTI STAFF</td>
                <td class="placeholder"><?= $dti_staff ?></td>
            </tr>
            <tr class="left-align">
                <td>VENUE/PLATFORM</td>
                <td class="placeholder"><?= $venue ?></td>
            </tr>
            <tr class="blue-background left-align">
                <td  style="background-color: #002060; color: white;">OVERALL AVE</td>
                <td class="placeholder"  style="background-color: #002060; color: white;"><?= $overall_criteria ?></td>
            </tr>
            <tr class="orange-background left-align">
                <td style="background-color: #974806; color: white;">OVERALL RATING</td>
                <td class="placeholder" style="background-color: #974806; color: white;"><?= $overall_criteria_rating ?>%</td>
            </tr>
            <tr class="dark-purple-background left-align">
                <td style="background-color: #002060; color: white;">OVERALL SATISFACTION</td>
                <td class="placeholder" style="background-color: #002060; color: white;"><?= satisfaction($overall_criteria_rating) ?></td>
            </tr>
        </tbody>
    </table>

    <!-- Table 2 -->
    <table class="arta-table">
        <thead>
            <tr>
                <th style="background-color: #002060; color: white;">(ARTA) OVERALL SATISFACTION</th>
                <th style="background-color: #002060; color: white;">% DISTRIBUTION</th>
            </tr>
        </thead>
        <tbody>
            <tr class="left-align">
                <td>Very Satisfied (VS)</td>
                <td class="placeholder"><?= $overall_very_satisfy_rating ?>%</td>
            </tr>
            <tr class="left-align">
                <td>Satisfied (S)</td>
                <td class="placeholder"><?= $overall_satisfy_rating ?>%</td>
            </tr>
            <tr class="left-align">
                <td>Dissatisfied (D)</td>
                <td class="placeholder"><?= $overall_dissatisfy_rating ?>%</td>
            </tr>
            <tr class="left-align">
                <td>Very Dissatisfied (VD)</td>
                <td class="placeholder"><?= $overall_very_dissatisfy_rating ?>%</td>
            </tr>
            <tr class="yellow-background">
                <td style="background-color: #002060; color: white;">TOTAL</td>
                <td class="placeholder" style="background-color: #002060; color: white;"><?= $total_overall_satisfaction ?>%</td>
            </tr>
            <tr class="orange-background left-align">
                <td style="background-color: #974806; color: white;">Satisfaction Level (VS+ S)</td>
                <td class="placeholder" style="background-color: #974806; color: white;"><?= $sum ?>%</td>
            </tr>
        </tbody>
    </table>
</div>


<!-- Container for additional tables (Sex Disaggregate and Interpretation) -->
<div class="additional-container">
    <!-- Table 4: Sex Disaggregate -->
    <table>
        <thead>
            <tr>
                <th colspan="3" style="background-color: #974806; color: white;">SEX DISAGGREGATE</th>
            </tr>
            <tr>
                <th style="background-color: #063997; color: white;">Sex</th>
                <th style="background-color: #063997; color: white;">Count</th>
                <th style="background-color: #063997; color: white;">% DISTR</th>
            </tr>
        </thead>
        <tbody>
            <tr class="left-align">
                <td>MALE</td>
                <td class="placeholder"><?= $count_male ?></td>
                <td class="placeholder"><?= $male_percent ?>%</td>
            </tr>
            <tr class="left-align">
                <td>FEMALE</td>
                <td class="placeholder"><?= $count_female ?></td>
                <td class="placeholder"><?= $female_percent ?>%</td>
            </tr>
            <tr class="left-align" >
                <td style="background-color: #FFC000; color: black;">TOTAL</td>
                <td class="placeholder" style="background-color: #FFC000; color: black;"><?= $total_sex ?></td>
                <td class="placeholder" style="background-color: #FFC000; color: black;"><?= $total_sex_percent ?>%</td>
            </tr>
        </tbody>
    </table>

    <!-- Table 5: Interpretation -->
    <table>
        <thead>
            <tr>
                <th colspan="3" style="background-color: #205867; color: white;">INTERPRETATION</th>
            </tr>
            <tr>
                <th style="background-color: #FFC000; color: white;">Level of Satisfaction</th>
                <th style="background-color: #FFC000; color: white;">Range</th>
                <th style="background-color: #FFC000; color: white;">% Range</th>
            </tr>
        </thead>
        <tbody>
            <tr class="left-align">
                <td style="background-color: #0F243E; color: white;">Very Satisfied (VS)</td>
                <td class="placeholder" style="background-color: #0F243E; color: white;">---</td>
                <td class="placeholder" style="background-color: #0F243E; color: white;">---</td>
            </tr>
            <tr class="left-align">
                <td style="background-color: #17365D; color: white;">Satisfied (S)</td>
                <td class="placeholder" style="background-color: #17365D; color: white;">---</td>
                <td class="placeholder" style="background-color: #17365D; color: white;">---</td>
            </tr>
            <tr class="left-align">
                <td style="background-color: #953734; color: white;">Dissatisfied (D)</td>
                <td class="placeholder" style="background-color: #953734; color: white;">---</td>
                <td class="placeholder" style="background-color: #953734; color: white;">---</td>
            </tr>
            <tr class="left-align">
                <td style="background-color: #632423; color: white;">Very Dissatisfied (VD)</td>
                <td class="placeholder" style="background-color: #632423; color: white;">---</td>
                <td class="placeholder" style="background-color: #632423; color: white;">---</td>
            </tr>
        </tbody>
    </table>
</div>

</body>

<style>
    body {
        font-family: Arial, sans-serif;
        padding: 20px;
        text-align: center;
    }
    /* Set table width to 80% for better fit */
    table {
        width: 80%;
        margin: 0 auto; /* Center-align the table */
        border-collapse: collapse;
        margin-bottom: 45px; /* Add bottom margin for better spacing */
    }
    th, td {
        border: 1px solid black;
        padding: 12px; /* Increase cell padding for better readability */
        text-align: center;
        font-size: 14px; /* Maintain current font size */
    }
    th {
        background-color: #f2f2f2;
    }
    h2 {
        text-align: center;
    }
    /* Custom class to override text-align for specific rows */
    .left-align td {
        text-align: left; /* Align text to the left for these rows */
    }

    /* Center the placeholder text by default */
    td.placeholder {
        text-align: center;
    }

    /* Adjust the container for main and additional tables */
    .container {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        gap: 22px; /* Adjust gap between tables */
        margin-top: 40px; /* Add top margin for the container */
        width: 80%; /* Set width to 80% of the parent element (body) */
        margin: 0 auto; /* Center-align the container */
    }
    /* Set a common style for the ARTA tables */
    .arta-table {
        width: 100%; /* Ensure table occupies full width of its container */
        border-collapse: collapse;
        margin-bottom: 45px; /* Add bottom margin for better spacing */
    }
    .arta-table th, .arta-table td {
        border: 1px solid black;
        padding: 12px; /* Increase cell padding for better readability */
        text-align: center;
        font-size: 14px; /* Maintain current font size */
    }
    .arta-table th {
        background-color: #f2f2f2;
    }
    /* Custom class to override text-align for specific rows */
    .arta-table .left-align td {
        text-align: left; /* Align text to the left for these rows */
    }
    /* Center the placeholder text by default */
    .arta-table td.placeholder {
        text-align: center;
    }
    /* Adjust layout for additional tables */
    .additional-container {
        display: flex;
        justify-content: center; /* Center-align child elements */
        gap: 23px; /* Adjust gap between tables */
        margin-top: 8px; /* Add top margin for the container */
    }
    
    /* Style for additional tables (SEX DISAGGREGATE and INTERPRETATION) */
    .additional-container table {
        width: 33%; /* Adjust width of each table */
        margin: 0; /* Reset margin to avoid extra spacing */
    }


    </style>
