<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\models\Comments $model */

$this->title = Yii::t('app', 'Create Comments');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Comments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comments-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
