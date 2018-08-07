<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "roulette_data".
 *
 * @property int $id
 * @property int $roulette_id
 * @property int $measurement
 * @property string $date
 */
class RouletteData extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'roulette_data';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['roulette_id', 'date'], 'required'],
            [['roulette_id', 'measurement'], 'integer'],
            [['date'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'roulette_id' => 'Roulette ID',
            'measurement' => 'Значение',
            'date' => 'Date',
        ];
    }

}
