<?php

namespace app\models;

use app\components\AppHtmlentitiesBehavior;
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
class Presets extends AppModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'presets';
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['create_at', 'update_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['update_at'],
                ],
                // если вместо метки времени UNIX используется datetime:
                'value' => new Expression('NOW()'),

            ],
            [
                'class' => AppHtmlentitiesBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['name'],
                    ActiveRecord::EVENT_BEFORE_INSERT => ['name'],
                ],
            ],
        ];
    }


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
//            [['name', 'user_id', 'create_at'], 'required'],
            [['user_id'], 'integer'],
            [['create_at', 'update_at'], 'safe'],
            [['name'], 'string', 'max' => 64,],
        ];
    }

    public function getPresetsDisciplines()
    {
        return $this->hasMany(PresetsDisciplines::className(), ['preset_id' => 'id']);
    }

    public function getDiscipline()
    {
        return $this->hasMany(Disciplines::className(), ['id' => 'discipline_id'])->via('presetsDisciplines')->orderBy('name');

    }

    public static function findWhereUserOrAdmin()
    {
        return self::find()
            ->where(['user_id' => Yii::$app->user->id])
            ->orWhere(['user_id' => User::ADMIN_ID ])
            ->orderBy(['id' => SORT_DESC])
            ->all();
    }

    public static function findWhereIdAndUser($preset_id)
    {
        return self::find()
            ->where('id = :id', [':id' => (int) $preset_id])
            ->andWhere(['user_id'  => Yii::$app->user->id])
            ->limit(1)
            ->one();
    }


    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'user_id' => 'ID пльзователя',
            'create_at' => 'Создан',
            'update_at' => 'Обновлен',
        ];
    }


}
