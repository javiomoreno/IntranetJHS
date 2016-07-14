<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\UsuariosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Parametros';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="parametroempresa-index">
    <p>
        <?= Html::a(Html::tag('i', '', ['class' => 'fa fa-file']).' Nuevo Parametro', ['create'], ['class' => 'btn btn-success'] );?>
    </p>
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
          </div>
          <div class="box-body">
            <table id="dataTable" class="table table-bordered table-hover">
              <thead>
              <tr>
                <th>Código</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Fecha de Registro</th>
                <th>Empresa</th>
                <th>Departamento</th>
                <th style="text-align: center;">Opciones</th>
              </tr>
              </thead>
              <tbody>
                <?php foreach ($model as $value): ?>
                  <tr class="odd gradeX">
                      <td><?= $value->ParametroID;?></td>
                      <td><?= $value->ParametroNombre;?></td>
                      <td><?= $value->ParametroValor;?></td>
                      <td><?= $value->ParametroFechaReg;?></td>
                      <td>
                        <?php
                          if ($value->EmpresaID) {
                            echo $value->empresa->EmpresaNombre;
                          }
                          else {
                            echo "";
                          }
                        ?>
                      </td>
                      <td>
                        <?php
                          if ($value->Departamento_DepartamentoID) {
                            echo $value->departamentoDepartamento->DepartamentoNombre;
                          }
                          else {
                            echo "";
                          }
                        ?>
                      </td>
                      <td style="text-align: center;">
                        <?= Html::a(Html::tag('span', '', ['class' => 'glyphicon glyphicon-eye-open green', 'style' => 'cursor: pointer']).'', ['parametroempresa/view?id='.$value->ParametroID], '' );?>
                        <?= Html::a(Html::tag('span', '', ['class' => 'glyphicon glyphicon-pencil blue', 'style' => 'cursor: pointer']).'', ['/parametroempresa/update?id='.$value->ParametroID], '' );?>
                      </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
</div>
<script>
  $(function () {
    $('#dataTable').DataTable({
      responsive: true,
      "aoColumns": [
        { "bSortable": true },
        null, null, null, null, null,
        { "bSortable": false }
      ],
      "language": {
        "lengthMenu": "_MENU_ Registros por pantalla",
        "zeroRecords": "No Hay Datos - Disculpe",
        "info": "Vista página _PAGE_ de _PAGES_",
        "infoEmpty": "No hay registros disponibles",
        "infoFiltered": "(filtered from _MAX_ total records)",
        "sSearch": "Buscar:",
        "oPaginate": {
            "sFirst":    "Primero",
            "sLast":     "Ultimo",
            "sNext":     "Siguiente",
            "sPrevious": "Anterior"
        },
      },
      "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "Todos"]]
    });
  });
</script>
