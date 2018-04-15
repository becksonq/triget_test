<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use backend\models\ListReservedRooms;

?>

<div class="rooms">
	<ul class="list-unstyled">
		<li>
			<h4><?= Html::encode($model->hotel_name) ?></h4>
		</li>
		<li>
			<dl>
				<dt>Описание номера</dt>
				<dd><?= HtmlPurifier::process($model->description) ?></dd>
			</dl>
		</li>
	</ul>
    <?php if (!empty($model->listReservedRooms->room_id)) { ?>
			<table class="table table-condensed">
				<tr>
					<td>Имя</td>
					<td><?= HtmlPurifier::process($model->listReservedRooms->client_name) ?></td>
				</tr>
				<tr>
					<td>Телефон:</td>
					<td><?= HtmlPurifier::process(ListReservedRooms::restorePhone($model->listReservedRooms->phone_number)) ?></td>
				</tr>
				<tr>
					<td>Дата бронирования:</td>
					<td><?= HtmlPurifier::process(Yii::$app->formatter->asDate($model->listReservedRooms->date_reserved,
                  long)) ?></td>
				</tr>
				<tr>
					<td>Время бронирования:</td>
					<td><?= HtmlPurifier::process(Yii::$app->formatter->asTime($model->listReservedRooms->time_reserved)) ?></td>
				</tr>
			</table>
    <?php } else { ?>
			<div class="alert alert-info" role="alert">Номер свободен</div>
    <?php } ?>

</div>