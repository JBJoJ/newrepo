<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\Rating;

/** @var yii\web\View $this */
/** @var frontend\models\Recruitment $model */
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
                <hr style="border-top: 1px solid black; width: 40vw; margin: 5px auto">
                <p style="font-weight: bold; margin: 0; text-transfomr: uppercase">Client Satisfaction Feedback Form</p>
                <p style="font-weight: bold; margin: 0;">Request and Issuance of Supply (RIS)</p>
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
                        <td colspan="5"><strong>For each criterion below, please check-mark the box under the column pertaining 
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
                    </tr>

                    <tr>
                        <td colspan="5"><strong>1. QUALITY SERVICE</strong></td>
                    </tr>
                    <tr>
                        <td colspan="5"><strong>(Covers Reliability,Responsiveness, Integrity, Outcome)</strong></td>
                    </tr>
                    <tr>
                        <td>a. Timeless of delivery of product and service</td>
                        <?php
                            $radioOptions = Rating::getRatingradio();

                            // Loop through each rating option to render radio buttons in separate <td> elements
                            foreach ($radioOptions as $value => $label) {
                                echo '<td style="text-align: center;">'; // Start a new <td> for each radio button
                                echo '<input type="radio" name="' . Html::getInputName($model, 'qs_a') . '" value="' . $value . '">'; // Render the radio button
                                echo '</td>'; // End the <td> for this radio button
                            }
                        ?>
                    </tr>
                    <tr>
                        <td>b. Transparency in the manner of transaction</td>
                        <?php
                            $radioOptions = Rating::getRatingradio();

                            // Loop through each rating option to render radio buttons in separate <td> elements
                            foreach ($radioOptions as $value => $label) {
                                echo '<td style="text-align: center;">'; // Start a new <td> for each radio button
                                echo '<input type="radio" name="' . Html::getInputName($model, 'qs_b') . '" value="' . $value . '">'; // Render the radio button
                                echo '</td>'; // End the <td> for this radio button
                            }
                        ?>
                    </tr>
                    
                    <tr>
                        <td colspan="5"><strong>2. DTI STAFF</strong></td>
                    </tr>
                    <tr>
                        <td colspan="5"><strong>(Covers Communication, Responsiveness, Integrity, <br> Reliability, Assurance)</strong></td>
                    </tr>
                    <tr>
                        <td>a. Expertise/Knowledge (competence or capability of staff in performing the service and in delivering the expected output)</td>
                        <?php
                            $radioOptions = Rating::getRatingradio();

                            // Loop through each rating option to render radio buttons in separate <td> elements
                            foreach ($radioOptions as $value => $label) {
                                echo '<td style="text-align: center;">'; // Start a new <td> for each radio button
                                echo '<input type="radio" name="' . Html::getInputName($model, 'staff_a') . '" value="' . $value . '">'; // Render the radio button
                                echo '</td>'; // End the <td> for this radio button
                            }
                        ?>
                    </tr>
                    <tr>
                        <td>b. Prefessionalism (qualities that are connected with trained and skilled people)</td>
                        <?php
                            $radioOptions = Rating::getRatingradio();

                            // Loop through each rating option to render radio buttons in separate <td> elements
                            foreach ($radioOptions as $value => $label) {
                                echo '<td style="text-align: center;">'; // Start a new <td> for each radio button
                                echo '<input type="radio" name="' . Html::getInputName($model, 'staff_b') . '" value="' . $value . '">'; // Render the radio button
                                echo '</td>'; // End the <td> for this radio button
                            }
                        ?>
                    </tr>
                    <tr>
                        <td>c. Courtesy (politeness in one's attitude and behavior toward others)</td>
                        <?php
                            $radioOptions = Rating::getRatingradio();

                            // Loop through each rating option to render radio buttons in separate <td> elements
                            foreach ($radioOptions as $value => $label) {
                                echo '<td style="text-align: center;">'; // Start a new <td> for each radio button
                                echo '<input type="radio" name="' . Html::getInputName($model, 'staff_c') . '" value="' . $value . '">'; // Render the radio button
                                echo '</td>'; // End the <td> for this radio button
                            }
                        ?>
                    </tr>
                    <tr>
                        <td>d. Helpful (Accomodating, proividing useful instruction, effective intervention)</td>
                        <?php
                            $radioOptions = Rating::getRatingradio();

                            // Loop through each rating option to render radio buttons in separate <td> elements
                            foreach ($radioOptions as $value => $label) {
                                echo '<td style="text-align: center;">'; // Start a new <td> for each radio button
                                echo '<input type="radio" name="' . Html::getInputName($model, 'staff_d') . '" value="' . $value . '">'; // Render the radio button
                                echo '</td>'; // End the <td> for this radio button
                            }
                        ?>
                    </tr>
                    <tr>
                        <td>e. Response time</td>
                        <?php
                            $radioOptions = Rating::getRatingradio();

                            // Loop through each rating option to render radio buttons in separate <td> elements
                            foreach ($radioOptions as $value => $label) {
                                echo '<td style="text-align: center;">'; // Start a new <td> for each radio button
                                echo '<input type="radio" name="' . Html::getInputName($model, 'staff_e') . '" value="' . $value . '">'; // Render the radio button
                                echo '</td>'; // End the <td> for this radio button
                            }
                        ?>
                    </tr>

                    <tr>
                        <td colspan="5"><strong>3. OUTCOME/Result of Service/s Requested</strong></td>
                    </tr>
                    <tr>
                        <td>a. Service received according to expectation</td>
                        <?php
                            $radioOptions = Rating::getRatingradio();

                            // Loop through each rating option to render radio buttons in separate <td> elements
                            foreach ($radioOptions as $value => $label) {
                                echo '<td style="text-align: center;">'; // Start a new <td> for each radio button
                                echo '<input type="radio" name="' . Html::getInputName($model, 'os_a') . '" value="' . $value . '">'; // Render the radio button
                                echo '</td>'; // End the <td> for this radio button
                            }
                        ?>
                    </tr>

                    <tr>
                        <td colspan="5"><strong>OVERALL SATISFACTION RATING</strong></td>
                    </tr>
                    <tr>
                        <td>Overall satisfaction with the service availed.</td>
                        <?php
                            $radioOptions = Rating::getRatingradio();

                            // Loop through each rating option to render radio buttons in separate <td> elements
                            foreach ($radioOptions as $value => $label) {
                                echo '<td style="text-align: center;">'; // Start a new <td> for each radio button
                                echo '<input type="radio" name="' . Html::getInputName($model, 'osr') . '" value="' . $value . '">'; // Render the radio button
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

        <div class="form-group" style="position: relative; top: 15px;">
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
        width: 65%;
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
        margin-bottom: 5px;
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
        margin-right: 5px;
        margin: 0 auto; /* Center-align the checkboxes */
        display: block; /* Display checkboxes as block elements */
    }

    /* Style for Save button */
    .btn-success {
        background-color: #4CAF50; /* Green background */
        color: white; /* White text */
        padding: 12px 20px; /* Padding */
        border: none; /* No border */
        border-radius: 6px; /* Rounded corners */
        cursor: pointer; /* Cursor style */
        font-size: 16px; /* Font size */
        margin-bottom: 50px;
    }

    .btn-success:hover {
        background-color: #45a049; /* Darker green on hover */
    }

    /* Position the button */
    .form-group {
        text-align: center; /* Center align the button */
        margin-top: 20px; /* Margin from the top */
    }

</style>
