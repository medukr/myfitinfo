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
            'user_id' => $this->integer(11)->unique()->notNull(),
            'height' => $this->smallInteger(3),
            'age' => $this->smallInteger(3),
            'name' => $this->string(64),
            'surname' => $this->string(64),
            'image' => $this->string(),
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
