<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "working_data".
 *
 * @property int $id
 * @property int $working_id
 * @property int $weight
 * @property int $iteration
 */
class WorkingData extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'working_data';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['working_id'], 'required'],
            [['working_id', 'weight', 'iteration'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'working_id' => 'Working ID',
            'weight' => 'Weight',
            'iteration' => 'Iteration',
        ];
    }

    public function getWorking()
    {
        return $this->hasOne(Working::className(), ['id' => 'working_id']);
    }

    public static function findLastWhereWorkingId($id)
    {

        return self::find()
            ->where(['working_id' => (int) $id])
            ->orderBy(['id' => SORT_DESC])
            ->limit(1)
            ->one();
    }
}
