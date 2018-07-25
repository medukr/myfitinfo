<?php

use yii\db\Migration;

/**
 * Handles the creation of table `password_resets`.
 */
class m180725_113705_create_password_resets_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('password_resets', [
            'id' => $this->primaryKey(),
            'email' => $this->string(),
            'token' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('password_resets');
    }
}
