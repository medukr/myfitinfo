<?php

use yii\db\Migration;

/**
 * Handles adding preset_id to table `sets`.
 */
class m180824_181359_add_preset_id_column_to_sets_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('sets', 'preset_id', $this->integer()->notNull());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('sets', 'preset_id');
    }
}
