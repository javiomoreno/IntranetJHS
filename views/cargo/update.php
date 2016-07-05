<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Cargo */

$this->title = 'Modificar Cargo';
$this->params['breadcrumbs'][] = ['label' => 'Cargos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Cargo '.$model->CargoID, 'url' => ['view', 'id' => $model->CargoID]];
$this->params['breadcrumbs'][] = 'Modificar Cargo';
?>
<div class="cargo-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
