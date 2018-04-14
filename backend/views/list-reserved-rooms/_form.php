<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\DirectoryNumberHotels;
use yii\widgets\MaskedInput;
use kartik\date\DatePicker;
use kartik\time\TimePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\ListReservedRooms */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="list-reserved-rooms-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'room_id')->dropDownList(DirectoryNumberHotels::numbersList(),
        ['prompt' => 'Выбрать...']) ?>

    <?= $form->field($model, 'client_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone_number')->widget(MaskedInput::className(), [
        'mask'          => '+7(999)999-99-99',
        'options'       => ['class' => 'form-control'],
        'clientOptions' => ['clearIncomplete' => true]
    ]) ?>

    <?= $form->field($model, 'date_reserved')->widget(DatePicker::classname(), [
        'language'      => 'ru',
        'type'          => DatePicker::TYPE_COMPONENT_APPEND,
        'options'       => ['placeholder' => 'Выберите желаемую дату...'],
        'pluginOptions' => [
            'autoclose'      => true,
            'format'         => 'dd-mm-yyyy',
            'todayHighlight' => true
        ]
    ]) ?>

    <?= $form->field($model, 'time_reserved')->widget(TimePicker::classname(), [
        'pluginOptions' => [
            'showMeridian' => false,
            'format'       => 'H:i:s',
        ]
    ]) ?>

	<div class="form-group">
      <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
	</div>

    <?php ActiveForm::end(); ?>

</div>
