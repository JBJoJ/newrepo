<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\Rating;

/** @var yii\web\View $this */
/** @var frontend\models\FinancialClaim $model */
/** @var frontend\models\Comments $commentsmodel */
/** @var ActiveForm $form */

$this->title = Yii::t('app', 'Customer Satisfaction Feedback');
?>
<body>
    <?php $form = ActiveForm::begin() ?>

        <header style="text-align: center;">
            
            <?= Html::img('@web/image/ISO.png', ['class' => 'img', 'alt' => 'Company Logo', 'style' => 'float: left;']) ?>

            <div style=
            "display:inline-block;
            vertical-align: top;
            margin-top: 60px;
            text-align: center;
            margin-right: 100px;
            ">
                <p style="font-weight: bold; margin: 0; text-transform: uppercase;">
                    Department of Trade and Industry
                </p>
                <p style="font-weight: bold; margin: 0;">
                    DTI - <Bureau/Office> | DTI - Regional Office | DTI Provincial Office
                </p>
                <hr style="border-top: 1px solid black; width: 40vw; margin: 7px auto">
                <p style="font-weight: bold; margin: 0; text-transfomr: uppercase">Client Satisfaction Feedback Form</p>
                <p style="font-weight: bold; margin: 0;">Processing of Financial Claims - Head Office and Region (External)</p>
            </div>
        </header>

        <section>
            <p><strong>CONSENT:</strong> I hereby consent to the collection and processing by the DTI of my name, contact details, 
            and my feedback on its services for the purpose of monitoring, measuring, and analyzing customer feedback and of 
            improving DTI services. I shall notify the DTI in case of any changes in my personal information. This consent shall be valid, unless revoked or 
            withdrawn in writing subject to the applicable provisions of the <strong>Data Privacy Act of 2012</strong> or Republic Act no. 10173.</p>
        </section>

        <section>
            <h2>PART I. Our office is committed to continually improve our services to our external clients.</h2>
            <p>Please answer this Form for us to know your feedback on the different aspects of our activity. 
                Your feedback and impressions will help us in improving our future activities in order to better 
                serve our clients. Rest assured all information you will provide shall be treated with 
                strict confidentiality.
            </p>

            <div class="form">
                <table>
                    <tr>
                        <td colspan="7"><strong>For each criterion below, please check-mark the box under the column pertaining 
                            to your Rating. Mark ONE BOX ONLY for each row. For every DISSATISFIED or 
                            VERY DISSATISFIED rating you will give, please provide reason/s in PART II below.</strong>
                        </td>
                    </tr>
                    <tr>
                        <th>CRITERIA FOR RATING</th>
                        <th>VERY SATISFIED</th>
                        <th>SATISFIED</th>
                        <th>DISSATISFIED</th>
                        <th>VERY DISSATISFIED</th>
                        <th>NO RESPONSE</th>
                        <th>FOR VALIDATION</th>
                    </tr>

                    <tr>
                        <td colspan="7"><strong>1. RESPONSIVENESS, ASSURANCE, INTEGRITY, AND COMMUNICATION</strong></td>
                    </tr>
                    <tr>
                        <td>a. Clear and accurate information provided/released (understandable, valid, correct, true, etc.)</td>
                        <!-- <td><?= $form->field($model, 'raic_a')->radioList(Rating::getRatingradio(), ['itemOptions' => ['class' => 'radio']])->label(false) ?></td> -->
                        <?php
                            $radioOptions = Rating::getRatingradio();

                            // Loop through each rating option to render radio buttons in separate <td> elements
                            foreach ($radioOptions as $value => $label) {
                                echo '<td style="text-align: center;">'; // Start a new <td> for each radio button
                                echo '<input type="radio" name="' . Html::getInputName($model, 'raic_a') . '" value="' . $value . '">'; // Render the radio button
                                echo '</td>'; // End the <td> for this radio button
                            }
                        ?>
                    </tr>
                    <tr>
                        <td>b. Transparent transaction (implies accountability, communication and openness, etc.)</td>
                        <?php
                            $radioOptions = Rating::getRatingradio();

                            // Loop through each rating option to render radio buttons in separate <td> elements
                            foreach ($radioOptions as $value => $label) {
                                echo '<td style="text-align: center;">'; // Start a new <td> for each radio button
                                echo '<input type="radio" name="' . Html::getInputName($model, 'raic_b') . '" value="' . $value . '">'; // Render the radio button
                                echo '</td>'; // End the <td> for this radio button
                            }
                        ?>
                    </tr>
                    <tr>
                        <td>c. Knowledgeable and up-to-date (mindful, well informed, trained, etc.)	 </td>
                        <?php
                            $radioOptions = Rating::getRatingradio();

                            // Loop through each rating option to render radio buttons in separate <td> elements
                            foreach ($radioOptions as $value => $label) {
                                echo '<td style="text-align: center;">'; // Start a new <td> for each radio button
                                echo '<input type="radio" name="' . Html::getInputName($model, 'raic_c') . '" value="' . $value . '">'; // Render the radio button
                                echo '</td>'; // End the <td> for this radio button
                            }
                        ?>
                    </tr>
                    <tr>
                        <td>d. Professional attitude and appearance (strong ethics, emotional control, etc.)</td>
                        <?php
                            $radioOptions = Rating::getRatingradio();

                            // Loop through each rating option to render radio buttons in separate <td> elements
                            foreach ($radioOptions as $value => $label) {
                                echo '<td style="text-align: center;">'; // Start a new <td> for each radio button
                                echo '<input type="radio" name="' . Html::getInputName($model, 'raic_d') . '" value="' . $value . '">'; // Render the radio button
                                echo '</td>'; // End the <td> for this radio button
                            }
                        ?>
                    </tr>
                    <tr>
                        <td>e. Good judgement (listens, respectful, considerate, communicate clearly and effectively, etc.)</td>
                        <?php
                            $radioOptions = Rating::getRatingradio();

                            // Loop through each rating option to render radio buttons in separate <td> elements
                            foreach ($radioOptions as $value => $label) {
                                echo '<td style="text-align: center;">'; // Start a new <td> for each radio button
                                echo '<input type="radio" name="' . Html::getInputName($model, 'raic_e') . '" value="' . $value . '">'; // Render the radio button
                                echo '</td>'; // End the <td> for this radio button
                            }
                        ?>
                    </tr>
                    <tr>
                        <td>f. Timeliness of service (prompt, quick to respond, no hesitation/delay etc.)</td>
                        <?php
                            $radioOptions = Rating::getRatingradio();

                            // Loop through each rating option to render radio buttons in separate <td> elements
                            foreach ($radioOptions as $value => $label) {
                                echo '<td style="text-align: center;">'; // Start a new <td> for each radio button
                                echo '<input type="radio" name="' . Html::getInputName($model, 'raic_f') . '" value="' . $value . '">'; // Render the radio button
                                echo '</td>'; // End the <td> for this radio button
                            }
                        ?>
                    </tr>
                    
                    <tr>
                        <td colspan="7"><strong>2. ACCESS AND FACILITIES</strong></td>
                    </tr>
                    <tr>
                        <td>a. Well maintained facility (operating smoothly from the infrastructure/ equipment/assets, etc.)</td>
                        <?php
                            $radioOptions = Rating::getRatingradio();

                            // Loop through each rating option to render radio buttons in separate <td> elements
                            foreach ($radioOptions as $value => $label) {
                                echo '<td style="text-align: center;">'; // Start a new <td> for each radio button
                                echo '<input type="radio" name="' . Html::getInputName($model, 'af_a') . '" value="' . $value . '">'; // Render the radio button
                                echo '</td>'; // End the <td> for this radio button
                            }
                        ?>
                    </tr>
                    <tr>
                        <td>b. Readiness and availability of facility (organize and clean workplace, etc.)</td>
                        <?php
                            $radioOptions = Rating::getRatingradio();

                            // Loop through each rating option to render radio buttons in separate <td> elements
                            foreach ($radioOptions as $value => $label) {
                                echo '<td style="text-align: center;">'; // Start a new <td> for each radio button
                                echo '<input type="radio" name="' . Html::getInputName($model, 'af_b') . '" value="' . $value . '">'; // Render the radio button
                                echo '</td>'; // End the <td> for this radio button
                            }
                        ?>
                    </tr>
                    <tr>
                        <td>c. Comfort and safety (healthy workplace/environment, freedom from the occurrence or risk of injury, danger, or loss, etc.)</td>
                        <?php
                            $radioOptions = Rating::getRatingradio();

                            // Loop through each rating option to render radio buttons in separate <td> elements
                            foreach ($radioOptions as $value => $label) {
                                echo '<td style="text-align: center;">'; // Start a new <td> for each radio button
                                echo '<input type="radio" name="' . Html::getInputName($model, 'af_c') . '" value="' . $value . '">'; // Render the radio button
                                echo '</td>'; // End the <td> for this radio button
                            }
                        ?>
                    </tr>
                    <tr>
                    <td colspan="7"><strong>3. RELIABILITY AND OUTCOME</strong></td>
                    </tr>
                    <tr>
                        <td>a. High quality of work  (work the extra mile, focused, committed, determined, meet the completion expectations, etc.)</td>
                        <?php
                            $radioOptions = Rating::getRatingradio();

                            // Loop through each rating option to render radio buttons in separate <td> elements
                            foreach ($radioOptions as $value => $label) {
                                echo '<td style="text-align: center;">'; // Start a new <td> for each radio button
                                echo '<input type="radio" name="' . Html::getInputName($model, 'rao') . '" value="' . $value . '">'; // Render the radio button
                                echo '</td>'; // End the <td> for this radio button
                            }
                        ?>
                    </tr>
                    <tr>
                        <td colspan="7"><strong>OVERALL SATISFACTION RATING</strong></td>
                    </tr>
                    <tr>
                        <td>Overall satisfaction with the service availed.</td>
                        <?php
                            $radioOptions = Rating::getRatingradio();

                            // Loop through each rating option to render radio buttons in separate <td> elements
                            foreach ($radioOptions as $value => $label) {
                                echo '<td style="text-align: center;">'; // Start a new <td> for each radio button
                                echo '<input type="radio" name="' . Html::getInputName($model, 'ovr') . '" value="' . $value . '">'; // Render the radio button
                                echo '</td>'; // End the <td> for this radio button
                            }
                        ?>
                    </tr>
                </table>
            </div>
        </section>

        <section>
            <h2>PART II. COMMENTS AND SUGGESTIONS</h2>
            <p>Please write in the space below your reason/s for your <strong>"DISSATISFIED"</strong> 
            or <strong>"VERY DISSATISFIED"</strong> rating so that we will know in which area/s we need to improve.</p>
            <div class="form">
                <?= $form->field($commentsmodel, 'reason')->textarea(['rows' => 6, 'class' => 'textarea'])->label('Reason/s:') ?>
                <?= $form->field($commentsmodel, 'comments')->textarea(['rows' => 6, 'class' => 'textarea'])->label('Comments/Suggestions:') ?>
            </div>
        </section>

        <!-- Thank You -->
        <footer style="text-align: center;">
            <p><strong>THANK YOU!</strong></p>
        </footer>

        <div class="form-group" style="position: relative; top: 17px;">
            <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success', 'id' => 'save-button']) ?>
        </div>

    <?php 
    ActiveForm::end();
    ?>
</body>

<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f0f0f0;
    }

    header, section, footer {
        width: 67%;
        margin: 0 auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        margin-bottom: 20px;
        position: relative; /* Added position relative */
    }

    .img {
        width: 100px;
        float: left;
        margin-right: 20px;
    }

    .form {
        display: block;
        margin-bottom: 7px;
    }

    .textarea {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border-radius: 6px;
        border: 1px solid #ccc;
        box-sizing: border-box;
    }

    .form table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
        border: 1px;
    }

    .form table th,
    .form table td {
        border: 1px solid #ccc;
        padding: 10px;
        text-align: left;
    }

    .form table th:first-child,
    .form table td:first-child {
        width: 60%;
    }

    .form table th:first-child {
        font-weight: bold;
    }

    .form table th {
        text-align: center;
    }

    .radio{
        margin-right: 7px;
        margin: 0 auto; /* Center-align the checkboxes */
        display: block; /* Display checkboxes as block elements */
    }
    
    /* Style for Save button */
    .btn-success {
        background-color: #4CAF70; /* Green background */
        color: white; /* White text */
        padding: 12px 20px; /* Padding */
        border: none; /* No border */
        border-radius: 6px; /* Rounded corners */
        cursor: pointer; /* Cursor style */
        font-size: 16px; /* Font size */
        margin-bottom: 70px;
    }

    .btn-success:hover {
        background-color: #47a049; /* Darker green on hover */
    }

    /* Position the button */
    .form-group {
        text-align: center; /* Center align the button */
        margin-top: 20px; /* Margin from the top */
        /* margin-bottom: 70px; */
    }

    
    

</style>