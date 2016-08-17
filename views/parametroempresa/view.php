<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Usuarios */
$this->title = "Detalle de Parametro";
$this->params['breadcrumbs'][] = ['label' => 'Parametros', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
if ($model->Departamento_DepartamentoID) {
  $label = 'Departamento';
  $valor = $model->departamentoDepartamento->DepartamentoNombre;
}
elseif ($model->EmpresaID) {
  $label = 'Empresa';
  $valor = $model->empresa->EmpresaNombre;
}
?>
<div class="parametroempresa-view">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
        </div>
        <div class="box-body">
          <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'ParametroID',
                'ParametroNombre',
                'ParametroValor',
                'ParametroFechaReg',
                [
                  'label' => $label,
                  'value' => $valor
                ],
            ],
            ]) ?>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12" style="text-align: center;">
            <p>
              <?= Html::a('Modificar', ['update', 'id' => $model->EmpresaID], ['class' => 'btn btn-success']) ?>
            </p>
          </div>
        </div>
      </div>
  </div>
</div>
