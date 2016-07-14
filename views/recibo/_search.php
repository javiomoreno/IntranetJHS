<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\ReciboSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="recibo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ReciboID') ?>

    <?= $form->field($model, 'ReciboFechaInicio') ?>

    <?= $form->field($model, 'ReciboFechaFin') ?>

    <?= $form->field($model, 'ReciboNumero') ?>

    <?= $form->field($model, 'Recibocol') ?>

    <?php // echo $form->field($model, 'UsuarioID') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
