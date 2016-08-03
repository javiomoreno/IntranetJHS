<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

$this->title = 'Cargar Archivo';
$this->params['breadcrumbs'][] = ['label' => 'Recibos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cargar-archivo" >
	<div class="row">
		<div class="col-xs-12">
			<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
				<div class="box">
					<div class="box-header">
					</div>
					<div class="box-body">
						<div class="page-content">
						  <div class="row">
								<div class="col-xs-12" style="text-align: -webkit-center; text-align: -moz-center;">
									<!-- PAGE CONTENT BEGINS -->
									<div class="center" style="width:400px; margin:12px;">
										<h3 class="header red smaller lighter">
											Seleccione Archivo
										</h3>
											<?= $form->field($model, 'archivo')->fileInput()->label(false) ?>

											<div class="hr hr-12 dotted"></div>

											<button type="submit" class="btn btn-sm btn-primary">Cargar</button>
											<button type="reset" class="btn btn-sm">Limpiar</button>
									</div><!-- PAGE CONTENT ENDS -->
								</div><!-- /.col -->
							</div>
						</div>
					</div>
				</div>
			<?php ActiveForm::end(); ?>
		</div>
	</div>
</div>
