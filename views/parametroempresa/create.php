<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Parametroempresa */

$this->title = 'Nuevo Parametro';
$this->params['breadcrumbs'][] = ['label' => 'Parametros', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="parametroempresa-create">
  
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
