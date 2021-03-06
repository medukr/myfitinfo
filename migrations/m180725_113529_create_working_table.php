<?php

use yii\db\Migration;

/**
 * Handles the creation of table `working`.
 */
class m180725_113529_create_working_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('working', [
            'id' => $this->primaryKey(),
            'discipline_id' => $this->integer(11)->notNull(),
            'user_id' => $this->integer(11)->notNull(),
            'set_id' => $this->integer(11)->notNull(),
            'date' => $this->date()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('working');
    }
}
