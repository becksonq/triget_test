<?php

namespace backend\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "list_reserved_rooms".
 *
 * @property int $id
 * @property int $room_id
 * @property string $client_name
 * @property string $phone_number
 * @property int $date_reserved
 * @property int $time_reserved
 * @property int $created_at
 * @property int $updated_at
 *
 * @property DirectoryNumberHotels $room
 */
class ListReservedRooms extends ActiveRecord
{
    const PHONE_NUM_REMOVE = 1;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%list_reserved_rooms}}';
    }

    /**
     * @return array
     */
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class'      => 'yii\behaviors\TimestampBehavior',
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['room_id', 'created_at', 'updated_at'], 'integer'],
            [['date_reserved', 'time_reserved'], 'required'],
            [['date_reserved', 'time_reserved'], 'safe'],
            [['client_name'], 'string', 'max' => 255],
            [['phone_number'], 'string', 'max' => 25],
            [['room_id'], 'unique'],
            [
                ['room_id'],
                'exist',
                'skipOnError'     => true,
                'targetClass'     => DirectoryNumberHotels::className(),
                'targetAttribute' => ['room_id' => 'id']
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'            => 'ID',
            'room_id'       => 'Номер гостиницы',
            'client_name'   => 'Имя клиента',
            'phone_number'  => 'Телефон',
            'date_reserved' => 'Дата бронирования',
            'time_reserved' => 'Время бронирования',
            'created_at'    => 'Created At',
            'updated_at'    => 'Updated At',
        ];
    }

    /**
     * @param bool $insert
     * @return bool
     */
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            $this->phone_number = self::cleanPhone($this->phone_number);
            $this->date_reserved = strtotime($this->date_reserved);
            $this->time_reserved = strtotime($this->time_reserved);
            return true;
        }
        return false;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRoom()
    {
        return $this->hasOne(DirectoryNumberHotels::className(), ['id' => 'room_id']);
    }

    /**
     * @param $phone
     * @return mixed
     */
    public static function cleanPhone($phone)
    {
        return preg_replace('![^0-9]+!', '', $phone);
    }

    /**
     * @param $phone
     * @return string
     */
    public static function restorePhone($phone)
    {
        return trim('+' . substr($phone, 0, 1) .
            '(' . substr($phone, 1, 3) .
            ')' . substr($phone, 4, 3) .
            '-' . substr($phone, 7, 2) .
            '-' . substr($phone, 9, 2));
    }
}
