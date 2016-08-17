<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\bootstrap\Modal;

$this->title = 'Guardar Registros';
$this->params['breadcrumbs'][] = ['label' => 'Recibos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$count = count($model2);
?>
<div class="guardar-archivo">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<h3>
						<small style="float:right; padding-top: 10px;">
							Registros a Guardar <?php echo $count;?>
						</small>
					</h3>
				</div>
				<div class="box-body">
					<div class="row">
						<div class="col-xs-12">
							<?php if (Yii::$app->session->hasFlash('noGuardo')): ?>
								<div class="alert alert-danger">
									No se guardo
								</div>
							<?php endif; ?>
							<div>
								<table id="tabla-cargar-registros" class="table table-striped table-bordered table-hover">
									<thead>
										<tr>
											<th style="text-align:center">Fecha Recibo</th>
											<th style="text-align:center">Cédula</th>
											<th style="text-align:center">Número de Recibo</th>
											<th style="text-align:center">Sueldo Diario</th>
											<th style="text-align:center">Sueldo Semanal</th>
											<th style="text-align:center">Cantidad Total</th>
											<th style="text-align:center">Asignación</th>
											<th style="text-align:center">Retención</th>
											<th style="text-align:center">Deducción</th>
										</tr>
									</thead>
									<tbody>
										<?php for ($i = 0; $i < $count; $i ++) {?>
											<tr>
												<td style="text-align:center"><?= $model2[$i]['fechreci']?></td>
												<td style="text-align:center"><?= $model2[$i]['ceduempl']?></td>
												<td style="text-align:center"><?= $model2[$i]['numereci']?></td>
												<td style="text-align:center"><?= $model2[$i]['sueldiar']?></td>
												<td style="text-align:center"><?= $model2[$i]['suelsema']?></td>
												<td style="text-align:center"><?= $model2[$i]['canttota']?></td>
												<td style="text-align:center"><?= $model2[$i]['asignaci']?></td>
												<td style="text-align:center"><?= $model2[$i]['retencio']?></td>
												<td style="text-align:center"><?= $model2[$i]['deduccio']?></td>
												<!--<?php for ($j = 0; $j < count($model2[$i]['codigos']); $j ++) { ?>
													<td style="text-align:center"><?= $model2[$i]['codigos'][$j]['codigo']?></td>
												<?php }?>-->
											</tr>
											<?php } ?>
										</tbody>
									</table>
									<div class="row center">
										<div class="col-lg-12">
											<?php echo Html::a('Guardar Registros', FALSE, ['onclick' => 'CargarRegistros()', 'class' => 'btn btn-primary showModalButton'] );?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
</div>
<?php
  Modal::begin([
	      'header' => '<h2>Cargando Registros</h2>',
      'id' => 'modal',
      'size' => 'modal-md',]);

  echo "<div id='modalContent'>
					<div class='box box-info box-solid'>
						<div class='box-header'>
							<h3 class='box-title'>Cargando Registros</h3>
						</div>
						<div class='box-body'>
							Espere mientras se cargan los registros a la base de datos
						</div>
						<!-- Loading (remove the following to stop the loading)-->
						<div class='overlay'>
							<i class='fa fa-refresh fa-spin'></i>
						</div>
					</div>
				</div>";

  Modal::end();
?>

<?php
  Modal::begin([
	      'header' => '<h2>Error al Cargar los Registros</h2>',
      'id' => 'modal2',
      'size' => 'modal-md',
			'footer' => ''.Html::a('Aceptar', ['cargar-archivo'], ['class' => 'btn btn-sm btn-primary']),
		]);

  echo "<div id='modalContent2'>
			error en el archivo
				</div>";

  Modal::end();
?>
<script type="text/javascript">
	function CargarRegistros(){
		var model = <?php echo json_encode($model2);?>;
		var url = "<?php echo Url::toRoute('recibo/index');?>";
		$.ajax({
      	url: '../recibo/cargar-registros',
				type: 'POST',
				data: {model: model},
				success: function(data){
						$('#modal').modal('hide');
						window.location.href = url;
        },
				error: function(){
					$('#modal').modal('hide');
					if ($('#modal2').data('bs.modal').isShown) {
			        $('#modal2').find('#modalContent2')
			                .load($(this).attr('value'));
			    } else {
			        $('#modal2').modal('show')
			                .find('#modalContent2')
			                .load($(this).attr('value'));
			    }
				}
      });
	}

	$(function () {
    $('#tabla-cargar-registros').DataTable({
      responsive: true,
      "aoColumns": [
        { "bSortable": true },
        null, null, null, null, null, null, null,
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

	$(document).on('click', '.showModalButton', function(){
	    if ($('#modal').data('bs.modal').isShown) {
	        $('#modal').find('#modalContent')
	                .load($(this).attr('value'));
	    } else {
	        $('#modal').modal('show')
	                .find('#modalContent')
	                .load($(this).attr('value'));
	    }
	});
</script>
