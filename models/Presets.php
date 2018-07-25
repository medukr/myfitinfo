<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "presets".
 *
 * @property int $id
 * @property string $name
 * @property int $user_id
 * @property string $create_at
 * @property string $update_at
 */
class Presets extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'presets';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'user_id', 'create_at'], 'required'],
            [['user_id'], 'integer'],
            [['create_at', 'update_at'], 'safe'],
            [['name'], 'string', 'max' => 64],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'user_id' => 'User ID',
            'create_at' => 'Create At',
            'update_at' => 'Update At',
        ];
    }
}
