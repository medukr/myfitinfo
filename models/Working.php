<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "working".
 *
 * @property int $id
 * @property int $discipline_id
 * @property int $user_id
 * @property int $set_id
 * @property string $date
 */
class Working extends \yii\db\ActiveRecord
{

    public $last_working;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'working';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['discipline_id', 'user_id', 'set_id', 'date'], 'required'],
            [['discipline_id', 'user_id', 'set_id'], 'integer'],
            [['date'], 'safe'],
        ];
    }

    public function getSet()
    {
        return $this->hasOne(Sets::className(), ['id' => 'set_id']);
    }

    public function getDiscipline()
    {
        return $this->hasOne(Disciplines::className(), ['id' => 'discipline_id']);
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function getWorkingData()
    {
        return $this->hasMany(WorkingData::className(), ['working_id' => 'id']);
    }



    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'discipline_id' => 'Discipline ID',
            'user_id' => 'User ID',
            'set_id' => 'Set ID',
            'date' => 'Date',
        ];
    }

    public static function findWhereIdAndUser($id)
    {
        return self::find()
            ->where('id = :id',[':id' => (int) $id ])
            ->andWhere(['user_id' => Yii::$app->user->id])
            ->limit(1)
            ->one();
    }

    public function findLastData()
    {
        return WorkingData::findLastWhereWorkingId($this->id);
    }

    public function findLastWorking($set)
    {
        $this->last_working = self::find()
            ->where('set_id = :set_id', [':set_id' => $set->id])
            ->andWhere('discipline_id = :discipline_id',[':discipline_id' => $this->discipline_id])
            ->one();

        return $this->last_working ? true : false;
    }

//Рекурсивно ищем, где же у нас находятся данные.
    public function findOldLastWorking($set)
    {


        $set = Sets::findLastSetWhereWorkingNotNull($set, $this);

        if ($set) {
            $this->findLastWorking($set);
        }

//Рабочий вариант, но потенциально может быть ОЧЕНЬ моного запросов в БД. Необходимо либо написать новую выборку из БД, либо переписать Sets::findLastSet();
//        $this->findLastWorking($set);
//
//        if ($this->last_working && !$this->last_working->workingData){
//
//            $set = Sets::findLastSet($set);
//
//            if ($set){
//                $this->findOldLastWorking($set);
//
//            }
//        }


        return $this->last_working ? true : false;

    }


    public function getRelativeDate()
    {
        $date = Yii::$app->formatter->asDate($this->date, 'd MMM yyyy, EEEE');

        $relative_time = Yii::$app->formatter->asRelativeTime($this->date);

        return $date . ' | ' . $relative_time;
    }
}
