<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use backend\models\ListReservedRooms;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ListReservedRoomsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Забронированные номера';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="list-reserved-rooms-index">

	<h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

	<p>
      <?= Html::a('Добавить бронирование', ['create'], ['class' => 'btn btn-success']) ?>
	</p>
    <?php /*d($dataProvider); die; */ ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel'  => $searchModel,
        'columns'      => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute'     => 'id',
                'headerOptions' => ['style' => 'width:3%'],
            ],
            [
                'attribute' => 'room.hotel_name',
            ],
            'client_name',
            [
                'attribute' => 'phone_number',
                'value'     => function ($model){
                    /** @var ListReservedRooms $model */
                    return ListReservedRooms::restorePhone($model->phone_number);
                },
            ],
            'date_reserved:date',
            'time_reserved:time',
            //'created_at',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
