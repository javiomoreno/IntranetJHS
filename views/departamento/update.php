<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Departamento */

$this->title = 'Modificar Departamento';
$this->params['breadcrumbs'][] = ['label' => 'Departamentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->DepartamentoID, 'url' => ['view', 'id' => $model->DepartamentoID]];
$this->params['breadcrumbs'][] = 'Modificar Departamento';
?>
<div class="departamento-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
