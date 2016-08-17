<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Recibo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="recibo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ReciboID')->textInput() ?>

    <?= $form->field($model, 'ReciboFechaInicio')->textInput() ?>

    <?= $form->field($model, 'ReciboFechaFin')->textInput() ?>

    <?= $form->field($model, 'ReciboNumero')->textInput() ?>

    <?= $form->field($model, 'Recibocol')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'UsuarioID')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
