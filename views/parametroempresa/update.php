<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Parametroempresa */

$this->title = 'Modificar Parametro';
$this->params['breadcrumbs'][] = ['label' => 'Parametros', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Parametro '.$model->ParametroID, 'url' => ['view', 'id' => $model->ParametroID]];
$this->params['breadcrumbs'][] = 'Modificar Parametro';
?>
<div class="parametroempresa-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
