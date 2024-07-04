<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\models\TdFtof $model */

$this->title = Yii::t('app', 'Create Td Ftof');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Td Ftofs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="td-ftof-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
