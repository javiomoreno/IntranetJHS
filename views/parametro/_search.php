<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\ParametrooSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="parametro-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ParametroID') ?>

    <?= $form->field($model, 'ParametroCodigo') ?>

    <?= $form->field($model, 'ParametroDescripcion') ?>

    <?= $form->field($model, 'ParametroValorAuxiliar') ?>

    <?= $form->field($model, 'ParametroAsignaciones') ?>

    <?php // echo $form->field($model, 'ParametroDeducciones') ?>

    <?php // echo $form->field($model, 'ParametroNetoaCobrar') ?>

    <?php // echo $form->field($model, 'ParametroFechaReg') ?>

    <?php // echo $form->field($model, 'ReciboID') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
