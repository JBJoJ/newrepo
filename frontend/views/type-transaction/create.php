<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\models\TypeTransaction $model */

$this->title = Yii::t('app', 'Create Type Transaction');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Type Transactions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="type-transaction-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
