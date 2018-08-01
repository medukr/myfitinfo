<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "presets".
 *
 * @property int $id
 * @property string $name
 * @property int $user_id
 * @property string $create_at
 * @property string $update_at
 */
class Presets extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'presets';
    }

//    public function behaviors()
//    {
//        return [
//            [
//                'class' => TimestampBehavior::className(),
//                'attributes' => [
//                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
//                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
//                ],
//                // если вместо метки времени UNIX используется datetime:
//                'value' => new Expression('NOW()'),
//
//            ],
//        ];
//    }


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
//            [['name', 'user_id', 'create_at'], 'required'],
            [['user_id'], 'integer'],
            [['create_at', 'update_at'], 'safe'],
            [['name'], 'string', 'max' => 64],
        ];
    }

    public function getPresetsDisciplines()
    {
        return $this->hasMany(PresetsDisciplines::className(), ['preset_id' => 'id']);
    }

    public function getDiscipline()
    {
        return $this->hasMany(Disciplines::className(), ['id' => 'discipline_id'])->via('presetsDisciplines');

    }

    public static function findWhereUserOrAdmin()
    {
        return self::find()
            ->where(['user_id' => Yii::$app->user->id])
            ->orWhere(['user_id' => Users::ADMIN_ID ])
            ->all();
    }

    public static function findWhereIdAndUser($preset_id)
    {
        return self::find()
            ->where(['id' => $preset_id])
            ->andWhere(['user_id' => Yii::$app->user->id])
            ->one();
    }


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
