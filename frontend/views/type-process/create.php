<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\models\TypeProcess $model */

$this->title = Yii::t('app', 'Create Type Process');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Type Processes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="type-process-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
