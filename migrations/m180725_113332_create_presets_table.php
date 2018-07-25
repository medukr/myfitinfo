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
            'name' => $this->string(),
            'user_id' => $this->integer(6),
            'create_at' => $this->timestamp(),
            'update_at' => $this->timestamp()
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
