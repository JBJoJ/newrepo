<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\models\Processes $model */

$this->title = Yii::t('app', 'Create Processes');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Processes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="processes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
