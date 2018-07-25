<?php

use yii\db\Migration;

/**
 * Handles the creation of table `presets`.
 */
class m180725_113332_create_presets_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('presets', [
            'id' => $this->primaryKey(),
            'name' => $this->string(64)->notNull(),
            'user_id' => $this->integer(11)->notNull(),
            'create_at' => $this->dateTime()->notNull(),
            'update_at' => $this->dateTime(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('presets');
    }
}
