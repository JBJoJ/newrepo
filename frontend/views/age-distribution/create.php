<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\models\AgeDistribution $model */

$this->title = Yii::t('app', 'Create Age Distribution');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Age Distributions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="age-distribution-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
