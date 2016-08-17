<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\ParametrooSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Parametros';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="parametro-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Parametro', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ParametroID',
            'ParametroCodigo',
            'ParametroDescripcion',
            'ParametroValorAuxiliar',
            'ParametroAsignaciones',
            // 'ParametroDeducciones',
            // 'ParametroNetoaCobrar',
            // 'ParametroFechaReg',
            // 'ReciboID',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
