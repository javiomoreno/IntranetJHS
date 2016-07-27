<?php

use yii\helpers\Html;
use app\models\Usuario;

$this->title = 'La Empresa';
$usuario =  Usuario::findIdentity(\Yii::$app->user->getId());
?>
<div class="jumbotron">
<h1>La Empresa</h1>
<p>
  Bienvenido
</p>
</div>
