<?php

use yii\db\Migration;

/**
 * Handles the creation of table `directory_number_hotels`.
 */
class m180413_151550_create_directory_hotel_rooms_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';

        $this->createTable('{{%directory_number_hotels}}', [
            'id'          => $this->primaryKey(),
            'hotel_name'  => $this->string(255),
            'description' => $this->text(),
        ], $tableOptions);

        Yii::$app->db->createCommand()->batchInsert('{{%directory_number_hotels}}', [
            'hotel_name',
            'description',
        ], [
            ['Название номера 1', 'Краткое описание номера'],
            ['Название номера 2', 'Краткое описание номера'],
            ['Название номера 3', 'Краткое описание номера'],
            ['Название номера 4', 'Краткое описание номера'],
            ['Название номера 5', 'Краткое описание номера'],
            ['Название номера 6', 'Краткое описание номера'],
            ['Название номера 7', 'Краткое описание номера'],
            ['Название номера 8', 'Краткое описание номера'],
            ['Название номера 9', 'Краткое описание номера'],
            ['Название номера 10', 'Краткое описание номера'],
        ])->execute();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%directory_number_hotels}}');
    }
}
