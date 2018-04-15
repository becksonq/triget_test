<?php
use yii\widgets\ListView;
/* @var $this yii\web\View */
/* @var $dataProvider frontend\controllers\RoomsController */
?>

<?= ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => '_rooms',
]) ?>

