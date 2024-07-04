<?php

/** @var \yii\web\View $this */
/** @var string $content */

use common\widgets\Alert;
use frontend\assets\AppAsset;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\web\View;

AppAsset::register($this);

//$this->registerCssFile('@web/css/financial.css');
// $this->registerJsFile('@web/css/bootstrap/js/bootstrap.bundle.min.js');
//$this->registerJsFile('@web/js/fields.js');
// $this->registerJsFile('@web/js/hidefield.js');
//$this->registerJsFile('@web/js/process_form.js', ['depends' => [\yii\web\JqueryAsset::class]]);
// $this->registerJS("
// // process_form.js

//     $('#process-dropdown').change(function() {
//         var selectedProcess = $(this).val();
        
//         // Example: if 'process1' is selected, hide field1 and show field2
//         if (selectedProcess === 'Accreditation of SRE - F2F') {
//             $('#program').hide();
//         } 
        
        
//         // Update hidden field value if needed
//         //$('#hidden-field').val(selectedProcess);
//     });

// ")
// $this->registerJS(<<<JS
//  // Function to toggle visibility of the fields based on selected process
// function toggleVisibility(processValue) {
//     switch (processValue) {
//         case 'Accreditation of SRE - F2F':
//             hideFields(['#program-field', '#duration-field', '#platform-field', '#business_name-field', '#transaction-field', '#disbursement-field']);
//             break;
//         case 'Accreditation of SRE - Online':
//             hideFields(['#program-field', '#duration-field', '#platform-field', '#business_name-field', '#transaction-field', '#disbursement-field']);
//             break;
//         case 'BMBE Registration - F2F':
//             hideFields(['#program-field', '#duration-field', '#platform-field', '#business_name-field', '#transaction-field', '#disbursement-field']);
//             break;
//         case 'Training and Development - F2F':
//             hideFields(['#region-field', '#contact-field', '#email-field', '#transaction-field', '#disbursement-field']);
//             break;
//         default:
//             showAllFields();
//     }
// }

// // Function to hide specified fields
// function hideFields(fields) {
//     fields.forEach(function(field) {
//         $(field).closest('.form-group').hide();
//     });
// }

// // Function to show all fields
// function showAllFields() {
//     $('.form-group').show();
// }

// // Triggering the function initially
// toggleVisibility($('#process-dropdown').val());

// // Binding change event to the dropdown
// $('#process-dropdown').change(function() {
//     toggleVisibility($(this).val());
// });


// JS,
// VIEW::POS_READY);

$this->registerCssFile('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css');
$this->registerJsFile('https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js', ['position' => View::POS_HEAD]);
$this->registerJsFile('https://code.jquery.com/jquery-3.6.0.min.js', ['position' => \yii\web\View::POS_HEAD]);

?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <style media="screen">
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap');

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Poppins", sans-serif;
}

body {
    min-height: 100vh;
    background: white;
    /* color: white; */
    background-size: cover;
    background-position: center;
}

.side-bar {
    background: #1b1a1b;
    backdrop-filter: blur(15px);
    width: 250px;
    height: 100vh;
    position: fixed;
    top: 0;
    overflow-y: auto;
    transition: 0.6s ease;
    transition-property: left;
}

.side-bar::-webkit-scrollbar {
    width: 0px;
}

.side-bar.active {
    left: 0;
}

h1 {
    text-align: center;
    font-weight: 500;
    font-size: 25px;
    padding-bottom: 13px;
    font-family: sans-serif;
    letter-spacing: 2px;
}

.side-bar .menu ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.side-bar .menu ul li.item {
    position: relative;
    cursor: pointer;
}

.side-bar .menu ul li.item > a {
    color: #fff;
    font-size: 16px;
    text-decoration: none;
    display: block;
    padding: 5px 30px;
    line-height: 60px;
}

.side-bar .menu ul li.item > a:hover {
    background: #33363a;
    transition: 0.3s ease;
}

.side-bar .menu ul li.item > a i {
    margin-right: 15px;
}

.side-bar .menu ul li.item > a .dropdown {
    position: absolute;
    right: 0;
    margin: 20px;
    transition: 0.3s ease;
}

.side-bar .menu ul li.item .sub-menu {
    background: #262627;
    display: none;
}



.side-bar .menu ul li.item .sub-menu a {
    display: block;
    padding: 10px 30px;
    color: #ccc;
    text-decoration: none;
    transition: 0.3s ease;
}

.side-bar .menu ul li.item .sub-menu a:hover {
    background-color: #33363a;
    color: #fff;
}

.rotate {
    transform: rotate(90deg);
}

.close-btn {
    position: absolute;
    color: #fff;
    font-size: 23px;
    right: 0px;
    margin: 15px;
    cursor: pointer;
}

.main {
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 50px;
}

.main h1 {
    color: rgba(255, 255, 255, 0.8);
    font-size: 60px;
    text-align: center;
    line-height: 80px;
}

@media (max-width: 900px) {
    .main h1 {
        font-size: 40px;
        line-height: 60px;
    }
}

.img {
    width: 100px;
    margin: 15px;
    border-radius: 20%;
    margin-left: 70px;
    
}

header {
    background: #33363a;
}

section {
    background: url(bg.jpeg) no-repeat;
    background-position: center;
    background-size: cover;
    height: 100vh;
    margin-left: 250px;
    transition: all .5s;
    flex: 1;
}
    </style>
</head>

<body>
<?php $this->beginBody() ?>
<div class="side-bar">
        <header>
            <?= Html::img('@web/image/dti_logo2.jpg', ['class' => 'img', 'alt' => 'DTI Logo']) ?>
            <h1 style="color: white;">DTI - CARAGA</h1>
        </header>
        <div class="menu">
            <ul>
                <li class="item">
                    <?= Html::a('<i class="fas fa-table"></i>Master Records<i class="fas fa-angle-right dropdown"></i>', ['#'], ['class' => 'sub-btn']) ?>
                    <div class="sub-menu">
                        <?= Html::a('Processes', ['processes/index'], ['class' => 'sub-item']) ?>
                        <?= Html::a('Type of Transaction', ['type-transaction/index'], ['class' => 'sub-item']) ?>
                        <?= Html::a('Type of Process', ['type-process/index'], ['class' => 'sub-item']) ?>
                        <?= Html::a('Sex', ['sex/index'], ['class' => 'sub-item']) ?>
                        <?= Html::a('Transcation Type', ['transaction/index'], ['class' => 'sub-item']) ?>
                        <?= Html::a('Disbursement Type', ['disbursement/index'], ['class' => 'sub-item']) ?>
                        <?= Html::a('Rating', ['rating/index'], ['class' => 'sub-item']) ?>
                        <?= Html::a('Client Type', ['client-type/index'], ['class' => 'sub-item']) ?>
                        <?= Html::a('Age Distribution', ['age-distribution/index'], ['class' => 'sub-item']) ?>
                        <?= Html::a('Offices', ['office/index'], ['class' => 'sub-item']) ?>
                    </div>
                </li>
                <li class="item">
                    <?= Html::a('<i class="fas fa-table"></i>Records<i class="fas fa-angle-right dropdown"></i>', ['#'], ['class' => 'sub-btn']) ?>
                    <div class="sub-menu">
                        <?= Html::a('Feedback Monitoring', ['feedback-monitoring/index'], ['class' => 'sub-item']) ?>
                        <?= Html::a('Customer Satisfaction Feedback', ['csf/index'], ['class' => 'sub-item']) ?>
                        <?= Html::a('Improvement Action Plan', ['improvement-action-plan/index'], ['class' => 'sub-item']) ?>
                    </div>
                </li>
                <li class="item">
                    <?= Html::a('<i class="fas fa-table"></i>Reports<i class="fas fa-angle-right dropdown"></i>', ['#'], ['class' => 'sub-btn']) ?>
                    <div class="sub-menu">
                        <?= Html::a('CSF Response Tabulation', ['csf/csf-tabulation'], ['class' => 'sub-item']) ?>
                        <?= Html::a('Graph', ['#'], ['class' => 'sub-item']) ?>
                        <?= Html::a('Provincial Tabulation', ['#'], ['class' => 'sub-item']) ?>
                        <?= Html::a('Provincial Summary Report', ['#'], ['class' => 'sub-item']) ?>
                        <?= Html::a('Regional Tabulation', ['#'], ['class' => 'sub-item']) ?>
                        <?= Html::a('Regional Summary Report', ['#'], ['class' => 'sub-item']) ?>
                        <?= Html::a('Consolidated CSF Monthly Report', ['#'], ['class' => 'sub-item']) ?>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <!-- Your new section here -->
    <section>
        <!-- Content of your section -->
        <!-- Place the table content here -->
        <div class="container mt-4">
            <?php if (!empty($this->params['breadcrumbs'])): ?>
                <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
            <?php endif ?>
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
    </section>
    <!-- End of your new section -->

    <script type="text/javascript">
    $(document).ready(function() {
        // jQuery for toggle sub menus
        $('.sub-btn').click(function(e) {
            e.preventDefault(); // Prevent the default click behavior

            // Toggle the visibility of the submenu
            var submenu = $(this).next('.sub-menu');
            submenu.slideToggle();

            // Rotate the dropdown arrow icon
            $(this).find('.dropdown').toggleClass('rotate');

            // Close other submenus except the current one
            $('.sub-menu').not(submenu).slideUp();
            $('.dropdown').not($(this).find('.dropdown')).removeClass('rotate');
        });
    });
</script>



<?php $this->endBody() ?>
</body>

</html>



<?php $this->endPage();