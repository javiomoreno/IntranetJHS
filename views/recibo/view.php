<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Recibo */

$this->title = "Recibo: ".$modelRecibo->ReciboNumero;
$this->params['breadcrumbs'][] = ['label' => 'Recibos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recibo-view">

  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
        </div>
        <div class="box-body">
          <div class="row">
            <div class="col-lg-3">
              <?= $modelUsuario->UsuarioCedula;?>
            </div>
            <div class="col-lg-3">
              <?= strtoupper($modelUsuario->UsuarioApellido).", ".strtoupper($modelUsuario->UsuarioNombre);?>
            </div>
            <div class="col-lg-3">
              C. <?= $modelUsuario->UsuarioCedula;?>
            </div>
            <div class="col-lg-3">
              Cargo <?= $modelUsuario->cargo->CargoNombre;?>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-3">
              Fecha de Ingreso <?= $modelUsuario->UsuarioFechaIng;?>
            </div>
            <div class="col-lg-3">
              Sueldo Diario: <?= $modelRecibo->ReciboSuelDiar;?>
            </div>
            <div class="col-lg-3">
              Sueldo Semanal: <?= $modelRecibo->ReciboSuelSema;?>
            </div>
            <div class="col-lg-3">
              Sueldo Mensual: <?= $modelRecibo->ReciboSuelMens;?>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-3">
              <strong>Número de <?= $modelRecibo->ReciboNumero;?></strong>
            </div>
          </div>
          <?php foreach ($modelParametro as $value): ?>
            <div class="row">
              <div class="col-lg-2">
                <?= $modelRecibo->ReciboFecha;?>
              </div>
              <div class="col-lg-2">
                <?= $value->ParametroCodigo;?>
              </div>
              <div class="col-lg-2">
                aqui falta
              </div>
              <div class="col-lg-2">
                <?= $value->ParametroValorAuxiliar;?>
              </div>
              <div class="col-lg-2">
                <?= $value->ParametroValor?>
              </div>
              <div class="col-lg-2">
                Aqui Falta
              </div>
            </div>
          <?php endforeach; ?>
          <div class="row">
            <div class="col-lg-3">
              Asignación: <?= $modelRecibo->ReciboAsignacion;?>
            </div>
            <div class="col-lg-3">
              Deducción: <?= $modelRecibo->ReciboDeduccion;?>
            </div>
            <div class="col-lg-3">
              Retención: <?= $modelRecibo->ReciboRetencion;?>
            </div>
            <div class="col-lg-3">
              Total: 
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
