<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Empresa */

$this->title = 'Modificar Empresa';
$this->params['breadcrumbs'][] = ['label' => 'Empresas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Empresa '.$model->EmpresaID, 'url' => ['view', 'id' => $model->EmpresaID]];
$this->params['breadcrumbs'][] = 'Modificar Empresa';
?>
<div class="empresa-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
