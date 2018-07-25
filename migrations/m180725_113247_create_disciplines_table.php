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
            'name' => $this->string(),
            'description' => $this->text(),
            'image' => $this->string(),
            'user_id' => $this->integer(6)
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
