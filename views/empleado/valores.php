<?php

use yii\helpers\Html;
use app\models\Usuario;

$this->title = 'Valores';
$usuario =  Usuario::findIdentity(\Yii::$app->user->getId());
?>
<div class="jumbotron">
<h1>Valores</h1>
<p>
  Bienvenido
</p>
</div>
