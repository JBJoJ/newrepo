<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\models\FinancialClaim $model */

$this->title = Yii::t('app', 'Create Financial Claim');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Financial Claims'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="financial-claim-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
