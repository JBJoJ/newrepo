<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var frontend\models\ItServices $model */
/** @var frontend\models\ItServices $count */
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
<body>

<h2>Tabulation Sheet Summary</h2>

<!-- First Table: Tabulation Sheet Summary -->
<table>
    <thead>
        <tr>
            <th colspan="2" style="background-color: #002060; color: white;">Proposed Formula</th>
            <th style="background-color: #FFC000; color: white;">RESPONSIVENESS</th>
            <th style="background-color: #FFC000; color: white;">ASSURANCE</th>
            <th style="background-color: #FFC000; color: white;">INTEGRITY</th>
            <th style="background-color: #FFC000; color: white;">RELIABILITY</th>
            <th style="background-color: #FFC000; color: white;">OUTCOME</th>
            <th style="background-color: #FFC000; color: white;">ACCESS AND FACILITIES</th>
            <th style="background-color: #FFC000; color: white;">COMMS.</th>
            <th>OVERALL PMT</th>
        </tr>
        <tr>
            <th>Weights</th>
            <th>Level of Satisfaction</th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <!-- Placeholder rows for Proposed Formula -->
        <tr>
            <td>4</td>
            <td>Very Satisfied</td>
            <?php foreach ($very_satisfy as $result): ?>
                <td><?= $result['very_satisfy_rai'] ?></td>
                <td><?= $result['very_satisfy_rai'] ?></td>
                <td><?= $result['very_satisfy_rai'] ?></td>
                <td><?= $result['very_satisfy_ro'] ?></td>
                <td><?= $result['very_satisfy_ro'] ?></td>
                <td><?= $result['very_satisfy_af'] ?></td>
                <td><?= $result['very_satisfy_com'] ?></td>
            <?php endforeach; ?>
            <td><?= $percentage_very_satisfy ?>%</td>
        </tr>
        <!-- Add more rows as needed -->
        <tr>
            <td>3</td>
            <td>Satisfied</td>
            <?php foreach ($satisfy as $result): ?>
                <td><?= $result['satisfy_rai'] ?></td>
                <td><?= $result['satisfy_rai'] ?></td>
                <td><?= $result['satisfy_rai'] ?></td>
                <td><?= $result['satisfy_ro'] ?></td>
                <td><?= $result['satisfy_ro'] ?></td>
                <td><?= $result['satisfy_af'] ?></td>
                <td><?= $result['satisfy_com'] ?></td>
            <?php endforeach; ?>
            <td><?= $percentage_satisfy ?>%</td>
        </tr>
        <tr>
            <td>2</td>
            <td>Dissatisfied</td>
            <?php foreach ($dissatisfy as $result): ?>
                <td><?= $result['dissatisfy_rai'] ?></td>
                <td><?= $result['dissatisfy_rai'] ?></td>
                <td><?= $result['dissatisfy_rai'] ?></td>
                <td><?= $result['dissatisfy_ro'] ?></td>
                <td><?= $result['dissatisfy_ro'] ?></td>
                <td><?= $result['dissatisfy_af'] ?></td>
                <td><?= $result['dissatisfy_com'] ?></td>
            <?php endforeach; ?>
            <td><?= $percentage_dissatisfy ?>%</td>
        </tr>
        <tr>
            <td>1</td>
            <td>Very Dissatisfied</td>
            <?php foreach ($very_dissatisfy as $result): ?>
                <td><?= $result['very_dissatisfy_rai'] ?></td>
                <td><?= $result['very_dissatisfy_rai'] ?></td>
                <td><?= $result['very_dissatisfy_rai'] ?></td>
                <td><?= $result['very_dissatisfy_ro'] ?></td>
                <td><?= $result['very_dissatisfy_ro'] ?></td>
                <td><?= $result['very_dissatisfy_af'] ?></td>
                <td><?= $result['very_dissatisfy_com'] ?></td>
            <?php endforeach; ?>
            <td><?= $percentage_very_dissatisfy ?>%</td>
        </tr>
    <tr>
        <td></td>
        <td>No Responses (888)</td>
        <?php foreach ($no_response as $result): ?>
            <td><?= $result['no_response_rai'] ?></td>
            <td><?= $result['no_response_rai'] ?></td>
            <td><?= $result['no_response_rai'] ?></td>
            <td><?= $result['no_response_ro'] ?></td>
            <td><?= $result['no_response_ro'] ?></td>
            <td><?= $result['no_response_af'] ?></td>
            <td><?= $result['no_response_com'] ?></td>
        <?php endforeach; ?>
        <td>---</td>
    </tr>
    <tr>
        <td></td>
        <td>For Validation (999)</td>
        <?php foreach ($for_validation as $result): ?>
            <td><?= $result['for_validation_rai'] ?></td>
            <td><?= $result['for_validation_rai'] ?></td>
            <td><?= $result['for_validation_rai'] ?></td>
            <td><?= $result['for_validation_ro'] ?></td>
            <td><?= $result['for_validation_ro'] ?></td>
            <td><?= $result['for_validation_af'] ?></td>
            <td><?= $result['for_validation_com'] ?></td>
        <?php endforeach; ?>
        <td>---</td>
    </tr>

    <tr class="total-responses">
        <td></td>
        <td>TOTAL RESPONSES</td>
        <?php for ($i = 0; $i < 7; $i++): ?>
            <td style="background-color: #B6DDE8; color: black;"><?= $total_count ?></td>
        <?php endfor; ?>
        <td></td>
    </tr>

    <tr class="percent-satisfaction">
        <td></td>
        <td>% SATISFACTION</td>
        <td style="background-color: #B6DDE8; color: black;"><?= $satisfaction['rai'] ?>%</td>
        <td style="background-color: #B6DDE8; color: black;"><?= $satisfaction['rai'] ?>%</td>
        <td style="background-color: #B6DDE8; color: black;"><?= $satisfaction['rai'] ?>%</td>
        <td style="background-color: #B6DDE8; color: black;"><?= $satisfaction['ro'] ?>%</td>
        <td style="background-color: #B6DDE8; color: black;"><?= $satisfaction['ro'] ?>%</td>
        <td style="background-color: #B6DDE8; color: black;"><?= $satisfaction['af'] ?>%</td>
        <td style="background-color: #B6DDE8; color: black;"><?= $satisfaction['com'] ?>%</td>
        <td>---</td>
    </tr>
    <tr class="csf-score">
            <td></td>
            <td>CSF SCORE</td>
            <td style="background-color: #B6DDE8; color: black;"><?= $score['rai'] ?></td>
            <td style="background-color: #B6DDE8; color: black;"><?= $score['rai'] ?></td>
            <td style="background-color: #B6DDE8; color: black;"><?= $score['rai'] ?></td>
            <td style="background-color: #B6DDE8; color: black;"><?= $score['ro'] ?></td>
            <td style="background-color: #B6DDE8; color: black;"><?= $score['ro'] ?></td>
            <td style="background-color: #B6DDE8; color: black;"><?= $score['af'] ?></td>
            <td style="background-color: #B6DDE8; color: black;"><?= $score['com'] ?></td>
            <td></td>
        </tr>

    <tr class="csf-rating">
        <td></td>
        <td>CSF RATING</td>
        <td style="background-color: #B6DDE8; color: black;"><?= $ratings['rai'] ?>%</td>
        <td style="background-color: #B6DDE8; color: black;"><?= $ratings['rai'] ?>%</td>
        <td style="background-color: #B6DDE8; color: black;"><?= $ratings['rai'] ?>%</td>
        <td style="background-color: #B6DDE8; color: black;"><?= $ratings['ro'] ?>%</td>
        <td style="background-color: #B6DDE8; color: black;"><?= $ratings['ro'] ?>%</td>
        <td style="background-color: #B6DDE8; color: black;"><?= $ratings['af'] ?>%</td>
        <td style="background-color: #B6DDE8; color: black;"><?= $ratings['com'] ?>%</td>
        <td>---</td>
    </tr>
    <tr class="level-satisfaction">
        <td></td>
        <td>Level of Satisfaction</td>
        <td style="background-color: #B6DDE8; color: black;"><?= satisfaction($ratings['rai']) ?></td>
        <td style="background-color: #B6DDE8; color: black;"><?= satisfaction($ratings['rai']) ?></td>
        <td style="background-color: #B6DDE8; color: black;"><?= satisfaction($ratings['rai']) ?></td>
        <td style="background-color: #B6DDE8; color: black;"><?= satisfaction($ratings['ro']) ?></td>
        <td style="background-color: #B6DDE8; color: black;"><?= satisfaction($ratings['ro']) ?></td>
        <td style="background-color: #B6DDE8; color: black;"><?= satisfaction($ratings['af']) ?></td>
        <td style="background-color: #B6DDE8; color: black;"><?= satisfaction($ratings['com']) ?></td>
        <td>---</td>
    </tr>
</tbody>
</table>

        <!-- Container for three (ARTA) QUALITY DIMENSIONS tables -->
<div class="container">
    <!-- Table 1 -->
    <table>
        <thead>
            <tr>
                <th colspan="3" style="background-color: #002060; color: white;">SQD (OVERALL SCORE)</th>
            </tr>
            <tr>
                <th style="background-color: #002060; color: white;">DIMENSIONS</th>
                <th style="background-color: #002060; color: white;">CSF SCORE</th>
            </tr>
        </thead>
        <tbody>
            <tr class="left-align">
                <td>RESPONSIVENESS</td>
                <td class="placeholder"><?= $score['rai'] ?></td>
            </tr>
            <tr class="left-align">
                <td>ASSURANCE</td>
                <td class="placeholder"><?= $score['rai'] ?></td>
            </tr>
            <tr class="left-align">
                <td>INTEGRITY</td>
                <td class="placeholder"><?= $score['rai'] ?></td>
            </tr>
            <tr class="left-align">
                <td>RELIABILITY</td>
                <td class="placeholder"><?= $score['ro'] ?></td>
            </tr>
            <tr class="left-align">
                <td>OUTCOME</td>
                <td class="placeholder"><?= $score['ro'] ?></td>
            </tr>
            <tr class="left-align">
                <td>ACCESS TO FACILITIES</td>
                <td class="placeholder"><?= $score['af'] ?></td>
            </tr>
            <tr class="left-align">
                <td>COMMS.</td>
                <td class="placeholder"><?= $score['com'] ?></td>
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

    <table>
        <thead>
            <tr>
                <th style="background-color: #002060; color: white;">OVERALL SATISFACTION</th>
                <th style="background-color: #002060; color: white;">% DISTRIBUTION</th>
            </tr>
        </thead>
        <tbody>
            <tr class="left-align">
                <td style="color: black;">Very Satisfied (VS)</td>
                <td class="placeholder" style="color: black;"><?= $overall_satisfaction_calculation['overall_very_satisfy_result'] ?>%</td>
            </tr>
            <tr class="left-align">
                <td style="color: black;">Satisfied (S)</td>
                <td class="placeholder" style="color: black;"><?= $overall_satisfaction_calculation['overall_satisfy_result'] ?>%</td>
            </tr>
            <tr class="left-align">
                <td style="color: black;">Dissatisfied (D)</td>
                <td class="placeholder" style="color: black;"><?= $overall_satisfaction_calculation['overall_dissatisfy_result'] ?>%</td>
            </tr>
            <tr class="left-align">
                <td style="color: black;">Very Dissatisfied (VD)</td>
                <td class="placeholder" style="color: black;"><?= $overall_satisfaction_calculation['overall_very_dissatisfy_result'] ?>%</td>
            </tr>
            <tr class="left-align">
                <td style="background-color: #002060; color: white;">TOTAL RESPONSES</td>
                <td class="placeholder" style="background-color: #002060; color: white;"><?= $total_overall_satisfaction ?>%</td>
            </tr>
            <tr class="left-align">
                <td style="background-color: #974806; color: white;">Satisfaction Level (VS+ S)</td>
                <td class="placeholder" style="background-color: #974806; color: white;"><?= $satisfaction_level ?>%</td>
            </tr>
        </tbody>
    </table>

    <!-- Table 2 -->
    <table>
        <thead>
            <tr>
                <th colspan="3" style="background-color: #002060; color: white;">SQD (% SATISFACTION)</th>
            </tr>
            <tr>
                <th style="background-color: #002060; color: white;">(ARTA) QUALITY DIMENSIONS</th>
                <th style="background-color: #002060; color: white;">% SATISFACTION</th>
            </tr>
        </thead>
        <tbody>
            <tr class="left-align">
                <td>RESPONSIVENESS</td>
                <td class="placeholder"><?= $responsiveness ?>%</td>
            </tr>
            <tr class="left-align">
                <td>ASSURANCE</td>
                <td class="placeholder"><?= $assurance ?>%</td>
            </tr>
            <tr class="left-align">
                <td>INTEGRITY</td>
                <td class="placeholder"><?= $integrity ?>%</td>
            </tr>
            <tr class="left-align">
                <td>RELIABILITY</td>
                <td class="placeholder"><?= $realibility ?>%</td>
            </tr>
            <tr class="left-align">
                <td>OUTCOME</td>
                <td class="placeholder"><?= $outcome ?>%</td>
            </tr>
            <tr class="left-align">
                <td>ACCESS TO FACILITIES</td>
                <td class="placeholder"><?= $access_facilities ?>%</td>
            </tr>
            <tr class="left-align">
                <td>COMMS.</td>
                <td class="placeholder"><?= $comms ?>%</td>
            </tr>
            <tr class="left-align">
                <td style="background-color: #002060; color: white;">OVERALL AVE</td>
                <td class="placeholder" style="background-color: #002060; color: white;"><?= $sqd_satisfaction_overall ?>%</td>
            </tr>
            <tr class="left-align">
                <td style="background-color: #974806; color: white;">ADJECTIVAL RATING</td>
                <td class="placeholder" style="background-color: #974806; color: white;"><?= adjectival_rating($sqd_satisfaction_overall) ?></td>
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
                <td style="background-color: #FFC000; color: white;">Very Satisfied (VS)</td>
                <td class="placeholder" style="background-color: #FFC000; color: white;">---</td>
                <td class="placeholder" style="background-color: #FFC000; color: white;">---</td>
            </tr>
            <tr class="left-align">
                <td style="background-color: #0F243E; color: white;">Satisfied</td>
                <td class="placeholder" style="background-color: #0F243E; color: white;">---</td>
                <td class="placeholder" style="background-color: #0F243E; color: white;">---</td>
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
            width: 75%; /* Set width to 70% of the parent element (body) */
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
            margin-top: 0px; /* Add top margin for the container */
        }

        /* Style for additional tables (SEX DISAGGREGATE and INTERPRETATION) */
        .additional-container table {
            width: 23.5%; /* Adjust width of each table */
            margin: 0; /* Reset margin to avoid extra spacing */
        }
    </style>
