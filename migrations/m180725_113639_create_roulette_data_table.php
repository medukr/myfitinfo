<?php

use yii\db\Migration;

/**
 * Handles the creation of table `roulette_data`.
 */
class m180725_113639_create_roulette_data_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('roulette_data', [
            'id' => $this->primaryKey(),
            'roulette_id' => $this->integer(11)->notNull(),
            'measurement' => $this->integer(),
            'date' => $this->date()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('roulette_data');
    }
}
