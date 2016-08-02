<?php

use yii\helpers\Html;
use app\models\Usuario;

$this->title = 'La Empresa';
$usuario =  Usuario::findIdentity(\Yii::$app->user->getId());
?>
<div class="jumbotron">
<h1>La Empresa</h1>
<p>&nbsp;</p>
<div class="row">
	<div class="col-lg-2"></div>
	<div class="col-lg-8">
		<p class="text-justify">
		  Grupo Empresarial Venezolano  de origen andino apostando a la soberanía alimentaria afianzados y consolidados  en el desarrollo de la producción Avícola, Ganadera y de alimentos balanceados para animales con la  mas alta tecnología de punta, nuestra actividad también comprende la comercialización, industrialización de nuestros productos agropecuarios. En el Grupo JHS nos impulsa el compromiso y la excelencia en cada una de las actividades que realizamos y a través de nuestras unidades del negocio nos hemos consolidado como una empresa solida y estable creciendo y avanzando cada día mas
		</p>
	</div>
	<div class="col-lg-2"></div>
</div>
</div>
