<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "profiles".
 *
 * @property int $id
 * @property int $user_id
 * @property int $height
 * @property int $age
 * @property string $name
 * @property string $surname
 * @property string $image
 */
class Profiles extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'profiles';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id', 'height', 'age'], 'integer'],
            [['name', 'surname'], 'string', 'max' => 64],
            [['image'], 'string', 'max' => 255],
            [['user_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'height' => 'Height',
            'age' => 'Age',
            'name' => 'Name',
            'surname' => 'Surname',
            'image' => 'Image',
        ];
    }
}
