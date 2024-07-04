<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var frontend\models\TdOnline $model */
/** @var ActiveForm $form */

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

<!-- Wrap the table in a container div for scrolling -->
<div class="table-container">
    <table>
        <!-- Table header -->
        <thead>
            <tr>
                <th colspan="2" style="background-color: #002060; color: white;">Proposed Formula</th>
                <th colspan="5" style="background-color: #FFC000; color: white;">OBJECTIVES, CONTENT, AND DURATION</th>
                <th colspan="5" style="background-color: #FFC000; color: white;">METHODOLOGY</th>
                <th colspan="4" style="background-color: #FFC000; color: white;">RESOURCE SPEAKER 1</th>
                <th colspan="4" style="background-color: #FFC000; color: white;">RESOURCE SPEAKER 2</th>
                <th colspan="4" style="background-color: #FFC000; color: white;">RESOURCE SPEAKER 3</th>
                <th colspan="4" style="background-color: #FFC000; color: white;">TRAINING HOST/SECRETARIAT</th>
                <th colspan="3" style="background-color: #FFC000; color: white;">VIRTUAL PLATFORM</th>
                <th>OVERALL PMT</th>
            </tr>
            <tr>
                <!-- Add your table headers here -->
                <th style="width: 5%;">Weights</th>
                <th style="width: 10%;">Level of Satisfaction</th>
                <th style="width: 5%;">a</th>
                <th style="width: 5%;">b</th>
                <th style="width: 5%;">c</th>
                <th style="width: 5%;">d</th>
                <th style="width: 5%;">e</th>

                <th style="width: 5%;">a</th>
                <th style="width: 5%;">b</th>
                <th style="width: 5%;">c</th>
                <th style="width: 5%;">d</th>
                <th style="width: 5%;">e</th>

                <th style="width: 5%;">a</th>
                <th style="width: 5%;">b</th>
                <th style="width: 5%;">c</th>
                <th style="width: 5%;">d</th>

                <th style="width: 5%;">a</th>
                <th style="width: 5%;">b</th>
                <th style="width: 5%;">c</th>
                <th style="width: 5%;">d</th>

                <th style="width: 5%;">a</th>
                <th style="width: 5%;">b</th>
                <th style="width: 5%;">c</th>
                <th style="width: 5%;">d</th>

                <th style="width: 5%;">a</th>
                <th style="width: 5%;">b</th>
                <th style="width: 5%;">c</th>
                <th style="width: 5%;">d</th>

                <th style="width: 5%;">a</th>
                <th style="width: 5%;">b</th>
                <th style="width: 5%;">c</th>
                <th style="width: 5%;">%</th>
            </tr>
        </thead>
        <!-- Table body -->
        <tbody>
            <!-- Table rows -->
            <tr>
                <td>4</td>
                <td>Very Satisfied</td>
                <?php foreach ($very_satisfy as $result): ?>
                <td><?= $result['very_satisfy_ocd_a'] ?></td>
                <td><?= $result['very_satisfy_ocd_b'] ?></td>
                <td><?= $result['very_satisfy_ocd_c'] ?></td>
                <td><?= $result['very_satisfy_ocd_d'] ?></td>
                <td><?= $result['very_satisfy_ocd_e'] ?></td>
                <td><?= $result['very_satisfy_meth_a'] ?></td>
                <td><?= $result['very_satisfy_meth_b'] ?></td>
                <td><?= $result['very_satisfy_meth_c'] ?></td>
                <td><?= $result['very_satisfy_meth_d'] ?></td>
                <td><?= $result['very_satisfy_meth_e'] ?></td>
                <td><?= $result['very_satisfy_rs1_a'] ?></td>
                <td><?= $result['very_satisfy_rs1_b'] ?></td>
                <td><?= $result['very_satisfy_rs1_c'] ?></td>
                <td><?= $result['very_satisfy_rs1_d'] ?></td>
                <td><?= $result['very_satisfy_rs2_a'] ?></td>
                <td><?= $result['very_satisfy_rs2_b'] ?></td>
                <td><?= $result['very_satisfy_rs2_c'] ?></td>
                <td><?= $result['very_satisfy_rs2_d'] ?></td>
                <td><?= $result['very_satisfy_rs3_a'] ?></td>
                <td><?= $result['very_satisfy_rs3_b'] ?></td>
                <td><?= $result['very_satisfy_rs3_c'] ?></td>
                <td><?= $result['very_satisfy_rs3_d'] ?></td>
                <td><?= $result['very_satisfy_trn_host_a'] ?></td>
                <td><?= $result['very_satisfy_trn_host_b'] ?></td>
                <td><?= $result['very_satisfy_trn_host_c'] ?></td>
                <td><?= $result['very_satisfy_trn_host_d'] ?></td>
                <td><?= $result['very_satisfy_vp_a'] ?></td>
                <td><?= $result['very_satisfy_vp_b'] ?></td>
                <td><?= $result['very_satisfy_vp_c'] ?></td>
                <?php endforeach; ?>
                <td><?= $percentage_very_satisfy ?>%</td>
            </tr>

            <tr>
                <td>3</td>
                <td>Satisfied</td>
                <?php foreach ($satisfy as $result): ?>
                <td><?= $result['satisfy_ocd_a'] ?></td>
                <td><?= $result['satisfy_ocd_b'] ?></td>
                <td><?= $result['satisfy_ocd_c'] ?></td>
                <td><?= $result['satisfy_ocd_d'] ?></td>
                <td><?= $result['satisfy_ocd_e'] ?></td>
                <td><?= $result['satisfy_meth_a'] ?></td>
                <td><?= $result['satisfy_meth_b'] ?></td>
                <td><?= $result['satisfy_meth_c'] ?></td>
                <td><?= $result['satisfy_meth_d'] ?></td>
                <td><?= $result['satisfy_meth_e'] ?></td>
                <td><?= $result['satisfy_rs1_a'] ?></td>
                <td><?= $result['satisfy_rs1_b'] ?></td>
                <td><?= $result['satisfy_rs1_c'] ?></td>
                <td><?= $result['satisfy_rs1_d'] ?></td>
                <td><?= $result['satisfy_rs2_a'] ?></td>
                <td><?= $result['satisfy_rs2_b'] ?></td>
                <td><?= $result['satisfy_rs2_c'] ?></td>
                <td><?= $result['satisfy_rs2_d'] ?></td>
                <td><?= $result['satisfy_rs3_a'] ?></td>
                <td><?= $result['satisfy_rs3_b'] ?></td>
                <td><?= $result['satisfy_rs3_c'] ?></td>
                <td><?= $result['satisfy_rs3_d'] ?></td>
                <td><?= $result['satisfy_trn_host_a'] ?></td>
                <td><?= $result['satisfy_trn_host_b'] ?></td>
                <td><?= $result['satisfy_trn_host_c'] ?></td>
                <td><?= $result['satisfy_trn_host_d'] ?></td>
                <td><?= $result['satisfy_vp_a'] ?></td>
                <td><?= $result['satisfy_vp_b'] ?></td>
                <td><?= $result['satisfy_vp_c'] ?></td>
                <?php endforeach; ?>
                <td><?= $percentage_satisfy ?>%</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Dissatisfied</td>
                <?php foreach ($dissatisfy as $result): ?>
                <td><?= $result['dissatisfy_ocd_a'] ?></td>
                <td><?= $result['dissatisfy_ocd_b'] ?></td>
                <td><?= $result['dissatisfy_ocd_c'] ?></td>
                <td><?= $result['dissatisfy_ocd_d'] ?></td>
                <td><?= $result['dissatisfy_ocd_e'] ?></td>
                <td><?= $result['dissatisfy_meth_a'] ?></td>
                <td><?= $result['dissatisfy_meth_b'] ?></td>
                <td><?= $result['dissatisfy_meth_c'] ?></td>
                <td><?= $result['dissatisfy_meth_d'] ?></td>
                <td><?= $result['dissatisfy_meth_e'] ?></td>
                <td><?= $result['dissatisfy_rs1_a'] ?></td>
                <td><?= $result['dissatisfy_rs1_b'] ?></td>
                <td><?= $result['dissatisfy_rs1_c'] ?></td>
                <td><?= $result['dissatisfy_rs1_d'] ?></td>
                <td><?= $result['dissatisfy_rs2_a'] ?></td>
                <td><?= $result['dissatisfy_rs2_b'] ?></td>
                <td><?= $result['dissatisfy_rs2_c'] ?></td>
                <td><?= $result['dissatisfy_rs2_d'] ?></td>
                <td><?= $result['dissatisfy_rs3_a'] ?></td>
                <td><?= $result['dissatisfy_rs3_b'] ?></td>
                <td><?= $result['dissatisfy_rs3_c'] ?></td>
                <td><?= $result['dissatisfy_rs3_d'] ?></td>
                <td><?= $result['dissatisfy_trn_host_a'] ?></td>
                <td><?= $result['dissatisfy_trn_host_b'] ?></td>
                <td><?= $result['dissatisfy_trn_host_c'] ?></td>
                <td><?= $result['dissatisfy_trn_host_d'] ?></td>
                <td><?= $result['dissatisfy_vp_a'] ?></td>
                <td><?= $result['dissatisfy_vp_b'] ?></td>
                <td><?= $result['dissatisfy_vp_c'] ?></td>
                <?php endforeach; ?>
                <td><?= $percentage_dissatisfy ?>%</td>
            </tr>
            <tr>
                <td>1</td>
                <td>Very Dissatisfied</td>
                <?php foreach ($very_dissatisfy as $result): ?>
                <td><?= $result['very_dissatisfy_ocd_a'] ?></td>
                <td><?= $result['very_dissatisfy_ocd_b'] ?></td>
                <td><?= $result['very_dissatisfy_ocd_c'] ?></td>
                <td><?= $result['very_dissatisfy_ocd_d'] ?></td>
                <td><?= $result['very_dissatisfy_ocd_e'] ?></td>
                <td><?= $result['very_dissatisfy_meth_a'] ?></td>
                <td><?= $result['very_dissatisfy_meth_b'] ?></td>
                <td><?= $result['very_dissatisfy_meth_c'] ?></td>
                <td><?= $result['very_dissatisfy_meth_d'] ?></td>
                <td><?= $result['very_dissatisfy_meth_e'] ?></td>
                <td><?= $result['very_dissatisfy_rs1_a'] ?></td>
                <td><?= $result['very_dissatisfy_rs1_b'] ?></td>
                <td><?= $result['very_dissatisfy_rs1_c'] ?></td>
                <td><?= $result['very_dissatisfy_rs1_d'] ?></td>
                <td><?= $result['very_dissatisfy_rs2_a'] ?></td>
                <td><?= $result['very_dissatisfy_rs2_b'] ?></td>
                <td><?= $result['very_dissatisfy_rs2_c'] ?></td>
                <td><?= $result['very_dissatisfy_rs2_d'] ?></td>
                <td><?= $result['very_dissatisfy_rs3_a'] ?></td>
                <td><?= $result['very_dissatisfy_rs3_b'] ?></td>
                <td><?= $result['very_dissatisfy_rs3_c'] ?></td>
                <td><?= $result['very_dissatisfy_rs3_d'] ?></td>
                <td><?= $result['very_dissatisfy_trn_host_a'] ?></td>
                <td><?= $result['very_dissatisfy_trn_host_b'] ?></td>
                <td><?= $result['very_dissatisfy_trn_host_c'] ?></td>
                <td><?= $result['very_dissatisfy_trn_host_d'] ?></td>
                <td><?= $result['very_dissatisfy_vp_a'] ?></td>
                <td><?= $result['very_dissatisfy_vp_b'] ?></td>
                <td><?= $result['very_dissatisfy_vp_c'] ?></td>
                <?php endforeach; ?>
                <td><?= $percentage_very_dissatisfy ?>%</td>
            </tr>
            <tr>
                <td></td>
                <td>No Responses (888)</td>
                <?php foreach ($no_response as $result): ?>
                <td><?= $result['no_response_ocd_a'] ?></td>
                <td><?= $result['no_response_ocd_b'] ?></td>
                <td><?= $result['no_response_ocd_c'] ?></td>
                <td><?= $result['no_response_ocd_d'] ?></td>
                <td><?= $result['no_response_ocd_e'] ?></td>
                <td><?= $result['no_response_meth_a'] ?></td>
                <td><?= $result['no_response_meth_b'] ?></td>
                <td><?= $result['no_response_meth_c'] ?></td>
                <td><?= $result['no_response_meth_d'] ?></td>
                <td><?= $result['no_response_meth_e'] ?></td>
                <td><?= $result['no_response_rs1_a'] ?></td>
                <td><?= $result['no_response_rs1_b'] ?></td>
                <td><?= $result['no_response_rs1_c'] ?></td>
                <td><?= $result['no_response_rs1_d'] ?></td>
                <td><?= $result['no_response_rs2_a'] ?></td>
                <td><?= $result['no_response_rs2_b'] ?></td>
                <td><?= $result['no_response_rs2_c'] ?></td>
                <td><?= $result['no_response_rs2_d'] ?></td>
                <td><?= $result['no_response_rs3_a'] ?></td>
                <td><?= $result['no_response_rs3_b'] ?></td>
                <td><?= $result['no_response_rs3_c'] ?></td>
                <td><?= $result['no_response_rs3_d'] ?></td>
                <td><?= $result['no_response_trn_host_a'] ?></td>
                <td><?= $result['no_response_trn_host_b'] ?></td>
                <td><?= $result['no_response_trn_host_c'] ?></td>
                <td><?= $result['no_response_trn_host_d'] ?></td>
                <td><?= $result['no_response_vp_a'] ?></td>
                <td><?= $result['no_response_vp_b'] ?></td>
                <td><?= $result['no_response_vp_c'] ?></td>
                <?php endforeach; ?>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td>For Validation (999)</td>
                <?php foreach ($for_validation as $result): ?>
                <td><?= $result['for_validation_ocd_a'] ?></td>
                <td><?= $result['for_validation_ocd_b'] ?></td>
                <td><?= $result['for_validation_ocd_c'] ?></td>
                <td><?= $result['for_validation_ocd_d'] ?></td>
                <td><?= $result['for_validation_ocd_e'] ?></td>
                <td><?= $result['for_validation_meth_a'] ?></td>
                <td><?= $result['for_validation_meth_b'] ?></td>
                <td><?= $result['for_validation_meth_c'] ?></td>
                <td><?= $result['for_validation_meth_d'] ?></td>
                <td><?= $result['for_validation_meth_e'] ?></td>
                <td><?= $result['for_validation_rs1_a'] ?></td>
                <td><?= $result['for_validation_rs1_b'] ?></td>
                <td><?= $result['for_validation_rs1_c'] ?></td>
                <td><?= $result['for_validation_rs1_d'] ?></td>
                <td><?= $result['for_validation_rs2_a'] ?></td>
                <td><?= $result['for_validation_rs2_b'] ?></td>
                <td><?= $result['for_validation_rs2_c'] ?></td>
                <td><?= $result['for_validation_rs2_d'] ?></td>
                <td><?= $result['for_validation_rs3_a'] ?></td>
                <td><?= $result['for_validation_rs3_b'] ?></td>
                <td><?= $result['for_validation_rs3_c'] ?></td>
                <td><?= $result['for_validation_rs3_d'] ?></td>
                <td><?= $result['for_validation_trn_host_a'] ?></td>
                <td><?= $result['for_validation_trn_host_b'] ?></td>
                <td><?= $result['for_validation_trn_host_c'] ?></td>
                <td><?= $result['for_validation_trn_host_d'] ?></td>
                <td><?= $result['for_validation_vp_a'] ?></td>
                <td><?= $result['for_validation_vp_b'] ?></td>
                <td><?= $result['for_validation_vp_c'] ?></td>
                <?php endforeach; ?>
                <td></td>
            </tr>

            <tr class="total-responses">
                <td></td>
                <td>TOTAL RESPONSES</td>
                <?php for ($i = 0; $i < 29; $i++): ?>
                    <td style="background-color: #B6DDE8; color: black;"><?= $total_count ?></td>
                <?php endfor; ?>
                <td></td>
            </tr>

            <tr class="percent-satisfaction">
                <td></td>
                <td>% SATISFACTION</td>
                <td style="background-color: #B6DDE8; color: black;"><?= $satisfaction['ocd_a'] ?>%</td>
                <td style="background-color: #B6DDE8; color: black;"><?= $satisfaction['ocd_b'] ?>%</td>
                <td style="background-color: #B6DDE8; color: black;"><?= $satisfaction['ocd_c'] ?>%</td>
                <td style="background-color: #B6DDE8; color: black;"><?= $satisfaction['ocd_d'] ?>%</td>
                <td style="background-color: #B6DDE8; color: black;"><?= $satisfaction['ocd_e'] ?>%</td>
                <td style="background-color: #B6DDE8; color: black;"><?= $satisfaction['meth_a'] ?>%</td>
                <td style="background-color: #B6DDE8; color: black;"><?= $satisfaction['meth_b'] ?>%</td>
                <td style="background-color: #B6DDE8; color: black;"><?= $satisfaction['meth_c'] ?>%</td>
                <td style="background-color: #B6DDE8; color: black;"><?= $satisfaction['meth_d'] ?>%</td>
                <td style="background-color: #B6DDE8; color: black;"><?= $satisfaction['meth_e'] ?>%</td>
                <td style="background-color: #B6DDE8; color: black;"><?= $satisfaction['rs1_a'] ?>%</td>
                <td style="background-color: #B6DDE8; color: black;"><?= $satisfaction['rs1_b'] ?>%</td>
                <td style="background-color: #B6DDE8; color: black;"><?= $satisfaction['rs1_c'] ?>%</td>
                <td style="background-color: #B6DDE8; color: black;"><?= $satisfaction['rs1_d'] ?>%</td>
                <td style="background-color: #B6DDE8; color: black;"><?= $satisfaction['rs2_a'] ?>%</td>
                <td style="background-color: #B6DDE8; color: black;"><?= $satisfaction['rs2_b'] ?>%</td>
                <td style="background-color: #B6DDE8; color: black;"><?= $satisfaction['rs2_c'] ?>%</td>
                <td style="background-color: #B6DDE8; color: black;"><?= $satisfaction['rs2_d'] ?>%</td>
                <td style="background-color: #B6DDE8; color: black;"><?= $satisfaction['rs3_a'] ?>%</td>
                <td style="background-color: #B6DDE8; color: black;"><?= $satisfaction['rs3_b'] ?>%</td>
                <td style="background-color: #B6DDE8; color: black;"><?= $satisfaction['rs3_c'] ?>%</td>
                <td style="background-color: #B6DDE8; color: black;"><?= $satisfaction['rs3_d'] ?>%</td>
                <td style="background-color: #B6DDE8; color: black;"><?= $satisfaction['trn_host_a'] ?>%</td>
                <td style="background-color: #B6DDE8; color: black;"><?= $satisfaction['trn_host_b'] ?>%</td>
                <td style="background-color: #B6DDE8; color: black;"><?= $satisfaction['trn_host_c'] ?>%</td>
                <td style="background-color: #B6DDE8; color: black;"><?= $satisfaction['trn_host_d'] ?>%</td>
                <td style="background-color: #B6DDE8; color: black;"><?= $satisfaction['vp_a'] ?>%</td>
                <td style="background-color: #B6DDE8; color: black;"><?= $satisfaction['vp_b'] ?>%</td>
                <td style="background-color: #B6DDE8; color: black;"><?= $satisfaction['vp_c'] ?>%</td>
                <td></td>
            </tr>
            <tr class="csf-score">
                <td></td>
                <td>CSF SCORE</td>
                <td style="background-color: #B6DDE8; color: black;"><?= $score['ocd_a'] ?></td>
                <td style="background-color: #B6DDE8; color: black;"><?= $score['ocd_b'] ?></td>
                <td style="background-color: #B6DDE8; color: black;"><?= $score['ocd_c'] ?></td>
                <td style="background-color: #B6DDE8; color: black;"><?= $score['ocd_d'] ?></td>
                <td style="background-color: #B6DDE8; color: black;"><?= $score['ocd_e'] ?></td>
                <td style="background-color: #B6DDE8; color: black;"><?= $score['meth_a'] ?></td>
                <td style="background-color: #B6DDE8; color: black;"><?= $score['meth_b'] ?></td>
                <td style="background-color: #B6DDE8; color: black;"><?= $score['meth_c'] ?></td>
                <td style="background-color: #B6DDE8; color: black;"><?= $score['meth_d'] ?></td>
                <td style="background-color: #B6DDE8; color: black;"><?= $score['meth_e'] ?></td>
                <td style="background-color: #B6DDE8; color: black;"><?= $score['rs1_a'] ?></td>
                <td style="background-color: #B6DDE8; color: black;"><?= $score['rs1_b'] ?></td>
                <td style="background-color: #B6DDE8; color: black;"><?= $score['rs1_c'] ?></td>
                <td style="background-color: #B6DDE8; color: black;"><?= $score['rs1_d'] ?></td>
                <td style="background-color: #B6DDE8; color: black;"><?= $score['rs2_a'] ?></td>
                <td style="background-color: #B6DDE8; color: black;"><?= $score['rs2_b'] ?></td>
                <td style="background-color: #B6DDE8; color: black;"><?= $score['rs2_c'] ?></td>
                <td style="background-color: #B6DDE8; color: black;"><?= $score['rs2_d'] ?></td>
                <td style="background-color: #B6DDE8; color: black;"><?= $score['rs3_a'] ?></td>
                <td style="background-color: #B6DDE8; color: black;"><?= $score['rs3_b'] ?></td>
                <td style="background-color: #B6DDE8; color: black;"><?= $score['rs3_c'] ?></td>
                <td style="background-color: #B6DDE8; color: black;"><?= $score['rs3_d'] ?></td>
                <td style="background-color: #B6DDE8; color: black;"><?= $score['trn_host_a'] ?></td>
                <td style="background-color: #B6DDE8; color: black;"><?= $score['trn_host_b'] ?></td>
                <td style="background-color: #B6DDE8; color: black;"><?= $score['trn_host_c'] ?></td>
                <td style="background-color: #B6DDE8; color: black;"><?= $score['trn_host_d'] ?></td>
                <td style="background-color: #B6DDE8; color: black;"><?= $score['vp_a'] ?>%</td>
                <td style="background-color: #B6DDE8; color: black;"><?= $score['vp_b'] ?>%</td>
                <td style="background-color: #B6DDE8; color: black;"><?= $score['vp_c'] ?>%</td>
                <td></td>
            </tr>
            <tr class="csf-rating">
                <td></td>
                <td>CSF RATING</td>
                <td style="background-color: #B6DDE8; color: black;"><?= $ratings['ocd_a'] ?>%</td>
                <td style="background-color: #B6DDE8; color: black;"><?= $ratings['ocd_b'] ?>%</td>
                <td style="background-color: #B6DDE8; color: black;"><?= $ratings['ocd_c'] ?>%</td>
                <td style="background-color: #B6DDE8; color: black;"><?= $ratings['ocd_d'] ?>%</td>
                <td style="background-color: #B6DDE8; color: black;"><?= $ratings['ocd_e'] ?>%</td>
                <td style="background-color: #B6DDE8; color: black;"><?= $ratings['meth_a'] ?>%</td>
                <td style="background-color: #B6DDE8; color: black;"><?= $ratings['meth_b'] ?>%</td>
                <td style="background-color: #B6DDE8; color: black;"><?= $ratings['meth_c'] ?>%</td>
                <td style="background-color: #B6DDE8; color: black;"><?= $ratings['meth_d'] ?>%</td>
                <td style="background-color: #B6DDE8; color: black;"><?= $ratings['meth_e'] ?>%</td>
                <td style="background-color: #B6DDE8; color: black;"><?= $ratings['rs1_a'] ?>%</td>
                <td style="background-color: #B6DDE8; color: black;"><?= $ratings['rs1_b'] ?>%</td>
                <td style="background-color: #B6DDE8; color: black;"><?= $ratings['rs1_c'] ?>%</td>
                <td style="background-color: #B6DDE8; color: black;"><?= $ratings['rs1_d'] ?>%</td>
                <td style="background-color: #B6DDE8; color: black;"><?= $ratings['rs2_a'] ?>%</td>
                <td style="background-color: #B6DDE8; color: black;"><?= $ratings['rs2_b'] ?>%</td>
                <td style="background-color: #B6DDE8; color: black;"><?= $ratings['rs2_c'] ?>%</td>
                <td style="background-color: #B6DDE8; color: black;"><?= $ratings['rs2_d'] ?>%</td>
                <td style="background-color: #B6DDE8; color: black;"><?= $ratings['rs3_a'] ?>%</td>
                <td style="background-color: #B6DDE8; color: black;"><?= $ratings['rs3_b'] ?>%</td>
                <td style="background-color: #B6DDE8; color: black;"><?= $ratings['rs3_c'] ?>%</td>
                <td style="background-color: #B6DDE8; color: black;"><?= $ratings['rs3_d'] ?>%</td>
                <td style="background-color: #B6DDE8; color: black;"><?= $ratings['trn_host_a'] ?>%</td>
                <td style="background-color: #B6DDE8; color: black;"><?= $ratings['trn_host_b'] ?>%</td>
                <td style="background-color: #B6DDE8; color: black;"><?= $ratings['trn_host_c'] ?>%</td>
                <td style="background-color: #B6DDE8; color: black;"><?= $ratings['trn_host_d'] ?>%</td>
                <td style="background-color: #B6DDE8; color: black;"><?= $ratings['vp_a'] ?>%</td>
                <td style="background-color: #B6DDE8; color: black;"><?= $ratings['vp_b'] ?>%</td>
                <td style="background-color: #B6DDE8; color: black;"><?= $ratings['vp_c'] ?>%</td>
                <td></td>
            </tr>
            <tr class="level-satisfaction">
                <td></td>
                <td>Level of Satisfaction</td>
                <td style="background-color: #B6DDE8; color: black;"><?= satisfaction($ratings['ocd_a']) ?></td>
                <td style="background-color: #B6DDE8; color: black;"><?= satisfaction($ratings['ocd_b']) ?></td>
                <td style="background-color: #B6DDE8; color: black;"><?= satisfaction($ratings['ocd_c']) ?></td>
                <td style="background-color: #B6DDE8; color: black;"><?= satisfaction($ratings['ocd_d']) ?></td>
                <td style="background-color: #B6DDE8; color: black;"><?= satisfaction($ratings['ocd_e']) ?></td>
                <td style="background-color: #B6DDE8; color: black;"><?= satisfaction($ratings['meth_a']) ?></td>
                <td style="background-color: #B6DDE8; color: black;"><?= satisfaction($ratings['meth_b']) ?></td>
                <td style="background-color: #B6DDE8; color: black;"><?= satisfaction($ratings['meth_c']) ?></td>
                <td style="background-color: #B6DDE8; color: black;"><?= satisfaction($ratings['meth_d']) ?></td>
                <td style="background-color: #B6DDE8; color: black;"><?= satisfaction($ratings['meth_e']) ?></td>
                <td style="background-color: #B6DDE8; color: black;"><?= satisfaction($ratings['rs1_a']) ?></td>
                <td style="background-color: #B6DDE8; color: black;"><?= satisfaction($ratings['rs1_b']) ?></td>
                <td style="background-color: #B6DDE8; color: black;"><?= satisfaction($ratings['rs1_c']) ?></td>
                <td style="background-color: #B6DDE8; color: black;"><?= satisfaction($ratings['rs1_d']) ?></td>
                <td style="background-color: #B6DDE8; color: black;"><?= satisfaction($ratings['rs2_a']) ?></td>
                <td style="background-color: #B6DDE8; color: black;"><?= satisfaction($ratings['rs2_b']) ?></td>
                <td style="background-color: #B6DDE8; color: black;"><?= satisfaction($ratings['rs2_c']) ?></td>
                <td style="background-color: #B6DDE8; color: black;"><?= satisfaction($ratings['rs2_d']) ?></td>
                <td style="background-color: #B6DDE8; color: black;"><?= satisfaction($ratings['rs3_a']) ?></td>
                <td style="background-color: #B6DDE8; color: black;"><?= satisfaction($ratings['rs3_b']) ?></td>
                <td style="background-color: #B6DDE8; color: black;"><?= satisfaction($ratings['rs3_c']) ?></td>
                <td style="background-color: #B6DDE8; color: black;"><?= satisfaction($ratings['rs3_d']) ?></td>
                <td style="background-color: #B6DDE8; color: black;"><?= satisfaction($ratings['trn_host_a']) ?></td>
                <td style="background-color: #B6DDE8; color: black;"><?= satisfaction($ratings['trn_host_b']) ?></td>
                <td style="background-color: #B6DDE8; color: black;"><?= satisfaction($ratings['trn_host_c']) ?></td>
                <td style="background-color: #B6DDE8; color: black;"><?= satisfaction($ratings['trn_host_d']) ?></td>
                <td style="background-color: #B6DDE8; color: black;"><?= satisfaction($ratings['vp_a']) ?></td>
                <td style="background-color: #B6DDE8; color: black;"><?= satisfaction($ratings['vp_b']) ?></td>
                <td style="background-color: #B6DDE8; color: black;"><?= satisfaction($ratings['vp_c']) ?></td>
                <td></td>
            </tr>
        </tbody>
    </table>
</div>

<!-- Container for three (ARTA) QUALITY DIMENSIONS tables -->
<div class="container" style="margin-top: 40px;">
    <!-- Table 1 -->
    <table class="arta-table">
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
                <td>RELIABILITY</td>
                <td class="placeholder"><?= $realibility ?></td>
            </tr>
            <tr class="left-align">
                <td>OUTCOME</td>
                <td class="placeholder"><?= $outcome ?></td>
            </tr>
            <tr class="left-align">
                <td>COMMUNICATION.</td>
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
    <table class="arta-table">
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
                <td class="placeholder" style="background-color: #974806; color: white;"><?= adjectival_rating($responsiveness_satisfaction) ?></td>
            </tr>
        </tbody>
    </table>
</div>

<div class="container">
    <!-- Table 1 -->
    <table class="arta-table">
        <thead>
            <tr>
                <th style="background-color: #002060; color: white;">CRITERIA</th>
                <th style="background-color: #002060; color: white;">CSF SCORE</th>
            </tr>
        </thead>
        <tbody>
        <tr class="left-align">
                <td>OBJECTIVES, CONTENT, DURATION</td>
                <td class="placeholder"><?= $ocd_score ?></td>
            </tr>
            <tr class="left-align">
                <td>METHODOLOGY</td>
                <td class="placeholder"><?= $methodology_score ?></td>
            </tr>
            <tr class="left-align">
                <td>RESOURCE SPEAKER</td>
                <td class="placeholder"><?= $rs_score ?></td>
            </tr>
            <tr class="left-align">
                <td style="background-color: yellow; ">a) Resource Speaker 1</td>
                <td class="placeholder" style="background-color: yellow; "><?= $rs1_score ?></td>
            </tr>
            <tr class="left-align">
                <td style="background-color: yellow; ">b) Resource Speaker 2</td>
                <td class="placeholder" style="background-color: yellow; "><?= $rs2_score ?></td>
            </tr>
            <tr class="left-align">
                <td style="background-color: yellow; ">c) Resource Speaker 3</td>
                <td class="placeholder" style="background-color: yellow; "><?= $rs3_score ?></td>
            </tr>
            <tr class="left-align">
                <td>MODERATOR</td>
                <td class="placeholder"><?= $moderator_score ?></td>
            </tr>
            <tr class="left-align">
                <td>VIRTUAL PLATFORM</td>
                <td class="placeholder"><?= $vp_score ?></td>
            </tr>
            <tr class="left-align">
                <td style="background-color: #002060; color: white;">OVERALL AVE</td>
                <td class="placeholder" style="background-color: #002060; color: white;"><?= $overall_ave_score ?></td>
            </tr>
            <tr class="left-align">
                <td style="background-color: #974806; color: white;">OVERALL RATING</td>
                <td class="placeholder" style="background-color: #974806; color: white;"><?= $overall_ave_score_rating ?>%</td>
            </tr>
            <tr class="left-align">
                <td style="background-color: #002060; color: white;">OVERALL SATISFACTION</td>
                <td class="placeholder" style="background-color: #002060; color: white;"><?= satisfaction($overall_ave_score_rating) ?></td>
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

<!-- Container for additional tables (Sex Disaggregate and Interpretation) -->
<div class="additional-container" style="margin-top: 5px;">
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
            padding: 13px;
            text-align: center;
        }
        /* Container to enable horizontal scrolling */
        .table-container {
            width: 75%; /* Adjust container width as needed */
            border-collapse: collapse;
            margin: 0 auto;
            overflow-x: auto; /* Enable horizontal scrolling */
        }
        /* Set table width to 100% to occupy full container width */
        table {
            width: 75%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 12px; /* Increase padding for cells */
            text-align: center;
            font-size: 13px;
            white-space: nowrap; /* Prevent text wrapping */
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
            width: 75%; /* Set width to 80% of the parent element (body) */
            margin: 0 auto; /* Center-align the container */
            font-size: 13px;
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
            margin-top: 6px; /* Add top margin for the container */
        }
        
        /* Style for additional tables (SEX DISAGGREGATE and INTERPRETATION) */
        .additional-container table {
            width: 33%; /* Adjust width of each table */
            margin: 0; /* Reset margin to avoid extra spacing */
            margin-bottom: 45px;
        }

    </style>
