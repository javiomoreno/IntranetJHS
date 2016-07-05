<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Empresa */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="empresa-form">
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
            <?= $form->field($model, 'EmpresaNombre')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'EmpresaDescripcion')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'EmpresaRIF')->textInput(['maxlength' => true]) ?>

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
