<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var frontend\models\RequestSupply $model */
/** @var ActiveForm $form */

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

?>
<h2>Tabulation Sheet Summary</h2>

<!-- First Table: Tabulation Sheet Summary -->
<table>
    <thead>
        <tr>
            <th colspan="2" style="background-color: #002060; color: white;">Proposed Formula</th>
            <th class="quality-service-col" colspan="2" style="background-color: #FFC000; color: white;">QUALITY SERVICE</th> <!-- Adjusted column widths for Quality Service -->
            <th class="dti-staff-col" colspan="5" style="background-color: #FFC000; color: white;">DTI STAFF</th> <!-- Adjusted column width -->
            <th class="service-requested-col" colspan="1" style="background-color: #FFC000; color: white;">Result of Service/s Requested</th> <!-- Adjusted column width -->
            <th>OVERALL PMT</th>
        </tr>
        <tr>
            <th>Weights</th>
            <th>Level of Satisfaction</th>
            <th class="quality-service-col">a</th> <!-- Adjusted column width for 'a' -->
            <th class="quality-service-col">b</th> <!-- Adjusted column width for 'b' -->
            <th class="dti-staff-col">a</th>
            <th class="dti-staff-col">b</th>
            <th class="dti-staff-col">c</th>
            <th class="dti-staff-col">d</th>
            <th class="dti-staff-col">e</th>
            <th class="service-requested-col">a</th>
            <th>%</th>
        </tr>
    </thead>
    <tbody>
        <!-- Placeholder rows for Proposed Formula -->
        <tr>
            <td>4</td>
            <td>Very Satisfied</td>
            <?php foreach ($very_satisfy as $result): ?>
                <td class="quality-service-col"><?= $result['very_satisfy_qs_a'] ?></td>
                <td class="quality-service-col"><?= $result['very_satisfy_qs_b'] ?></td>
                <td class="dti-staff-col"><?= $result['very_satisfy_staff_a'] ?></td>
                <td class="dti-staff-col"><?= $result['very_satisfy_staff_b'] ?></td>
                <td class="dti-staff-col"><?= $result['very_satisfy_staff_c'] ?></td>
                <td class="dti-staff-col"><?= $result['very_satisfy_staff_d'] ?></td>
                <td class="dti-staff-col"><?= $result['very_satisfy_staff_e'] ?></td>
                <td class="service-requested-col"><?= $result['very_satisfy_os_a'] ?></td>
            <?php endforeach; ?>
            <td><?= $percentage_very_satisfy ?>%</td>
        </tr>
        <!-- Add more rows as needed -->
        <tr>
            <td>3</td>
            <td>Satisfied</td>
            <?php foreach ($satisfy as $result): ?>
                <td class="quality-service-col"><?= $result['satisfy_qs_a'] ?></td>
                <td class="quality-service-col"><?= $result['satisfy_qs_b'] ?></td>
                <td class="dti-staff-col"><?= $result['satisfy_staff_a'] ?></td>
                <td class="dti-staff-col"><?= $result['satisfy_staff_b'] ?></td>
                <td class="dti-staff-col"><?= $result['satisfy_staff_c'] ?></td>
                <td class="dti-staff-col"><?= $result['satisfy_staff_d'] ?></td>
                <td class="dti-staff-col"><?= $result['satisfy_staff_e'] ?></td>
                <td class="service-requested-col"><?= $result['satisfy_os_a'] ?></td>
            <?php endforeach; ?>
            <td><?= $percentage_satisfy ?>%</td>
        </tr>
        <tr>
            <td>2</td>
            <td>Dissatisfied</td>
            <?php foreach ($dissatisfy as $result): ?>
                <td class="quality-service-col"><?= $result['dissatisfy_qs_a'] ?></td>
                <td class="quality-service-col"><?= $result['dissatisfy_qs_b'] ?></td>
                <td class="dti-staff-col"><?= $result['dissatisfy_staff_a'] ?></td>
                <td class="dti-staff-col"><?= $result['dissatisfy_staff_b'] ?></td>
                <td class="dti-staff-col"><?= $result['dissatisfy_staff_c'] ?></td>
                <td class="dti-staff-col"><?= $result['dissatisfy_staff_d'] ?></td>
                <td class="dti-staff-col"><?= $result['dissatisfy_staff_e'] ?></td>
                <td class="service-requested-col"><?= $result['dissatisfy_os_a'] ?></td>
            <?php endforeach; ?>
            <td><?= $percentage_dissatisfy ?>%</td>
        </tr>
        <tr>
            <td>1</td>
            <td>Very Dissatisfied</td>
            <?php foreach ($very_dissatisfy as $result): ?>
                <td class="quality-service-col"><?= $result['very_dissatisfy_qs_a'] ?></td>
                <td class="quality-service-col"><?= $result['very_dissatisfy_qs_b'] ?></td>
                <td class="dti-staff-col"><?= $result['very_dissatisfy_staff_a'] ?></td>
                <td class="dti-staff-col"><?= $result['very_dissatisfy_staff_b'] ?></td>
                <td class="dti-staff-col"><?= $result['very_dissatisfy_staff_c'] ?></td>
                <td class="dti-staff-col"><?= $result['very_dissatisfy_staff_d'] ?></td>
                <td class="dti-staff-col"><?= $result['very_dissatisfy_staff_e'] ?></td>
                <td class="service-requested-col"><?= $result['very_dissatisfy_os_a'] ?></td>
            <?php endforeach; ?>
            <td><?= $percentage_very_dissatisfy ?>%</td>
        </tr>
        <tr>
            <td></td>
            <td>No Responses (888)</td>
            <?php foreach ($no_response as $result): ?>
                <td class="quality-service-col"><?= $result['no_response_qs_a'] ?></td>
                <td class="quality-service-col"><?= $result['no_response_qs_b'] ?></td>
                <td class="dti-staff-col"><?= $result['no_response_staff_a'] ?></td>
                <td class="dti-staff-col"><?= $result['no_response_staff_b'] ?></td>
                <td class="dti-staff-col"><?= $result['no_response_staff_c'] ?></td>
                <td class="dti-staff-col"><?= $result['no_response_staff_d'] ?></td>
                <td class="dti-staff-col"><?= $result['no_response_staff_e'] ?></td>
                <td class="service-requested-col"><?= $result['no_response_os_a'] ?></td>
            <?php endforeach; ?>
            <td>---</td>
        </tr>
        <tr>
            <td></td>
            <td>For Validation (999)</td>
            <?php foreach ($for_validation as $result): ?>
                <td class="quality-service-col"><?= $result['for_validation_qs_a'] ?></td>
                <td class="quality-service-col"><?= $result['for_validation_qs_b'] ?></td>
                <td class="dti-staff-col"><?= $result['for_validation_staff_a'] ?></td>
                <td class="dti-staff-col"><?= $result['for_validation_staff_b'] ?></td>
                <td class="dti-staff-col"><?= $result['for_validation_staff_c'] ?></td>
                <td class="dti-staff-col"><?= $result['for_validation_staff_d'] ?></td>
                <td class="dti-staff-col"><?= $result['for_validation_staff_e'] ?></td>
                <td class="service-requested-col"><?= $result['for_validation_os_a'] ?></td>
            <?php endforeach; ?>
            <td>---</td>
        </tr>
        <tr class="total-responses">
            <td></td>
            <td>TOTAL RESPONSES</td>
            <?php for ($i = 0; $i < 8; $i++): ?>
                <td style="background-color: #B6DDE8; color: black;"><?= $total_count ?></td>
            <?php endfor; ?>
            <td>---</td>
        </tr>
        <tr class="percent-satisfaction">
            <td></td>
            <td>% SATISFACTION</td>
            <td style="background-color: #B6DDE8; color: black;"><?= $satisfaction['qs_a'] ?>%</td>
            <td style="background-color: #B6DDE8; color: black;"><?= $satisfaction['qs_a'] ?>%</td>
            <td style="background-color: #B6DDE8; color: black;"><?= $satisfaction['staff_a'] ?>%</td>
            <td style="background-color: #B6DDE8; color: black;"><?= $satisfaction['staff_b'] ?>%</td>
            <td style="background-color: #B6DDE8; color: black;"><?= $satisfaction['staff_c'] ?>%</td>
            <td style="background-color: #B6DDE8; color: black;"><?= $satisfaction['staff_d'] ?>%</td>
            <td style="background-color: #B6DDE8; color: black;"><?= $satisfaction['staff_e'] ?>%</td>
            <td style="background-color: #B6DDE8; color: black;"><?= $satisfaction['os_a'] ?>%</td>
            <td>---</td>
        </tr>
        <tr class="csf-score">
            <td></td>
            <td>CSF SCORE</td>
            <td style="background-color: #B6DDE8; color: black;"><?= $score['qs_a'] ?></td>
            <td style="background-color: #B6DDE8; color: black;"><?= $score['qs_a'] ?></td>
            <td style="background-color: #B6DDE8; color: black;"><?= $score['staff_a'] ?></td>
            <td style="background-color: #B6DDE8; color: black;"><?= $score['staff_b'] ?></td>
            <td style="background-color: #B6DDE8; color: black;"><?= $score['staff_c'] ?></td>
            <td style="background-color: #B6DDE8; color: black;"><?= $score['staff_d'] ?></td>
            <td style="background-color: #B6DDE8; color: black;"><?= $score['staff_e'] ?></td>
            <td style="background-color: #B6DDE8; color: black;"><?= $score['os_a'] ?></td>
            <td>---</td>
        </tr>
        <tr class="csf-rating">
            <td></td>
            <td>CSF RATING</td>
            <td style="background-color: #B6DDE8; color: black;"><?= $ratings['qs_a'] ?>%</td>
            <td style="background-color: #B6DDE8; color: black;"><?= $ratings['qs_a'] ?>%</td>
            <td style="background-color: #B6DDE8; color: black;"><?= $ratings['staff_a'] ?>%</td>
            <td style="background-color: #B6DDE8; color: black;"><?= $ratings['staff_b'] ?>%</td>
            <td style="background-color: #B6DDE8; color: black;"><?= $ratings['staff_c'] ?>%</td>
            <td style="background-color: #B6DDE8; color: black;"><?= $ratings['staff_d'] ?>%</td>
            <td style="background-color: #B6DDE8; color: black;"><?= $ratings['staff_e'] ?>%</td>
            <td style="background-color: #B6DDE8; color: black;"><?= $ratings['os_a'] ?>%</td>
            <td>---</td>
        </tr>
        <tr class="level-satisfaction">
            <td></td>
            <td>Level of Satisfaction</td>
            <td style="background-color: #B6DDE8; color: black;"><?= satisfaction($score['qs_a']) ?></td>
            <td style="background-color: #B6DDE8; color: black;"><?= satisfaction($score['qs_a']) ?></td>
            <td style="background-color: #B6DDE8; color: black;"><?= satisfaction($score['staff_a']) ?></td>
            <td style="background-color: #B6DDE8; color: black;"><?= satisfaction($score['staff_b']) ?></td>
            <td style="background-color: #B6DDE8; color: black;"><?= satisfaction($score['staff_c']) ?></td>
            <td style="background-color: #B6DDE8; color: black;"><?= satisfaction($score['staff_d']) ?></td>
            <td style="background-color: #B6DDE8; color: black;"><?= satisfaction($score['staff_e']) ?></td>
            <td style="background-color: #B6DDE8; color: black;"><?= satisfaction($score['os_a']) ?></td>
            <td>---</td>
        </tr>
    </tbody>
</table>
</html>

        <!-- Container for three (ARTA) QUALITY DIMENSIONS tables -->
<div class="container">

    <table>
        <thead>
            <tr>
                <th style="background-color: #002060; color: white;">CRITERIA</th>
                <th style="background-color: #002060; color: white;">CSF SCORE</th>
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
                <td>RESULT OF SERVICE/S REQUESTED</td>
                <td class="placeholder"><?= $result_requested ?></td>
            </tr>
            <tr class="left-align">
                <td style="background-color: #002060; color: white;">OVERALL AVE</td>
                <td class="placeholder" style="background-color: #002060; color: white;"><?= $overall_ave_score ?></td>
            </tr>
            <tr class="left-align">
                <td style="background-color: #974806; color: white;">OVERALL RATING</td>
                <td class="placeholder" style="background-color: #974806; color: white;"><?= $overall_ave_score_rating ?></td>
            </tr>
            <tr class="left-align">
                <td style="background-color: #002060; color: white;">OVERALL SATISFACTION</td>
                <td class="placeholder" style="background-color: #002060; color: white;"><?= satisfaction($overall_ave_score_rating) ?></td>
            </tr>
        </tbody>
    </table>


    <!-- Table 1 -->
    <table>
        <thead>
            <tr>
                <th style="background-color: #002060; color: white;">(ARTA) DIMENSIONS</th>
                <th style="background-color: #002060; color: white;">CSF SCORE</th>
            </tr>
        </thead>
        <tbody>
            <tr class="left-align">
                <td>RELIABILITY</td>
                <td class="placeholder"><?= $realibility ?></td>
            </tr>
            <tr class="left-align">
                <td>RESPONSIVENESS</td>
                <td class="placeholder"><?= $responsiveness ?></td>
            </tr>
            <tr class="left-align">
                <td>INTEGRITY</td>
                <td class="placeholder"><?= $integrity ?></td>
            </tr>
            <tr class="left-align">
                <td>COMMUNICATION</td>
                <td class="placeholder"><?= $communication ?></td>
            </tr>
            <tr class="left-align">
                <td>ASSURANCE</td>
                <td class="placeholder"><?= $assurance ?></td>
            </tr>
            <tr class="left-align">
                <td>OUTCOME</td>
                <td class="placeholder"><?= $outcome ?></td>
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
</div>

<div class="container">
    <!-- Table 1 -->
    <table>
        <thead>
            <tr>
                <th style="background-color: #002060; color: white;">(ARTA) DIMENSIONS</th>
                <th style="background-color: #002060; color: white;">% SATISFACTION</th>
            </tr>
        </thead>
        <tbody>
            <tr class="left-align">
                <td>RELIABILITY</td>
                <td class="placeholder"><?= $realibility_satisfaction ?>%</td>
            </tr>
            <tr class="left-align">
                <td>RESPONSIVENESS</td>
                <td class="placeholder"><?= $responsiveness_satisfaction ?>%</td>
            </tr>
            <tr class="left-align">
                <td>INTEGRITY</td>
                <td class="placeholder"><?= $integrity_satisfaction ?>%</td>
            </tr>
            <tr class="left-align">
                <td>COMMUNICATION</td>
                <td class="placeholder"><?= $communication_satisfaction ?>%</td>
            </tr>
            <tr class="left-align">
                <td>ASSURANCE</td>
                <td class="placeholder"><?= $assurance_satisfaction ?>%</td>
            </tr>
            <tr class="left-align">
                <td style="background-color: #002060; color: white;">OUTCOME</td>
                <td class="placeholder" style="background-color: #002060; color: white;"><?= $outcome_satisfaction ?>%</td>
            </tr>
            <tr class="left-align">
                <td style="background-color: #974806; color: white;">OVERALL AVE</td>
                <td class="placeholder" style="background-color: #974806; color: white;"><?= $overall_ave_satisfaction ?>%</td>
            </tr>
            <tr class="left-align">
                <td style="background-color: #002060; color: white;">ADJECTIVAL RATING</td>
                <td class="placeholder" style="background-color: #002060; color: white;"><?= adjectival_rating($overall_ave_satisfaction) ?></td>
            </tr>
        </tbody>
    </table>

    <!-- Table 2 -->
    <table>
        <thead>
            <tr>
                <th style="background-color: #002060; color: white;">(ARTA) OVERALL SATISFACTION</th>
                <th style="background-color: #002060; color: white;">% DISTRIBUTION</th>
            </tr>
        </thead>
        <tbody>
            <tr class="left-allign">
                <td>Very Satisfied (VS)</td>
                <td class="placeholder"><?= $overall_satisfaction_calculation['overall_very_satisfy_result'] ?>%</td>
            </tr>
            <tr class="left-allign">
                <td>Satisfied (S)</td>
                <td class="placeholder"><?= $overall_satisfaction_calculation['overall_satisfy_result'] ?>%</td>
            </tr>
            <tr class="left-allign">
                <td>Dissatisfied (D)</td>
                <td class="placeholder"><?= $overall_satisfaction_calculation['overall_dissatisfy_result'] ?>%</td>
            </tr>
            <tr class="left-allign">
                <td>Very Dissatisfied (VD)</td>
                <td class="placeholder"><?= $overall_satisfaction_calculation['overall_very_dissatisfy_result'] ?>%</td>
            </tr>
            <tr class="left-align">
                <td style="background-color: #002060; color: white;">TOTAL</td>
                <td class="placeholder" style="background-color: #002060; color: white;"><?= $total_overall_satisfaction ?>%</td>
            </tr>
            <tr class="left-align">
                <td style="background-color: #974806; color: white;">SATISFACTION LEVEL (VS + S)</td>
                <td class="placeholder" style="background-color: #974806; color: white;"><?= $satisfaction_level ?>%</td>
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
                <th style="background-color: #002060; color: white;"    >% DISTR</th>
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
                <td style="background-color: #17365D; color: white;">Satisfied</td>
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
            width: 70%;
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
            width: 34%; /* Adjust width of each table */
            margin: 0; /* Reset margin to avoid extra spacing */
        }
        .dti-staff-col {
            width: 15%; /* Adjusted width for DTI STAFF columns */
        }
        .service-requested-col {
            width: 20%; /* Adjusted width for Result of Service/s Requested column */
        }
        .quality-service-col {
            width: 15%; /* Adjusted width for QUALITY SERVICE columns 'a' and 'b' */
        }
    </style>
