<?php

use yii\db\Migration;

/**
 * Handles the creation of table `rulette`.
 */
class m180725_113313_create_rulette_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('rulette', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(6),
            'name' => $this->string()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('rulette');
    }
}
