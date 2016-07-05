<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Usuario */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="usuario-form">
  <div class="row">
    <div class="col-xs-12">
      <?php $form = ActiveForm::begin(); ?>
        <div class="box">
          <div class="box-header">
            <p class="obligatorios">
              Los campos con * son obligatorios
            </p>
          </div>
          <div class="box-body">
              <?= $form->field($model, 'UsuarioNombre')->textInput(['maxlength' => true]) ?>

              <?= $form->field($model, 'UsuarioApellido')->textInput(['maxlength' => true]) ?>

              <?= $form->field($model, 'UsuarrioCedula')->textInput(['maxlength' => true]) ?>

              <?= $form->field($model, 'UsuarioCorreo')->textInput(['maxlength' => true]) ?>

              <?= $form->field($model, 'UsuarioClave')->passwordInput(['maxlength' => true]) ?>

              <?= $form->field($model, 'UsuarioFechaNac')->label('Fecha de Nacimiento <span class="asterisco">*</span>')->widget(DatePicker::className(), ['dateFormat' => 'yyyy-MM-dd', 'options' => ['class' => 'form-control'],]) ?>

              <?= $form->field($model, 'UsuarioFechaIng')->label('Fecha de Ingreso <span class="asterisco">*</span>')->widget(DatePicker::className(), ['dateFormat' => 'yyyy-MM-dd', 'options' => ['class' => 'form-control'],]) ?>

              <?= $form->field($model, 'UsuarioBanco')->textInput(['maxlength' => true]) ?>

              <?= $form->field($model, 'UsuarioCuentaBanco')->textInput(['maxlength' => true]) ?>

              <?= $form->field($model, 'RolID')->dropDownList($model->listaRoles, ['prompt' => 'Seleccione Rol del Usuario' ])->label('Rol de Usuario <span class="asterisco">*</span>');?>

              <?= $form->field($model, 'RolID')->dropDownList($model->listaEmpresas, ['prompt' => 'Seleccione Empresa del Usuario' ])->label('Empresa de Usuario <span class="asterisco">*</span>');?>

              <?= $form->field($model, 'RolID')->dropDownList($model->listaCargos, ['prompt' => 'Seleccione Cargo del Usuario' ])->label('Cargo de Usuario <span class="asterisco">*</span>');?>

              <div class="row">
                <div class="col-lg-12" style="text-align: center;">
                  <div class="form-group">
                      <?= Html::submitButton($model->isNewRecord ? 'Guardar' : 'Modificar', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
                  </div>
                </div>
              </div>
          </div>
        </div>
      <?php ActiveForm::end(); ?>
    </div>
  </div>
</div>
