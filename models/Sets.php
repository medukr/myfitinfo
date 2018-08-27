<?php

namespace app\models;

use app\components\AppHtmlentitiesBehavior;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "sets".
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property string $date
 * @property int preset_id
 */
class Sets extends AppModel
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

    public function behaviors()
    {
        return [
            [
                'class' => AppHtmlentitiesBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['name'],
                    ActiveRecord::EVENT_BEFORE_INSERT => ['name'],
                ],
            ],
        ];
    }


    public function getWorking()
    {
        return $this->hasMany(Working::className(), ['set_id' => 'id'])->with('discipline')->with('workingData');
    }

    public function getWorkingWithoutDiscipline()
    {
        return $this->hasMany(Working::className(), ['set_id' => 'id'])->with('workingData');
    }

    public function getOnlyWorking()
    {
        return $this->hasMany(Working::className(), ['set_id' => 'id']);
    }

    public static function findWhereIdAndUser($id)
    {
        return self::find()
            ->where('sets.id = :id',[':id' => (int) $id ])
            ->andWhere(['sets.user_id' => Yii::$app->user->id])
            ->limit(1)
            ->one();
    }

    public static function findWhereUser()
    {
        return self::find()
            ->where(['user_id' => Yii::$app->user->id])
            ->orderBy(['date' => SORT_DESC])
            ->all();
    }

    public static function findLastSet($set)
    {
        return self::find()
            ->where(['name' => $set->name])
            ->andWhere('date < :date',[':date' => $set->date])
            ->andWhere(['user_id' => Yii::$app->user->id])
            ->orderBy(['date' => SORT_DESC])
            ->limit(1)
            ->one();
    }

    public static function findUserSetsId()
    {
        return self::find()
            ->select('preset_id, max(date) as date')
            ->where(['user_id' => Yii::$app->user->id])
            ->groupBy('preset_id')
            ->orderBy(['date' => SORT_DESC])
            ->all();
    }


    public function getDate()
    {

        $date = Yii::$app->formatter->asDate($this->date, 'd MMM yyyy, EEEE');

        $relative_time = Yii::$app->formatter->asRelativeTime($this->date);

        return $date . ' | ' . $relative_time;
    }


    public function countUserSets()
    {
        return self::findBySql('select count(id) as id from sets where user_id = '.Yii::$app->user->id)->one();
    }

}
