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
            'email' => $this->string()->notNull()->unique(),
            'user_name' => $this->string(64)->unique(),
            'password' => $this->string()->notNull(),
            'auth_key' => $this->string(),
            'is_admin' => $this->smallInteger(),
            'create_at' => $this->dateTime()->notNull(),
            'update_at' => $this->dateTime(),
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
