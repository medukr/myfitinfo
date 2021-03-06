<?php

use yii\db\Migration;

/**
 * Handles the creation of table `sets`.
 */
class m180725_113503_create_sets_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('sets', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(11)->notNull(),
            'name' => $this->string(64)->notNull(),
            'date' => $this->dateTime()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('sets');
    }
}
