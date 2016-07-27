<?php

use yii\helpers\Html;
use app\models\Usuario;

$this->title = 'Perfil';
$usuario =  Usuario::findIdentity(\Yii::$app->user->getId());
?>
<div class="jumbotron">
<h1>Perfil</h1>
<p>
  Bienvenido
</p>
</div>
