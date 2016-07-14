<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Parametro */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="parametro-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ParametroID')->textInput() ?>

    <?= $form->field($model, 'ParametroCodigo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ParametroDescripcion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ParametroValorAuxiliar')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ParametroAsignaciones')->textInput() ?>

    <?= $form->field($model, 'ParametroDeducciones')->textInput() ?>

    <?= $form->field($model, 'ParametroNetoaCobrar')->textInput() ?>

    <?= $form->field($model, 'ParametroFechaReg')->textInput() ?>

    <?= $form->field($model, 'ReciboID')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
