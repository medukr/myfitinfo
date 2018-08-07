<?php

use yii\db\Migration;

/**
 * Class m180807_115356_alter_date_column_from_roulette_data_table
 */
class m180807_115356_alter_date_column_from_roulette_data_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('roulette_data', 'date', 'datetime NOT NULL');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->alterColumn('roulette_data', 'date', 'date NOT NULL');

    }

}
