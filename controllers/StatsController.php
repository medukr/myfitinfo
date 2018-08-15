<?php
/**
 * Created by PhpStorm.
 * User: andrii
 * Date: 14.08.18
 * Time: 13:03
 */

namespace app\controllers;

use app\models\Sets;
use Yii;

class StatsController extends AppController
{
    public function actionView()
    {

        $name = $this->validateInputData(Yii::$app->request->get('name'));

        $sets = Sets::find()
            ->where('sets.name = :name', [':name' => $name])
            ->andWhere(['sets.user_id' => Yii::$app->user->id])
            ->orderBy(['sets.date'=> SORT_DESC])
            ->innerJoinWith('working')
            ->all();

        return $this->render('view', compact('sets'));
    }
}