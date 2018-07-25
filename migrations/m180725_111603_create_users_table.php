<?php

use yii\db\Migration;

/**
 * Handles the creation of table `users`.
 */
class m180725_111603_create_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('users', [
            'id' => $this->primaryKey(),
            'email' => $this->string(),
            'user_name' => $this->string(),
            'password' => $this->string(),
            'auth_key' => $this->string(),
            'is_admin' => $this->integer(1),
            'create_at' => $this->timestamp(),
            'update_at' => $this->timestamp()
        ]);
    }

    /**15
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('users');
    }
}
