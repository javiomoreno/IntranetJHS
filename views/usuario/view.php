<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Usuarios */
$this->title = "Detalle de Usuario";
$this->params['breadcrumbs'][] = ['label' => 'Usuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuarios-view">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
        </div>
        <div class="box-body">
          <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
              'UsuarioID',
              'UsuarioNombre',
              'UsuarioApellido',
              'UsuarioCedula',
              'UsuarioCorreo',
              [                      // the owner name of the model
                'label' => 'Clave de Acceso',
                'value' => '*********',
              ],
              'UsuarioFechaNac',
              'UsuarioFechaIng',
              'UsuarioBanco',
              'UsuarioCuentaBanco',
              'UsuarioFechaReg',
              'rol.RolNombre',
              'empresa.EmpresaNombre',
              'cargo.CargoNombre',
            ],
            ]) ?>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12" style="text-align: center;">
            <p>
              <?= Html::a('Modificar', ['update', 'id' => $model->UsuarioID], ['class' => 'btn btn-primary']) ?>
            </p>
          </div>
        </div>
      </div>
  </div>
</div>
