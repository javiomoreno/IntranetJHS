<?php

use yii\helpers\Html;
use app\models\Usuario;

$this->title = 'Consultar Recibos';
$usuario =  Usuario::findIdentity(\Yii::$app->user->getId());
?>
<div class="jumbotron">
<h1>Consultar Recibos</h1>
<p>
  Bienvenido
</p>
</div>
