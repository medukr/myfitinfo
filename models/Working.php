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

    public function findLastWorking($last_set_id, $discipline_id)
    {
        $this->last_working = self::find()
            ->where('set_id = :set_id', [':set_id' => $last_set_id])
            ->andWhere('discipline_id = :discipline_id',[':discipline_id' => $discipline_id])
            ->one();

        return $this->last_working ? true : false;
    }
}
