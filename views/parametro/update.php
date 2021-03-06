<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Parametro */

$this->title = 'Update Parametro: ' . $model->ParametroID;
$this->params['breadcrumbs'][] = ['label' => 'Parametros', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ParametroID, 'url' => ['view', 'id' => $model->ParametroID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="parametro-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
