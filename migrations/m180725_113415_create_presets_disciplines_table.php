<?php

use yii\db\Migration;

/**
 * Handles the creation of table `presets_disciplines`.
 */
class m180725_113415_create_presets_disciplines_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('presets_disciplines', [
            'id' => $this->primaryKey(),
            'preset_id' => $this->integer(11)->notNull(),
            'discipline_id' => $this->integer(11)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('presets_disciplines');
    }
}
