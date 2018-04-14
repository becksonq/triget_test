<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\ListReservedRooms;

/* @var $this yii\web\View */
/* @var $model backend\models\ListReservedRooms */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Забронированные номера', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="list-reserved-rooms-view">

	<h1><?= Html::encode($this->title) ?></h1>

	<p>
      <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
      <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
          'class' => 'btn btn-danger',
          'data'  => [
              'confirm' => 'Are you sure you want to delete this item?',
              'method'  => 'post',
          ],
      ]) ?>
	</p>

    <?= DetailView::widget([
        'model'      => $model,
        'attributes' => [
            'id',
            'room.hotel_name',
            'client_name',
            [
                'attribute' => 'phone_number',
                'value'     => ListReservedRooms::restorePhone($model->phone_number),
            ],
            'date_reserved:date',
            'time_reserved:time',
            //            'created_at',
            //            'updated_at',
        ],
    ]) ?>

</div>
