<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\ParametroempresaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="parametroempresa-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ParametroID') ?>

    <?= $form->field($model, 'ParametroNombre') ?>

    <?= $form->field($model, 'ParametroValor') ?>

    <?= $form->field($model, 'ParametroFechaReg') ?>

    <?= $form->field($model, 'EmpresaID') ?>

    <?php // echo $form->field($model, 'Departamento_DepartamentoID') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
