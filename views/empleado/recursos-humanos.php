<?php

use yii\helpers\Html;
use app\models\Usuario;

$this->title = 'Recursos Humanos';
$usuario =  Usuario::findIdentity(\Yii::$app->user->getId());
?>
<div class="jumbotron">
<h1>Recursos Humanos</h1>
<p>
  Bienvenido
</p>
</div>
