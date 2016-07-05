<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Usuario */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuario-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'UsuarioID')->textInput() ?>

    <?= $form->field($model, 'UsuarioNombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'UsuarioApellido')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'UsuarrioCedula')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'UsuarioCorreo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'UsuarioClave')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'UsuarioFechaNac')->textInput() ?>

    <?= $form->field($model, 'UsuarioFechaIng')->textInput() ?>

    <?= $form->field($model, 'UsuarioBanco')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'UsuarioCuentaBanco')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'UsuarioFechaReg')->textInput() ?>

    <?= $form->field($model, 'RolID')->textInput() ?>

    <?= $form->field($model, 'EmpresaID')->textInput() ?>

    <?= $form->field($model, 'CargoID')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
