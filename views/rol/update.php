<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Rol */

$this->title = 'Modificar Rol';
$this->params['breadcrumbs'][] = ['label' => 'Roles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Rol '.$model->RolID, 'url' => ['view', 'id' => $model->RolID]];
$this->params['breadcrumbs'][] = 'Modificar Rol';
?>
<div class="rol-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
