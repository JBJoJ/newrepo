<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\models\ClientType $model */

$this->title = Yii::t('app', 'Create Client Type');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Client Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="client-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
