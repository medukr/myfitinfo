<?php
/**
 * Created by PhpStorm.
 * User: andrii
 * Date: 26.07.18
 * Time: 13:06
 */

namespace app\controllers;


use app\components\SetsListWidget;
use app\models\Presets;
use app\models\Sets;
use app\models\Working;
use app\models\WorkingData;
use yii\helpers\Url;
use Yii;


class SetController extends AppController
{

    public function actionStart($id)
    {
        $preset_id = $this->validateId(Yii::$app->request->get('id'));

        $preset = Presets::findWhereIdAndUser($preset_id);//находим пресет

        if ($preset){
            $set = new Sets(); //формируем по пресету сет
            $set->name = $preset->name;
            $set->user_id = Yii::$app->user->id;
            $set->preset_id = $preset->id;
            $set->date = date("Y-m-d H:i:s",time());
            if ($set->save()){
                foreach ($preset->discipline as $discipline){
                    $work = new Working(); //формируем по дисциплинам из пресета ворки
                    $work->discipline_id = $discipline->id;
                    $work->user_id = $set->user_id;
                    $work->set_id = $set->id;
                    $work->date = $set->date;
                    if (!$work->save()){
                        return 'Что-то пошло не так';
                    }
                }

                return $this->redirect(Url::to(['/set/training', 'id' => $set->id]));
            }
        }

        $this->throwAppException();
    }


    public function actionTraining($id)
    {
        $set_id = $this->validateId(Yii::$app->request->get('id'));

        $set = Sets::findWhereIdAndUser($set_id);
        $last_set = Sets::findLastSet($set);
        $workingData = new WorkingData();

        if ($set){
            return $this->render('training', compact('set', 'last_set', 'workingData'));
        }

        $this->throwAppException();
    }


    public function actionDelete()
    {
        $set = new Sets();

        if ($set->load(Yii::$app->request->post())){

            $set_id = $this->validateId(Yii::$app->request->post('Sets')['id']);

            $set = Sets::findWhereIdAndUser($set_id);

            if ($set){
                if ($set->working){
                    foreach ($set->working as $working){
                        if ($working->workingData){
                            foreach ($working->workingData as $working_data){
                                $working_data->delete();
                            }
                        }

                        $working->delete();
                    }
                }

                $set->delete();

                if (Yii::$app->request->post('submit')){
                    return $this->redirect(['home/journal']);
                }

                $sets = Sets::findWhereUser();
                return SetsListWidget::widget(['sets'=> $sets]);
            }

        }


        $this->throwAppException();

    }

}