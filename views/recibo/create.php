<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Recibo */

$this->title = 'Create Recibo';
$this->params['breadcrumbs'][] = ['label' => 'Recibos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recibo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
