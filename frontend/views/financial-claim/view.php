<!--  -->

<?php

use yii\helpers\Html;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var frontend\models\FinancialClaim $model */
/** @var frontend\models\Comments $commentsmodel */
/** @var frontend\models\Csf $csfmodel */

$this->title = Yii::t('app', 'Customer Satisfaction Feedback');
echo Html::a('View Feedback', Url::to(['financial-claim/view', 'process_id' => $csfmodel]));

?>

<body>
    
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
        <div class="form">
            <div class="form-row">
                <label for="date" colspan="6">Date:</label>
                <p class="date"><?= Html::encode($csfmodel->date) ?></p>
            </div>

            <div class="form-row1">
                <label for="client_name" style="width: 25%;">Client's name:</label> <!-- Adjusted width -->
                <p class="text"><?= Html::encode($csfmodel->client_name) ?></p> <!-- Adjusted width -->
            </div>

            <div class="form-row">
                <label for="sex" style="margin-left: 10px;">Sex:</label>
                <p class="sex"><?= Html::encode($csfmodel->sex) ?></p>
            </div>

            <div class="form-row">
                <label for="age" colspan="6">Age:</label>
                <p class="age"><?= Html::encode($csfmodel->age) ?></p>
            </div>

            <div class="form-row">
                <label for="contact" colspan="6">Contact Number:</label>
                <p class="tel"><?= Html::encode($csfmodel->contact_number) ?></p>
                <label for="email" colspan="6">Email Address:</label>
                <p class="email"><?= Html::encode($csfmodel->email  ) ?></p>
            </div>

        </div>
    </section>
</body>