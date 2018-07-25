<?php

use yii\db\Migration;

/**
 * Handles the creation of table `disciplines`.
 */
class m180725_113247_create_disciplines_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('disciplines', [
            'id' => $this->primaryKey(),
            'name' => $this->string(64)->notNull(),
            'description' => $this->text(),
            'image' => $this->string(),
            'user_id' => $this->integer(11)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('disciplines');
    }
}
