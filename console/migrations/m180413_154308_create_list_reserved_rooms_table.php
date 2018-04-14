<?php

use yii\db\Migration;

/**
 * Handles the creation of table `list_reserved_rooms`.
 */
class m180413_154308_create_list_reserved_rooms_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';

        $this->createTable('{{%list_reserved_rooms}}', [
            'id'            => $this->primaryKey(),
            'room_id'       => $this->integer()->unique(),
            'client_name'   => $this->string(255),
            'phone_number'  => $this->string(25),
            'date_reserved' => $this->integer()->unsigned()->notNull(),
            'time_reserved' => $this->integer()->unsigned()->notNull(),
            'created_at'    => $this->integer()->unsigned()->notNull(),
            'updated_at'    => $this->integer()->unsigned()->notNull(),
        ], $tableOptions);

        $this->addForeignKey('fk-list_reserved_rooms-directory_hotel_rooms', '{{%list_reserved_rooms}}', 'room_id',
            '{{%directory_number_hotels}}', 'id');

        Yii::$app->db->createCommand()->batchInsert('{{%list_reserved_rooms}}', [
            'room_id',
            'client_name',
            'phone_number',
            'date_reserved',
            'time_reserved',
            'created_at',
            'updated_at'
        ], [
            ['1', 'Иванов 1', '73333333333', '1523629752', '1523629752', '1523629752', '1523629752'],
            ['2', 'Иванов 2', '73333333333', '1523629752', '1523629752', '1523629752', '1523629752'],
            ['3', 'Иванов 3', '73333333333', '1523629752', '1523629752', '1523629752', '1523629752'],
            ['4', 'Иванов 4', '73333333333', '1523629752', '1523629752', '1523629752', '1523629752'],
            ['5', 'Иванов 5', '73333333333', '1523629752', '1523629752', '1523629752', '1523629752'],
        ])->execute();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-list_reserved_rooms-directory_hotel_rooms', '{{%list_reserved_rooms}}');
        $this->dropTable('{{%list_reserved_rooms}}');
    }
}
