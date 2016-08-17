<?php

use yii\helpers\Html;
use app\models\Usuario;

$this->title = 'Valores';
$usuario =  Usuario::findIdentity(\Yii::$app->user->getId());
?>
<div class="jumbotron">
<h1>Valores Corporativos</h1>
<div class="row">
	<div class="col-lg-2"></div>
	<div class="col-lg-8">
		<p class="text-justify">
		  Son elementos propios  de la cultura empresarial de las condiciones del entorno  y de las características competitivas de la organización
		</p>
		<h3 class="text-left">HUMILDAD</h3>
		<p class="text-justify">
			Esta es una clara característica de toda empresa que disfruta del éxito,  autoexigentes, con altos deseos de triunfar, que reconocen y aprenden de sus errores convirtiéndolos en oportunidades de éxito, sensibles a la innovación, al cambio y al mejoramiento contínuo.
		</p>
		<h3 class="text-left">ACTITUD DE DUEÑO</h3>
		<p class="text-justify">
			Transmitir claridad en nuestras funciones y responsabilidades. Construir relaciones sólidas con nuestros clientes y socios externos, tomar decisiones inteligentes, gestionar de forma eficiente los recursos de nuestra compañía y asumir la responsabilidad de lograr los resultados acordados.
		</p>
		<h3 class="text-left">VISIÓN SOCIAL</h3>
		<p class="text-justify">
			Comprometidos en nuestra labor social de realizar, minimizar y ayudar en las necesidades de las comunidades colaborando  con emprendimientos de grupos de interés para el bienestar y ayuda. 
		</p>
		<h3 class="text-left">PLANIFICACIÓN</h3>
		<p class="text-justify">
			Seleccionamos los actos futuros mas apropiados para producir los resultados esperados, se trata de una metodología para la selección de las alternativas.
		</p>
		<h3 class="text-left">DETERMINACIÓN</h3>
		<p class="text-justify">
			Nos abre el camino hacia un paso firme, claro y exacto en nuestra empresa  orientado hacia la toma de decisiones, proyectos e iniciativas en cada uno de nuestros objetivos.
		</p>
		<h3 class="text-left">DISCIPLINA</h3>
		<p class="text-justify">
			Suele ser una carta de presentación; ser disciplinado  es seguir un plan trazado a conciencia, ponerse objetivos y luchar hasta alcanzarlos, separar las cosas personales de los de la empresa, respetar los recursos del negocio como tal, y en general, tener la convicción de terminar y no dejar a medias las cosas que sean importantes para la propia formación de un proyecto exitoso.
		</p>
		<h3 class="text-left">DISPONIBILIDAD</h3>
		<p class="text-justify">
			Preparados y dispuestos siempre con actitud positiva. 
		</p>
		<h3 class="text-left">FRANQUEZA</h3>
		<p class="text-justify">
			Comprometidos en actuar siempre con la verdad ante cualquier situación o circunstancia que aborde nuestro día a día.
		</p>
		<h3 class="text-left">SIMPLICIDAD</h3>
		<p class="text-justify">
			Somos una empresa  innovadora,  restamos  lo obvio y añadimos lo significativo transmitiendo de forma clara y precisa una sola idea un solo concepto.
		</p>
	</div>
	<div class="col-lg-2"></div>
</div>
</div>
