<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var frontend\models\TdFtof $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="td-ftof-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'process_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ocd_a')->textInput() ?>

    <?= $form->field($model, 'ocd_b')->textInput() ?>

    <?= $form->field($model, 'ocd_c')->textInput() ?>

    <?= $form->field($model, 'ocd_d')->textInput() ?>

    <?= $form->field($model, 'ocd_e')->textInput() ?>

    <?= $form->field($model, 'meth_a')->textInput() ?>

    <?= $form->field($model, 'meth_b')->textInput() ?>

    <?= $form->field($model, 'meth_c')->textInput() ?>

    <?= $form->field($model, 'meth_d')->textInput() ?>

    <?= $form->field($model, 'rs1_a')->textInput() ?>

    <?= $form->field($model, 'rs1_b')->textInput() ?>

    <?= $form->field($model, 'rs1_c')->textInput() ?>

    <?= $form->field($model, 'rs2_a')->textInput() ?>

    <?= $form->field($model, 'rs2_b')->textInput() ?>

    <?= $form->field($model, 'rs2_c')->textInput() ?>

    <?= $form->field($model, 'rs3_a')->textInput() ?>

    <?= $form->field($model, 'rs3_b')->textInput() ?>

    <?= $form->field($model, 'rs3_c')->textInput() ?>

    <?= $form->field($model, 'trn_host_a')->textInput() ?>

    <?= $form->field($model, 'trn_host_b')->textInput() ?>

    <?= $form->field($model, 'trn_host_c')->textInput() ?>

    <?= $form->field($model, 'trn_host_d')->textInput() ?>

    <?= $form->field($model, 'admin_a')->textInput() ?>

    <?= $form->field($model, 'admin_b')->textInput() ?>

    <?= $form->field($model, 'admin_c')->textInput() ?>

    <?= $form->field($model, 'admin_d')->textInput() ?>

    <?= $form->field($model, 'admin_e')->textInput() ?>

    <?= $form->field($model, 'osr')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
