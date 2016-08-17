<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Recibo */

$this->title = "Recibo: ".$modelRecibo->ReciboNumero;
$this->params['breadcrumbs'][] = ['label' => 'Recibos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<style media="screen">
  .recibo-view{
    font-size: 10px;
  }
</style>
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
          <div>
            <div class="row" style="padding: 10px;">
              <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1" style="border: 1px solid #000;">
                CÓDIGO
              </div>
              <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3" style="border: 1px solid #000;">
                DESCRIPCIÓN
              </div>
              <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2" style="border: 1px solid #000;">
                VALOR AUXILIAR
              </div>
              <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2" style="border: 1px solid #000;">
                ASIGNACIONES
              </div>
              <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2" style="border: 1px solid #000;">
                DEDUCCIONES
              </div>
              <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2" style="border: 1px solid #000;">
                NETO A COBRAR
              </div>
            </div>
          </div>
          <div>
            <div class="row" style="margin-top: -10px; padding-right: 10px; padding-left: 10px;">
              <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1" style="border: 1px solid #000;">
                <?php foreach ($modelParametro as $value): ?>
                  <?= $value->ParametroCodigo;?>
                <?php endforeach; ?>
              </div>
              <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3" style="border: 1px solid #000;">
                <?php foreach ($modelParametro as $value): ?>
                  <?= $value->ParametroCodigo;?>
                  <br>
                <?php endforeach; ?>
              </div>
              <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2" style="border: 1px solid #000;">
                <?php foreach ($modelParametro as $value): ?>
                  <?= $value->ParametroValorAuxiliar;?>
                  <br>
                <?php endforeach; ?>
              </div>
              <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2" style="border: 1px solid #000;">
                <?php foreach ($modelParametro as $value): ?>
                  <?php if (substr($value->ParametroCodigo, 0, 1) == "A" ): ?>
                    <?= $value->ParametroValor;?>
                  <?php else: ?>
                    0
                  <?php endif;?>
                  <br>
                <?php endforeach; ?>
              </div>
              <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2" style="border: 1px solid #000;">
                <?php foreach ($modelParametro as $value): ?>
                  <?php if (substr($value->ParametroCodigo, 0, 1) == "R" ): ?>
                    <?= $value->ParametroValor;?>
                  <?php else: ?>
                    0
                  <?php endif;?>
                  <br>
                <?php endforeach; ?>
              </div>
              <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2" style="border: 1px solid #000;">
                <?php foreach ($modelParametro as $value): ?>
                  <br>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
          <div>
            <div class="row" style="padding-left: 10px;">
              <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                <div class="row">
                  <div class="col-lg-12" style=" padding: 10px; border: 1px solid #000;">
                    <br>
                    Recibi Conforme <br><br>
                    _______________________________
                  </div>
                </div>
              </div>
              <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2" style="border: 1px solid #000; margin-left: -4px;">
                Total Trabajador
              </div>
              <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2" style="border: 1px solid #000; margin-left: -2px;">
                <?= $modelRecibo->ReciboAsignacion ?>
              </div>
              <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2" style="border: 1px solid #000; margin-left: -2px;">
                <?= (intval($modelRecibo->ReciboDeduccion) + intval($modelRecibo->ReciboRetencion)); ?>
              </div>
              <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2" style="border: 1px solid #000; ">
                <?= $modelRecibo->ReciboTotal ?>
              </div>
            </div>
          </div>
          <div>
            <div class="row" style="padding-left: 10px;">
              <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
              </div>
              <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8" style="border: 1px solid #000; margin-left: -4px; margin-top: -60px;">
                <br>
                Banco: <?= $modelUsuario->UsuarioBanco?><br><br>
                CUENTA: <?= $modelUsuario->UsuarioCuentaBanco?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
