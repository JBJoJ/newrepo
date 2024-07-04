<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var frontend\models\FinancialClaim $model */
/** @var ActiveForm $form */

$this->title = Yii::t('app', 'Financial Claim - External Tabulation');

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

?>

<body>

<h2>Financial Claim - Internal Tabulation Sheet Summary</h2>

<!-- First Table: Tabulation Sheet Summary -->
<table>
    <thead>
        <tr>
            <th colspan="2" style="background-color: #002060; color: white;">Proposed Formula</th>
            <th colspan="6" style="background-color: #FFC000; color: white;">RESPONSIVENESS, ASSURANCE, INTEGRITY, AND COMMUNICATION</th>
            <th colspan="3" style="background-color: #FFC000; color: white;">ACCESS AND FACILITIES</th>
            <th style="background-color: #FFC000; color: white;">RELIABILITY AND OUTCOME</th>
            <th>OVERALL PMT</th>
        </tr>
        <tr>
            <th>Weights</th>
            <th>Level of Satisfaction</th>
            <th>a</th>
            <th>b</th>
            <th>c</th>
            <th>d</th>
            <th>e</th>
            <th>f</th>
            <th>a</th>
            <th>b</th>
            <th>c</th>
            <th>a</th>
            <th>%</th>
        </tr>
    </thead>
    <tbody>
        <!-- Placeholder rows for Proposed Formula -->
        <tr>
            <td>4</td>
            <td>Very Satisfied</td>
            <?php foreach ($very_satisfy as $result): ?>
                <td><?= $result['very_satisfy_raic_a'] ?></td>
                <td><?= $result['very_satisfy_raic_b'] ?></td>
                <td><?= $result['very_satisfy_raic_c'] ?></td>
                <td><?= $result['very_satisfy_raic_d'] ?></td>
                <td><?= $result['very_satisfy_raic_e'] ?></td>
                <td><?= $result['very_satisfy_raic_f'] ?></td>
                <td><?= $result['very_satisfy_af_a'] ?></td>
                <td><?= $result['very_satisfy_af_b'] ?></td>
                <td><?= $result['very_satisfy_af_c'] ?></td>
                <td><?= $result['very_satisfy_rao'] ?></td>
            <?php endforeach; ?>
            <td><?= $percentage_very_satisfy ?>%</td>
        </tr>
        <tr>
            <td>3</td>
            <td>Satisfied</td>
            <?php foreach ($satisfy as $result): ?>
                <td><?= $result['satisfy_raic_a'] ?></td>
                <td><?= $result['satisfy_raic_b'] ?></td>
                <td><?= $result['satisfy_raic_c'] ?></td>
                <td><?= $result['satisfy_raic_d'] ?></td>
                <td><?= $result['satisfy_raic_e'] ?></td>
                <td><?= $result['satisfy_raic_f'] ?></td>
                <td><?= $result['satisfy_af_a'] ?></td>
                <td><?= $result['satisfy_af_b'] ?></td>
                <td><?= $result['satisfy_af_c'] ?></td>
                <td><?= $result['satisfy_rao'] ?></td>
            <?php endforeach; ?>
            <td><?= $percentage_satisfy ?>%</td>
        </tr>
        <tr>
            <td>2</td>
            <td>Dissatisfied</td>
            <?php foreach ($dissatisfy as $result): ?>
                <td><?= $result['dissatisfy_raic_a'] ?></td>
                <td><?= $result['dissatisfy_raic_b'] ?></td>
                <td><?= $result['dissatisfy_raic_c'] ?></td>
                <td><?= $result['dissatisfy_raic_d'] ?></td>
                <td><?= $result['dissatisfy_raic_e'] ?></td>
                <td><?= $result['dissatisfy_raic_f'] ?></td>
                <td><?= $result['dissatisfy_af_a'] ?></td>
                <td><?= $result['dissatisfy_af_b'] ?></td>
                <td><?= $result['dissatisfy_af_c'] ?></td>
                <td><?= $result['dissatisfy_rao'] ?></td>
            <?php endforeach; ?>
            <td><?= $percentage_dissatisfy ?>%</td>
        </tr>
        <tr>
            <td>1</td>
            <td>Very Dissatisfied</td>
            <?php foreach ($very_dissatisfy as $result): ?>
                <td><?= $result['very_dissatisfy_raic_a'] ?></td>
                <td><?= $result['very_dissatisfy_raic_b'] ?></td>
                <td><?= $result['very_dissatisfy_raic_c'] ?></td>
                <td><?= $result['very_dissatisfy_raic_d'] ?></td>
                <td><?= $result['very_dissatisfy_raic_e'] ?></td>
                <td><?= $result['very_dissatisfy_raic_f'] ?></td>
                <td><?= $result['very_dissatisfy_af_a'] ?></td>
                <td><?= $result['very_dissatisfy_af_b'] ?></td>
                <td><?= $result['very_dissatisfy_af_c'] ?></td>
                <td><?= $result['very_dissatisfy_rao'] ?></td>
            <?php endforeach; ?>
            <td><?= $percentage_very_dissatisfy ?>%</td>
        </tr>
        <tr>
            <td></td>
            <td>No Responses (888)</td>
            <?php foreach ($no_response as $result): ?>
                <td><?= $result['no_responses_raic_a'] ?></td>
                <td><?= $result['no_responses_raic_b'] ?></td>
                <td><?= $result['no_responses_raic_c'] ?></td>
                <td><?= $result['no_responses_raic_d'] ?></td>
                <td><?= $result['no_responses_raic_e'] ?></td>
                <td><?= $result['no_responses_raic_f'] ?></td>
                <td><?= $result['no_responses_af_a'] ?></td>
                <td><?= $result['no_responses_af_b'] ?></td>
                <td><?= $result['no_responses_af_c'] ?></td>
                <td><?= $result['no_responses_rao'] ?></td>
            <?php endforeach; ?>
            <!-- <td><?= $percentage_no_response ?>%</td> -->
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td>For Validation (999)</td>
            <?php foreach ($for_validation as $result): ?>
                <td><?= $result['for_validation_raic_a'] ?></td>
                <td><?= $result['for_validation_raic_b'] ?></td>
                <td><?= $result['for_validation_raic_c'] ?></td>
                <td><?= $result['for_validation_raic_d'] ?></td>
                <td><?= $result['for_validation_raic_e'] ?></td>
                <td><?= $result['for_validation_raic_f'] ?></td>
                <td><?= $result['for_validation_af_a'] ?></td>
                <td><?= $result['for_validation_af_b'] ?></td>
                <td><?= $result['for_validation_af_c'] ?></td>
                <td><?= $result['for_validation_rao'] ?></td>
            <?php endforeach; ?>
            <!-- <td><?= $percentage_for_validation ?>%</td> -->
            <td></td>
        </tr>
        <tr class="total-responses">
            <td></td>
            <td>TOTAL RESPONSES</td>
            <?php for ($i = 0; $i < 10; $i++): ?>
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
            <?php foreach ($score as $scores): ?>
                <td style="background-color: #B6DDE8; color: black;"><?= $scores ?></td>
            <?php endforeach; ?>
            <td></td>
        </tr>
        <tr class="csf-rating">
            <td></td>
            <td>CSF RATING</td>
            <?php foreach ($ratings as $category => $rating): ?>
                <td style="background-color: #B6DDE8; color: black;"><?= $rating ?>%</td>
            <?php endforeach; ?> 
            <td></td>
        </tr>
        <tr class="level-satisfaction">
            <td></td>
            <td>Level of Satisfaction</td>
            <?php foreach ($ratings as $category => $rating): ?>
                <td style="background-color: #B6DDE8; color: black;"><?= satisfaction($rating) ?></td>
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
                <th style="background-color: #002060; color: white;">(ARTA) QUALITY DIMENSIONS</th>
                <th style="background-color: #002060; color: white;">CSF SCORE</th>
            </tr>
        </thead>
        <tbody>
        <tr class="left-align">
                <td>RESPONSIVENESS</td>
                <td class="placeholder"><?= $responsiveness ?></td>
            </tr>
            <tr class="left-align">
                <td>ASSURANCE</td>
                <td class="placeholder"><?= $assurance ?></td>
            </tr>
            <tr class="left-align">
                <td>INTEGRITY</td>
                <td class="placeholder"><?= $integrity ?></td>
            </tr>
            <tr class="left-align">
                <td>RELIABILITY</td>
                <td class="placeholder"><?= $realibility ?></td>
            </tr>
            <tr class="left-align">
                <td>OUTCOME</td>
                <td class="placeholder"><?= $outcome ?></td>
            </tr>
            <tr class="left-align">
                <td>COMMUNICATION</td>
                <td class="placeholder"><?= $communication ?></td>
            </tr>
            <tr class="left-align">
                <td>ACCESS TO FACILITIES</td>
                <td class="placeholder"><?= $access_facilities ?></td>
            </tr>
            <tr class="left-align">
                <td style="background-color: #002060; color: white;">OVERALL AVE</td>
                <td class="placeholder" style="background-color: #002060; color: white;"><?= $overall_ave ?></td>
            </tr>
            <tr class="left-align">
                <td style="background-color: #974806; color: white;">OVERALL RATING</td>
                <td class="placeholder" style="background-color: #974806; color: white;"><?= $overall_rating ?>%</td>
            </tr>
            <tr class="left-align">
                <td style="background-color: #002060; color: white;">OVERALL SATISFACTION</td>
                <td class="placeholder" style="background-color: #002060; color: white;"><?= satisfaction($overall_rating) ?></td>
            </tr>
        </tbody>
    </table>

    <!-- Table 2 -->
    <table>
        <thead>
            <tr>
                <th style="background-color: #002060; color: white;">(ARTA) QUALITY DIMENSIONS</th>
                <th style="background-color: #002060; color: white;">% SATISFACTION</th>
            </tr>
        </thead>
        <tbody>
            <tr class="left-align">
                <td>RESPONSIVENESS</td>
                <td class="placeholder"><?= $responsiveness_satisfaction ?>%</td>
            </tr>
            <tr class="left-align">
                <td>ASSURANCE</td>
                <td class="placeholder"><?= $assurance_satisfaction ?>%</td>
            </tr>
            <tr class="left-align">
                <td>INTEGRITY</td>
                <td class="placeholder"><?= $integrity_satisfaction ?>%</td>
            </tr>
            <tr class="left-align">
                <td>RELIABILITY</td>
                <td class="placeholder"><?= $realibility_satisfaction ?>%</td>
            </tr>
            <tr class="left-align">
                <td>OUTCOME</td>
                <td class="placeholder"><?= $outcome_satisfaction ?>%</td>
            </tr>
            <tr class="left-align">
                <td>COMMUNICATION</td>
                <td class="placeholder"><?= $communication_satisfaction ?>%</td>
            </tr>
            <tr class="left-align">
                <td>ACCESS TO FACILITIES</td>
                <td class="placeholder"><?= $access_facilities_satisfaction ?>%</td>
            </tr>
            <tr class="left-align">
                <td style="background-color: #002060; color: white;">OVERALL AVE</td>
                <td class="placeholder" style="background-color: #002060; color: white;"><?= $overall_ave_satisfaction ?>%</td>
            </tr>
            <tr class="left-align">
                <td style="background-color: #974806; color: white;">ADJECTIVAL RATING</td>
                <td class="placeholder" style="background-color: #974806; color: white;"><?= adjectival_rating($overall_ave_satisfaction) ?></td>
            </tr>
        </tbody>
    </table>
</div>

<!-- Container for SEX DISAGGREGATE and INTERPRETATION tables -->
<div class="additional-container">
    <!-- Table 4: Sex Disaggregate -->
    <table>
        <thead>
            <tr>
                <th colspan="3" style="background-color: #974806; color: white;">SEX DISAGGREGATE</th>
            </tr>
            <tr>
                <th style="background-color: #002060; color: white;">Sex</th>
                <th style="background-color: #002060; color: white;">Count</th>
                <th style="background-color: #002060; color: white;">% DISTR</th>
            </tr>
        </thead>
        <tbody>
            <!-- Rows for sex disaggregation -->
            <tr>
                <td>MALE</td>
                <td><?= $count_male ?></td>
                <td><?= $male_percent ?>%</td>
            </tr>
            <tr>
                <td>FEMALE</td>
                <td><?= $count_female ?></td>
                <td><?= $female_percent ?>%</td>
            </tr>
            <tr>
                <td style="background-color: #FFC000; color: black;">TOTAL</td>
                <td style="background-color: #FFC000; color: black;"><?= $total_sex ?></td>
                <td style="background-color: #FFC000; color: black;"><?= $total_sex_percent ?>%</td>
            </tr>
        </tbody>
    </table>

    <table>
        <thead>
            <tr>
                <th colspan="3" style="background-color: #9BBB59; color: white;">CLIENT TYPE</th>
            </tr>
            <tr>
                <th style="background-color: #002060; color: white;">SERVICE</th>
                <th style="background-color: #002060; color: white;">COUNT</th>
                <th style="background-color: #002060; color: white;">% DISTR</th>
            </tr>
        </thead>
        <tbody>
            <!-- Rows for sex disaggregation -->
            <tr class="left-align">
                <td>CITIZEN</td>
                <td class="placeholder">---</td>
                <td class="placeholder">---</td>
            </tr>
            <tr class="left-align">
                <td>BUSINESS</td>
                <td class="placeholder">---</td>
                <td class="placeholder">---</td>
            </tr>
            <tr class="left-align">
                <td>GOVERNMENT</td>
                <td class="placeholder">---</td>
                <td class="placeholder">---</td>
            </tr>
            <tr class="left-align">
                <td style="background-color: #FFC000; color: white;">TOTAL</td>
                <td class="placeholder" style="background-color: #FFC000; color: white;">---</td>
                <td class="placeholder" style="background-color: #FFC000; color: white;">---</td>
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
            <!-- Rows for interpretation -->
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
    /* Set table width to 70% for better fit */
    table {
        width: 71%;
        margin: 0 auto; /* Center-align the table */
        border-collapse: collapse;
        margin-bottom: 45px; /* Add bottom margin for better spacing */
    }
    th, td {
        border: 1px solid black;
        padding: 8px; /* Maintain cell padding */
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
        width: 71%; /* Set width to 70% of the parent element (body) */
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
        padding: 8px; /* Maintain cell padding */
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
        width: 22.5%; /* Adjust width of each table */
        margin: 0; /* Reset margin to avoid extra spacing */
    }
</style>