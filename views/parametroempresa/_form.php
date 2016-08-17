<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Empresa */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="parametroempresa-form">
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
            <?= $form->field($model, 'ParametroNombre')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'ParametroValor')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'EmpresaID')->dropDownList($model->listaEmpresas, ['prompt' => 'Seleccione Empresa' ])->label('Empresa <span class="asterisco">*</span>');?>

            <?= $form->field($model, 'Departamento_DepartamentoID')->dropDownList($model->listaDepartamentos, ['prompt' => 'Seleccione Departamento' ])->label('Departamento <span class="asterisco">*</span>');?>

            <div class="row">
              <div class="col-lg-12" style="text-align: center;">
                <div class="form-group">
                    <?= Html::submitButton($model->isNewRecord ? 'Guardar' : 'Modificar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-success']) ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php ActiveForm::end(); ?>
    </div>
  </div>
</div>
