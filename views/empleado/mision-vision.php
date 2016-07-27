<?php

use yii\helpers\Html;
use app\models\Usuario;

$this->title = 'Misión y Visión';
$usuario =  Usuario::findIdentity(\Yii::$app->user->getId());
?>
<div class="jumbotron">
<h1>Misión y Visión</h1>
<p>
  Bienvenido
</p>
</div>
