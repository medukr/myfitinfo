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


    public function getWorking()
    {
        return $this->hasMany(Working::className(), ['set_id' => 'id'])->with('discipline')->with('workingData');
    }

    public function getWorkingWithoutDiscipline()
    {
        return $this->hasMany(Working::className(), ['set_id' => 'id'])->with('workingData');
    }

    public function getLastWorking()
    {
        return;
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

    public static function findGroupUserSets()
    {
        return self::find()
            ->select(['name', 'max(date) as d'])
            ->where(['user_id' => Yii::$app->user->id])
            ->groupBy('name')
            ->orderBy(['d' => SORT_DESC])
            ->all();
    }



    public function getDate()
    {

        $date = Yii::$app->formatter->asDate($this->date, 'd MMM yyyy, EEEE');

        $relative_time = Yii::$app->formatter->asRelativeTime($this->date);

        return $date . ' | ' . $relative_time;
    }

}
