<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\ListReservedRooms */

$this->title = 'Редактировать забронированный номер: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Забронированные номера', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="list-reserved-rooms-update">

	<h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
