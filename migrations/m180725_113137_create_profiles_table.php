<?php

use yii\db\Migration;

/**
 * Handles the creation of table `profiles`.
 */
class m180725_113137_create_profiles_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('profiles', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(6),
            'height' => $this->integer(3),
            'age' => $this->integer(3),
            'name' => $this->string(),
            'surname' => $this->string(),
            'image' => $this->string()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('profiles');
    }
}
