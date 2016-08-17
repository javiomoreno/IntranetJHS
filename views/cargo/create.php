<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Cargo */

$this->title = 'Nuevo Cargo';
$this->params['breadcrumbs'][] = ['label' => 'Cargos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cargo-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
