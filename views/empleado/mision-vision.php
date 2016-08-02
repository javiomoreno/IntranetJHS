<?php

use yii\helpers\Html;
use app\models\Usuario;

$this->title = 'Misión y Visión';
$usuario =  Usuario::findIdentity(\Yii::$app->user->getId());
?>
<div class="jumbotron">
<div class="row">
	<div class="col-lg-2"></div>
	<div class="col-lg-8">
		<h1>Misión</h1>
		<p class="text-justify">
		  Ser los mejores en aquello que nos planteemos hacer, para garantizar productos y servicios a los clientes de excelente calidad, solidez a los proveedores, rentabilidad a los accionistas y la oportunidad de un futuro mejor para todos los colaboradores.
		</p>
		<h1>Visión</h1>
		<p class="text-justify">
		  Consolidarnos como Grupo líder a nivel Nacional, en el desarrollo de la Independencia Alimentaria del País, garantizando calidad total en nuestros productos a través de un estricto control  en los distintos eslabones involucrados en la cadena, para así lograr el mayor éxito en todo lo que nos propongamos. 
		</p>
	</div>
	<div class="col-lg-2"></div>
</div>
</div>
