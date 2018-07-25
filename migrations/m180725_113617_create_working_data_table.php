<?php

use yii\db\Migration;

/**
 * Handles the creation of table `working_data`.
 */
class m180725_113617_create_working_data_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('working_data', [
            'id' => $this->primaryKey(),
            'working_id' => $this->integer(),
            'weight' => $this->integer(),
            'iteration' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('working_data');
    }
}
