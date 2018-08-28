<?php

use yii\db\Migration;

/**
 * Class m180828_080454_alter_measurement_column_from_roulette_data_table
 */
class m180828_080454_alter_measurement_column_from_roulette_data_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('roulette_data', 'measurement', 'float');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->alterColumn('roulette_data', 'measurement', 'integer');

    }

}
