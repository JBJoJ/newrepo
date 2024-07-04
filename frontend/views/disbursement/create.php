<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\models\Disbursement $model */

$this->title = Yii::t('app', 'Create Disbursement');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Disbursements'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="disbursement-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
