<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use frontend\models\Rating;

/** @var yii\web\View $this */
/** @var frontend\models\Recruitment $model */
/** @var frontend\models\Csf $csf */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Recruitments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
$radioOptions = Rating::getRatingradio(); // Assuming this fetches rating options like ['1' => 'Very Satisfied', '2' => 'Satisfied', ...]
?>

<body>
    <header style="text-align: center;">
        <?= Html::img('@web/image/ISO.png', ['class' => 'img', 'alt' => 'Company Logo', 'style' => 'float: left;']) ?>
        <div style="display: inline-block; vertical-align: top; margin-top: 60px; text-align: center; margin-right: 100px;">
            <p style="font-weight: bold; margin: 0; text-transform: uppercase;">
                Department of Trade and Industry
            </p>
            <p style="font-weight: bold; margin: 0;">
                DTI - <Bureau/Office> | DTI - Regional Office | DTI Provincial Office
            </p>
            <hr style="border-top: 1px solid black; width: 40vw; margin: 5px auto">
            <p style="font-weight: bold; margin: 0; text-transform: uppercase">Client Satisfaction Feedback Form</p>
            <p style="font-weight: bold; margin: 0;">Recruitment, Selection, and Placement</p>
        </div>
    </header>

    <section>
        <p><strong>CONSENT:</strong> I hereby consent to the collection and processing by the DTI of my name, contact details, 
        and my feedback on its services for the purpose of monitoring, measuring, and analyzing customer feedback and of 
        improving DTI services. I shall notify the DTI in case of any changes in my personal information. This consent shall be valid, unless revoked or 
        withdrawn in writing subject to the applicable provisions of the <strong>Data Privacy Act of 2012</strong> or Republic Act no. 10173.</p>
    </section>

    <section>
        <div class="form">
            <div class="form-row">
                <div class="form-column">
                    <label for="client_name">Client's name:</label>
                    <p class="text"><?= Html::encode($csf->client_name) ?></p>
                </div>
                <div class="form-column">
                    <label for="date">Date:</label>
                    <p class="date"><?= Html::encode($csf->date) ?></p>
                </div>
            </div>

            <div class="form-row">
                <div class="form-column">
                    <label for="contact">Contact Number:</label>
                    <p class="tel"><?= Html::encode($csf->contact_number) ?></p>
                </div>
                <div class="form-column">
                    <label for="email">Email Address:</label>
                    <p class="email"><?= Html::encode($csf->email) ?></p>
                </div>
            </div>
        </div>
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
                    <td colspan="7"><strong>1. QUALITY SERVICE (Kalidad ng serbisyo)</strong></td>
                </tr>
                <tr>
                    <td>a. Clarity, accuracy, and completeness of information on position/vacancy</td>
                    <?php
                        // Loop through each rating option to render radio buttons in separate <td> elements
                        foreach ($radioOptions as $value => $label) {
                            echo '<td style="text-align: center;">'; // Start a new <td> for each radio button
                            
                            // Determine if the current option is checked based on the model's value
                            $checked = ($model->qs_a == $value) ? 'checked' : '';
                            
                            // Render the radio button with its value and checked status
                            echo '<input type="radio" name="' . Html::getInputName($model, 'qs_a') . '" value="' . $value . '" ' . $checked . '>'; // Render the radio button
                            
                            echo '</td>'; // End the <td> for this radio button
                        }
                    ?>
                </tr>
                <tr>
                    <td>b. Timeliness on response to questions about the position/vacancy</td>
                    <?php
                        // Loop through each rating option to render radio buttons in separate <td> elements
                        foreach ($radioOptions as $value => $label) {
                            echo '<td style="text-align: center;">'; // Start a new <td> for each radio button
                            // Determine if the current option is checked based on the model's value
                            $checked = ($model->qs_b == $value) ? 'checked' : '';
                                
                            // Render the radio button with its value and checked status
                            echo '<input type="radio" name="' . Html::getInputName($model, 'qs_b') . '" value="' . $value . '" ' . $checked . '>'; // Render the radio button
                            echo '</td>'; // End the <td> for this radio button
                        }
                    ?>
                </tr>
                <tr>
                    <td>c. Timeliness on updates on status of application and recruitment process</td>
                    <?php
                        // Loop through each rating option to render radio buttons in separate <td> elements
                        foreach ($radioOptions as $value => $label) {
                            echo '<td style="text-align: center;">'; // Start a new <td> for each radio button
                            // Determine if the current option is checked based on the model's value
                            $checked = ($model->qs_c == $value) ? 'checked' : '';
                                
                            // Render the radio button with its value and checked status
                            echo '<input type="radio" name="' . Html::getInputName($model, 'qs_c') . '" value="' . $value . '" ' . $checked . '>'; // Render the radio button
                            echo '</td>'; // End the <td> for this radio button
                        }
                    ?>
                </tr>
                <tr>
                    <td>d. Positive recruitment branding of DTI as an employer of choice (with clear DTI employment value proposition and confidence 
                        building in applicants on recruitment process that is comfortable, uncomplicated, objective, and transparent)</td>
                    <?php
                        // Loop through each rating option to render radio buttons in separate <td> elements
                        foreach ($radioOptions as $value => $label) {
                            echo '<td style="text-align: center;">'; // Start a new <td> for each radio button
                            // Determine if the current option is checked based on the model's value
                            $checked = ($model->qs_d == $value) ? 'checked' : '';
                                
                            // Render the radio button with its value and checked status
                            echo '<input type="radio" name="' . Html::getInputName($model, 'qs_d') . '" value="' . $value . '" ' . $checked . '>'; // Render the radio button
                            echo '</td>'; // End the <td> for this radio button
                        }
                    ?>
                </tr>

                <tr>
                    <td colspan="7"><strong>2. DTI Recruitment Staff and Interviewers (Empleyado ng DTI)</strong></td>
                </tr>
                <tr>
                    <td colspan="7"><strong>Dimensions Covered: Responsiveness, Reliability (Quality), <br> Outcome, Communication, Integrity, Assurance</strong></td>
                </tr>
                <tr>
                    <td>a. Knowledge and expertise of recruitment staff on vacancy and recruitment process</td>
                    <?php
                        // Loop through each rating option to render radio buttons in separate <td> elements
                        foreach ($radioOptions as $value => $label) {
                            echo '<td style="text-align: center;">'; // Start a new <td> for each radio button
                            // Determine if the current option is checked based on the model's value
                            $checked = ($model->rsi_a == $value) ? 'checked' : '';
                                
                            // Render the radio button with its value and checked status
                            echo '<input type="radio" name="' . Html::getInputName($model, 'rsi_a') . '" value="' . $value . '" ' . $checked . '>'; // Render the radio button
                            echo '</td>'; // End the <td> for this radio button
                        }
                    ?>
                </tr>
                <tr>
                    <td>b. Professionalism, courtesy, and attention afforded by recruitment staff</td>
                    <?php
                        // Loop through each rating option to render radio buttons in separate <td> elements
                        foreach ($radioOptions as $value => $label) {
                            echo '<td style="text-align: center;">'; // Start a new <td> for each radio button
                            // Determine if the current option is checked based on the model's value
                            $checked = ($model->rsi_b == $value) ? 'checked' : '';
                                
                            // Render the radio button with its value and checked status
                            echo '<input type="radio" name="' . Html::getInputName($model, 'rsi_b') . '" value="' . $value . '" ' . $checked . '>'; // Render the radio button
                            echo '</td>'; // End the <td> for this radio button
                        }
                    ?>
                </tr>
                <tr>
                    <td>c. Competency-based interviewing skills (targeted, focused interview questions on behaviors and accomplishments of interviewees) of interviewers / panelists</td>
                    <?php
                        // Loop through each rating option to render radio buttons in separate <td> elements
                        foreach ($radioOptions as $value => $label) {
                            echo '<td style="text-align: center;">'; // Start a new <td> for each radio button
                            // Determine if the current option is checked based on the model's value
                            $checked = ($model->rsi_c == $value) ? 'checked' : '';
                                
                            // Render the radio button with its value and checked status
                            echo '<input type="radio" name="' . Html::getInputName($model, 'rsi_c') . '" value="' . $value . '" ' . $checked . '>'; // Render the radio button
                            echo '</td>'; // End the <td> for this radio button
                        }
                    ?>
                </tr>
                <tr>
                    <td>d. Professionalism, knowledge, empathy, and listening skills of interviewers/panelists</td>
                    <?php
                        // Loop through each rating option to render radio buttons in separate <td> elements
                        foreach ($radioOptions as $value => $label) {
                            echo '<td style="text-align: center;">'; // Start a new <td> for each radio button
                            // Determine if the current option is checked based on the model's value
                            $checked = ($model->rsi_d == $value) ? 'checked' : '';
                                
                            // Render the radio button with its value and checked status
                            echo '<input type="radio" name="' . Html::getInputName($model, 'rsi_d') . '" value="' . $value . '" ' . $checked . '>'; // Render the radio button
                            echo '</td>'; // End the <td> for this radio button
                        }
                    ?>
                </tr>

                <tr>
                    <td colspan="7"><strong>3. Testing/Interview Venue/Platform <br> (Lugar/Plataporma ng pagsusulit o panayam)</strong></td>
                </tr>
                <tr>
                    <td colspan="7"><strong>Dimensions Covered: Access and Facilities</strong></td>
                </tr>
                <tr>
                    <td>a. Accessibility of DTI office/venue of testing and interviews</td>
                    <?php
                        // Loop through each rating option to render radio buttons in separate <td> elements
                        foreach ($radioOptions as $value => $label) {
                            echo '<td style="text-align: center;">'; // Start a new <td> for each radio button
                            // Determine if the current option is checked based on the model's value
                            $checked = ($model->tv_a == $value) ? 'checked' : '';
                                
                            // Render the radio button with its value and checked status
                            echo '<input type="radio" name="' . Html::getInputName($model, 'tv_a') . '" value="' . $value . '" ' . $checked . '>'; // Render the radio button
                            echo '</td>'; // End the <td> for this radio button
                        }
                    ?>
                </tr>
                    <tr>
                        <td>b. Clean, sanitized and sample amenities for comfortable testing and interview process</td>
                        <?php
                            // Loop through each rating option to render radio buttons in separate <td> elements
                            foreach ($radioOptions as $value => $label) {
                                echo '<td style="text-align: center;">'; // Start a new <td> for each radio button
                                // Determine if the current option is checked based on the model's value
                                $checked = ($model->tv_b == $value) ? 'checked' : '';
                                    
                                // Render the radio button with its value and checked status
                                echo '<input type="radio" name="' . Html::getInputName($model, 'tv_b') . '" value="' . $value . '" ' . $checked . '>'; // Render the radio button
                                echo '</td>'; // End the <td> for this radio button
                            }
                        ?>
                    </tr>
                    <tr>
                        <td>c. Clarity of audio system (for virtual platforms/calls)</td>
                        <?php
                            // Loop through each rating option to render radio buttons in separate <td> elements
                            foreach ($radioOptions as $value => $label) {
                                echo '<td style="text-align: center;">'; // Start a new <td> for each radio button
                                // Determine if the current option is checked based on the model's value
                                $checked = ($model->tv_c == $value) ? 'checked' : '';
                                    
                                // Render the radio button with its value and checked status
                                echo '<input type="radio" name="' . Html::getInputName($model, 'tv_c') . '" value="' . $value . '" ' . $checked . '>'; // Render the radio button
                                echo '</td>'; // End the <td> for this radio button
                            }
                        ?>
                    </tr>
                    <tr>
                        <td>d. Clarity and effectiveess of presentation facility (for virtual platforms)</td>
                        <?php
                            // Loop through each rating option to render radio buttons in separate <td> elements
                            foreach ($radioOptions as $value => $label) {
                                echo '<td style="text-align: center;">'; // Start a new <td> for each radio button
                                // Determine if the current option is checked based on the model's value
                                $checked = ($model->tv_d == $value) ? 'checked' : '';
                                    
                                // Render the radio button with its value and checked status
                                echo '<input type="radio" name="' . Html::getInputName($model, 'tv_d') . '" value="' . $value . '" ' . $checked . '>'; // Render the radio button
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
                            // Loop through each rating option to render radio buttons in separate <td> elements
                            foreach ($radioOptions as $value => $label) {
                                echo '<td style="text-align: center;">'; // Start a new <td> for each radio button
                                // Determine if the current option is checked based on the model's value
                                $checked = ($model->osr == $value) ? 'checked' : '';
                                    
                                // Render the radio button with its value and checked status
                                echo '<input type="radio" name="' . Html::getInputName($model, 'osr') . '" value="' . $value . '" ' . $checked . '>'; // Render the radio button
                                echo '</td>'; // End the <td> for this radio button
                            }
                        ?>
                    </tr>
            </table>
    </section>

    <section>
        <h2>PART II. COMMENTS AND SUGGESTIONS</h2>
        <p>Please write in the space below your reason/s for your <strong>"DISSATISFIED"</strong> 
        or <strong>"VERY DISSATISFIED"</strong> rating so that we will know in which area/s we need to improve.</p>
        <div>
            <p><strong>Reason/s:</strong></p>
            <textarea class="textarea readonly-textarea" readonly><?= Html::encode($comment->reason) ?></textarea>
            <p><strong>Comments/Suggestions:</strong></p>
            <textarea class="textarea readonly-textarea" readonly><?= Html::encode($comment->comments) ?></textarea>
        </div>
    </section>

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
        margin-bottom: 20px;
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

    .form-row {
    display: flex;
    align-items: flex-start; /* Align items vertically at the start */
    justify-content: space-between; /* Distribute items evenly */
    margin-bottom: 10px;
}

.form-column {
    flex: 1; /* Each column takes equal space */
    margin-right: 10px; /* Adjust margin between columns */
}

.form-row label {
    display: inline-block;
    width: 150px; /* Adjust width as needed */
    margin-right: 10px;
    font-weight: bold;
    font-size: 17px;
}

.form-row p {
    margin: 0;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 6px;
    font-size: 17px;
}
    

</style>
