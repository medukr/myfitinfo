<?php

use yii\db\Migration;

/**
 * Class m180828_080223_alter_date_column_from_working_table
 */
class m180828_080223_alter_date_column_from_working_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('working', 'date', 'datetime NOT NULL');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->alterColumn('working', 'date', 'date NOT NULL');
    }

}
