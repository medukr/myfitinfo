<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sets".
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property string $date
 */
class Sets extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sets';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'name', 'date'], 'required'],
            [['user_id'], 'integer'],
            [['date'], 'safe'],
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
            'user_id' => 'User ID',
            'name' => 'Name',
            'date' => 'Date',
        ];
    }


    public function getWorking()
    {
        return $this->hasMany(Working::className(), ['set_id' => 'id']);
    }


    public static function findWhereIdAndUser($id)
    {
        return self::find()
            ->where(['id' => $id])
            ->andWhere(['user_id' => Yii::$app->user->id])
            ->one();
    }
}
