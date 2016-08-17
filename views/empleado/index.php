<?php

use yii\helpers\Html;
use app\models\Usuario;

$this->title = 'Inicio';
$usuario =  Usuario::findIdentity(\Yii::$app->user->getId());
?>
<div class="jumbotron">
<h1>Empleado</h1>
<p>
  Bienvenido
</p>
</div>
