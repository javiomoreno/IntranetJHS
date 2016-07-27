<?php

use yii\helpers\Html;
use app\models\Usuario;

$this->title = 'Solicitudes';
$usuario =  Usuario::findIdentity(\Yii::$app->user->getId());
?>
<div class="jumbotron">
<h1>Solicitudes</h1>
<p>
  Bienvenido
</p>
</div>
