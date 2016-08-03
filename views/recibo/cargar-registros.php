<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

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
											<th style="text-align:center">Vector Codigos</th>
										</tr>
									</thead>
									<tbody>
										<?php for ($i = 0; $i < $count; $i ++) {?>
											<tr>
												<td style="text-align:center"><?= $model2[$i]['fechreci']?></td>
												<td style="text-align:center"><?= $model2[$i]['ceduempl']?></td>
												<td style="text-align:center"><?= $model2[$i]['numereci']?></td>
												<?php for ($j = 0; $j < count($model2[$i]['codigos']); $j ++) { ?>
													<td style="text-align:center"><?= $model2[$i]['codigos'][$j]['codigo']?></td>
												<?php }?>
											</tr>
											<?php } ?>
										</tbody>
									</table>
									<div class="row center">
										<div class="col-lg-12">
											<?php echo Html::a('Guardar Registros', ['cargar-registros', 'model'=>$model2], ['class' => 'btn btn-primary'] );?>
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
