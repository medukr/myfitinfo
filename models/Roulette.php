<?php

namespace app\models;

use app\components\AppHtmlentitiesBehavior;
use app\components\ChartDataWidget;
use Yii;
use yii\base\ViewRenderer;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "roulette".
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property object|array $rouletteData
 * @property object|array $rouletteDataLimit
 */
class Roulette extends AppModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'roulette';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'name'], 'required'],
            [['user_id'], 'integer'],
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
            'user_id' => 'ID пользователя',
            'name' => 'Название',
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


    public function getRouletteData()
    {
        return $this->hasMany(RouletteData::className(), ['roulette_id' => 'id'])->orderBy(['date' =>  SORT_DESC]);
    }

    public function getRouletteDataLimit()
    {
        return $this->hasMany(RouletteData::className(), ['roulette_id' => 'id'])->orderBy(['date' =>  SORT_DESC])->limit(25);
    }


    public static function findWhereIdAndUser($id)
    {
        return self::find()
            ->where(['id' => (int) $id])
            ->andWhere(['user_id' => Yii::$app->user->id])
            ->limit(1)
            ->with('rouletteData')
            ->one();
    }

    public static function findWhereUser()
    {
        return self::find()
            ->where(['user_id' => Yii::$app->user->id])
            ->with('rouletteData')
            ->all();
    }

    public static function findWhereUserWithoutData()
    {
        return self::find()
            ->where(['user_id' => Yii::$app->user->id])

            ->all();
    }




    public function getLastData()
    {
        if ($this->rouletteDataLimit){
            //Выборка из БД уже должна быть отсортирована в обратном порядке
            return $this->rouletteDataLimit[0]->measurement;
        }
        else return 0;
    }

    public function getDifferenceOfLast()
    {
        //Выборка из БД должна быть уже отсортирована в обратном порядке
        $html = "<span class=\"stats-small__percentage stats-small__percentage--increase\">Нет замеров</span>";

        if ($this->rouletteDataLimit) {
            if ($this->rouletteDataLimit[0]) {
                if (isset($this->rouletteDataLimit[1])) {
                    $result = $this->rouletteDataLimit[0]->measurement - $this->rouletteDataLimit[1]->measurement;
                } else {
                    $result = $this->rouletteDataLimit[0]->measurement;
                }
            }

            $result = round($result, 2);

            $html = "<span class=\"stats-small__percentage stats-small__percentage--increase\">+$result</span>";

            if ($result < 0) {
                $html = "<span class=\"stats-small__percentage stats-small__percentage--decrease\">$result</span>";
            }
        }

        return $html;
    }


    public function deleteDataFromIds($ids)
    {
        return RouletteData::deleteAll(['id' => $ids]);
    }


    public function deleteAllData()
    {
        $ids = [];
        if ($this->rouletteData){

            foreach ($this->rouletteData as $data) {
                $ids[] += $data->id;
            }

            return RouletteData::deleteAll(['id' => $ids]) ? true : false;
        }

        return true;
    }
}
