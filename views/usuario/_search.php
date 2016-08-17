<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\UsuarioSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuario-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'UsuarioID') ?>

    <?= $form->field($model, 'UsuarioNombre') ?>

    <?= $form->field($model, 'UsuarioApellido') ?>

    <?= $form->field($model, 'UsuarrioCedula') ?>

    <?= $form->field($model, 'UsuarioCorreo') ?>

    <?php // echo $form->field($model, 'UsuarioClave') ?>

    <?php // echo $form->field($model, 'UsuarioFechaNac') ?>

    <?php // echo $form->field($model, 'UsuarioFechaIng') ?>

    <?php // echo $form->field($model, 'UsuarioBanco') ?>

    <?php // echo $form->field($model, 'UsuarioCuentaBanco') ?>

    <?php // echo $form->field($model, 'UsuarioFechaReg') ?>

    <?php // echo $form->field($model, 'RolID') ?>

    <?php // echo $form->field($model, 'EmpresaID') ?>

    <?php // echo $form->field($model, 'CargoID') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
