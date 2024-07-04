<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\models\TdOnline $model */

$this->title = Yii::t('app', 'Create Td Online');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Td Onlines'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="td-online-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
