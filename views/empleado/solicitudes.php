<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\UsuariosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Solicitudes';
$this->params['breadcrumbs'][] = $this->title;
setlocale(LC_ALL,"es_VE");
$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

?>
<div class="solicitudes-index">
    <p>
        <?= Html::a(Html::tag('i', '', ['class' => 'fa fa-file']).' Nueva Solicitud', ['create-solicitud'], ['class' => 'btn btn-success'] );?>
        <?php if (isset($model)): ?>
          <?= Html::a(Html::tag('i', '', ['class' => 'fa fa-file']).' Imprimir', ['imprimir-solicitud'], ['class' => 'btn btn-primary', 'target' => '_blank'] );?>
        <?php endif ?>
    </p>
    <?php if (isset($model)): ?>
      <div class="row cuerpo">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header" style="text-align:center">
              <img src="../imagenes/header-documento.png" alt="" />
            </div>
            <div class="box-body">
              <div class="row">
                <div class="row" style="text-align:center; font-weight: bold;">
                  <h3>CONSTANCIA DE TRABAJO</h3>
                </div>
                <br>
              </div>
              <div class="row">
                <div class="col-lg-12">
                  <p>
                    Hacemos constar, por este medio, que la persona cuyos datos son suministramos a continuación presta sus servicios para nuestra Empresa:
                  </p>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12" style="float: left">
                  <h3>DATOS PERSONALES:</h3>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                  <p>
                    Nombres y Apellidos:
                  </p>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-7">
                  <p style="font-weight: bold">
                    <?= strtoupper($model->UsuarioNombre)." ".strtoupper($model->UsuarioApellido);?>
                  </p>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                  <p>
                    Cédula:
                  </p>
                </div>
                <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
                  <p style="font-weight: bold">
                    <?= strtoupper($model->UsuarioCedula);?>
                  </p>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                  <p>
                    Fecha de Ingreso:
                  </p>
                </div>
                <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
                  <p style="font-weight: bold">
                    <?= strtoupper($model->UsuarioFechaIng);?>
                  </p>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                  <p>
                    Cargo:
                  </p>
                </div>
                <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
                  <p style="font-weight: bold">
                    <?= strtoupper($model->cargo->CargoNombre);?>
                  </p>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                  <p>
                    Sueldo Basico Mensual:
                  </p>
                </div>
                <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
                  <p style="font-weight: bold">
                    <?= $model2;?>
                  </p>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-lg-12">
                  <p>
                    Constancia que se emite a petición de la parte interesada, sin enmiendas ni tachaduras, a los <?= date("d");?> días del mes de <?= $meses[date("n") - 1];?> de <?= date("Y");?>.
                  </p>
                </div>
              </div>
              <br><br>
              <div class="row" style="text-align:center">
                <div class="col-lg-12">
                  Atentamente,
                </div>
              </div>
              <br>
              <div class="row" style="text-align:center; font-weight: bold;">
                <div class="col-lg-12">
                  __________________________
                </div>
              </div>
              <div class="row" style="text-align:center; font-weight: bold;">
                <div class="col-lg-12">
                  Jhosevalen Bolívar
                </div>
              </div>
              <div class="row" style="text-align:center; font-weight: bold;">
                <div class="col-lg-12">
                  Relacionista Laboral.
                </div>
              </div>
              <div class="row" style="text-align:center; font-weight: bold;">
                <div class="col-lg-12">
                  SERVICIOS JHS 2013, C.A.
                </div>
              </div>
              <div class="row" style="text-align:center; font-weight: bold;">
                <div class="col-lg-12">
                  0242.361.57.87
                </div>
              </div>
              <br><br><br><br>
              <div style="text-align:center">
                <img src="../imagenes/pie-documento.png" alt="" />
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php endif; ?>
</div>
