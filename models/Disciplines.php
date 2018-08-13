<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "disciplines".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $image
 * @property int $user_id
 */
class Disciplines extends AppModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'disciplines';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'user_id'], 'required'],
            [['description'], 'string'],
            [['user_id'], 'integer'],
            [['name'], 'string', 'max' => 64],
            [['image'], 'string', 'max' => 255],
        ];
    }

    public function getImage()
    {
        return $this->image ? '/images/discipline/'.$this->image :'/images/no-image.png';
    }


    public static function findWhereUserOrAdmin()
    {
        return self::find()
            ->where(['user_id' => Yii::$app->user->id])
            ->orWhere(['user_id' => User::ADMIN_ID ])
            ->all();
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'image' => 'Image',
            'user_id' => 'User ID',
        ];
    }
}
