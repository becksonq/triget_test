<?php

namespace backend\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "directory_number_hotels".
 *
 * @property int $id
 * @property string $hotel_name
 * @property string $description
 *
 * @property ListReservedRooms $listReservedRooms
 */
class DirectoryNumberHotels extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%directory_number_hotels}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['hotel_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'          => 'ID',
            'hotel_name'  => 'Название номера',
            'description' => 'Описание',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getListReservedRooms()
    {
        return $this->hasOne(ListReservedRooms::className(), ['room_id' => 'id']);
    }

    /**
     * @return array
     */
    public static function numbersList()
    {
        return ArrayHelper::map(static::find()->asArray()->all(), 'id', 'hotel_name');
    }
}
