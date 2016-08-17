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
          <div style="border: 1px solid #000; padding: 10px">
            <div class="row">
              <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                FECHA: <?= date("d")."/".date("m")."/".date("Y");?>
              </div>
              <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                PERIODO DESDE: que coloco aqui
              </div>
              <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                HASTA: que coloco aqui
              </div>
              <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                N° Recibo: <?= $modelRecibo->ReciboNumero;?>
              </div>
            </div>
          </div>
          <div style="border: 1px solid #000; padding: 10px">
            <div class="row">
              <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                TRABAJADOR: <?= $modelUsuario->UsuarioCedula."  ".$modelUsuario->UsuarioNombre.", ".$modelUsuario->UsuarioApellido;?>
              </div>
              <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                CÉDULA: <?= "V-".$modelUsuario->UsuarioCedula?>
              </div>
              <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                FECHA INGRESO: <?= date("d/m/Y", strtotime($modelUsuario->UsuarioFechaIng));?>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                SUELDO MENSUAL: <?= $modelRecibo->ReciboSuelMens;?>
              </div>
              <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                DEPARTAMENTO: aqui falta
              </div>
              <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                CARGO: <?= $modelUsuario->cargo->CargoID."    ".$modelUsuario->cargo->CargoNombre;?>
              </div>
            </div>
          </div>
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
