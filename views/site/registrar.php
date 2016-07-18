<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\jui\DatePicker;
?>

<div class="register-box">
  <div class="login-logo">
      <a href="#"><img src="imagenes/logo.png" /></a>
  </div>

  <div class="row">
      <div class="col-md-12">
        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
            <div class="box-body">
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                  <?= $form->field($model, 'CurriculumNombre')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                  <?= $form->field($model, 'CurriculumApellido')->textInput(['maxlength' => true]) ?>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                  <?= $form->field($model, 'CurriculumCedula')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                  <?= $form->field($model, 'CurriculumFechNaci')->widget(DatePicker::className(), ['dateFormat' => 'dd-MM-yyyy', 'options' => ['class' => 'form-control'],]) ?>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                  <?= $form->field($model, 'CurriculumLugNaci')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                  <?= $form->field($model, 'Sexo_SexoID')->dropDownList($model->listaSexos, ['prompt' => 'Seleccione Sexo' ])->label('Sexo <span class="asterisco">*</span>');?>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                  <?= $form->field($model, 'CurriculumDireccion')->textInput(['maxlength' => true]) ?>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                  <?= $form->field($model, 'CurriculumTeleFijo')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                  <?= $form->field($model, 'CurriculumTeleCelu')->textInput(['maxlength' => true]) ?>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                  <?= $form->field($model, 'CurriculumEmail')->textInput(['maxlength' => true]) ?>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                  <?= $form->field($model, 'CurriculumExpeLabo')->textInput(['maxlength' => true]) ?>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                  <?= $form->field($model, 'CurriculumEstuReal')->textInput(['maxlength' => true]) ?>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                  <?= $form->field($model, 'CurriculumCursReal')->textInput(['maxlength' => true]) ?>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                  <?= $form->field($model, 'CurriculumDisponibilidad')->dropDownList($model->listaDisponibilidades, ['prompt' => 'Seleccione Disponibilidad' ])->label('Disponibilidad <span class="asterisco">*</span>');?>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                  <?= $form->field($modelArchivo, 'archivoFile')->fileInput() ?>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-12" style="text-align: center;">
                  <div class="form-group">
                      <?= Html::submitButton($model->isNewRecord ? 'Guardar' : 'Modificar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-success']) ?>
                  </div>
                </div>
              </div>
            </div>
        <?php ActiveForm::end(); ?>
      </div>
  </div>
</div>
