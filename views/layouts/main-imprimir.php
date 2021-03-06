<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title>JHS</title>
    <?php $this->head() ?>
</head>
<body onload="window.print()">
<?php $this->beginBody() ?>
<div class="wrap">
  <div class="container">
    <?= $content ?>
  </div>
</div>

<footer class="footer">
    <div class="container" style="text-align:center">
        <img src="../imagenes/pie-documento.png" alt="" />
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
