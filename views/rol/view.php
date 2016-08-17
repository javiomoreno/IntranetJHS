<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Usuarios */
$this->title = "Detalle de Rol";
$this->params['breadcrumbs'][] = ['label' => 'Roles', 'url' => ['index']];
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
              'RolID',
              'RolNombre',
              'RolDescripcion',
              'RolFechaReg',
            ],
            ]) ?>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12" style="text-align: center;">
            <p>
              <?= Html::a('Modificar', ['update', 'id' => $model->RolID], ['class' => 'btn btn-success']) ?>
            </p>
          </div>
        </div>
      </div>
  </div>
</div>
