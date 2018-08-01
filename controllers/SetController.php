<?php
/**
 * Created by PhpStorm.
 * User: andrii
 * Date: 26.07.18
 * Time: 13:06
 */

namespace app\controllers;


use app\models\Disciplines;
use app\models\Presets;
use app\models\PresetsDisciplines;
use app\models\Sets;
use app\models\Working;
use yii\helpers\Url;
use Yii;
use yii\web\HttpException;


class SetController extends AppController
{

    public function actionStart($id)
    {
        $preset_id = Yii::$app->request->get('id');

        $preset = Presets::findWhereIdAndUser($preset_id);//находим пресет
        if ($preset){
            $set = new Sets(); //формируем по пресету сет
            $set->name = $preset->name;
            $set->user_id = Yii::$app->user->id;
            $set->date = date("Y-m-d H:i:s",time());
            if ($set->save()){
                foreach ($preset->discipline as $discipline){
                    $work = new Working(); //формируем про дисциплинам из пресета ворки
                    $work->discipline_id = $discipline->id;
                    $work->user_id = $set->user_id;
                    $work->set_id = $set->id;
                    $work->date = $set->date;
                    if (!$work->save()){
                        return 'Что-то пошло не так';
                    }
                }

                return $this->redirect(Url::to(['/set/view', 'id' => $set->id]));
            }
        }

        throw new HttpException(404, 'The requested Item could not be found.');
    }


    public function actionView($id)
    {
        $set_id = Yii::$app->request->get('id');

        $set = Sets::findWhereIdAndUser($set_id);

        return $this->render('view', compact('set'));
    }


}