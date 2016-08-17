<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Parametro */

$this->title = $model->ParametroID;
$this->params['breadcrumbs'][] = ['label' => 'Parametros', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="parametro-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ParametroID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ParametroID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ParametroID',
            'ParametroCodigo',
            'ParametroDescripcion',
            'ParametroValorAuxiliar',
            'ParametroAsignaciones',
            'ParametroDeducciones',
            'ParametroNetoaCobrar',
            'ParametroFechaReg',
            'ReciboID',
        ],
    ]) ?>

</div>
