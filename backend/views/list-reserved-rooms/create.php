<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\ListReservedRooms */

$this->title = 'Добавить бронирование';
$this->params['breadcrumbs'][] = ['label' => 'Забронированные номера', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="list-reserved-rooms-create">

	<h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
