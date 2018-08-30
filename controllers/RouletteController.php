<?php
/**
 * Created by PhpStorm.
 * User: andrii
 * Date: 06.08.18
 * Time: 10:51
 */

namespace app\controllers;

use app\models\Roulette;
use app\models\RouletteData;
use Yii;
use yii\helpers\Url;

class RouletteController extends AppController
{
    public function actionAdd()
    {
        if (Yii::$app->request->post()){

            $roulette = new Roulette();

            if ($roulette->load(Yii::$app->request->post())) {

                $roulette->name = $this->validateInputData($roulette->name);
                $roulette->user_id = Yii::$app->user->id;

                if ($roulette->save()) {
                    Yii::$app->session->setFlash('success', 'Новый график успешно добавлен :)');
//                    return $this->redirect(['roulette/view', 'id' => $roulette->id]);
                    return $this->redirect(['home/chart']);
                }
            }
        }

        return $this->throwAppException();
    }




    public function actionView($id)
    {
        $id = $this->validateId(Yii::$app->request->get('id'));

        $roulette = Roulette::findWhereIdAndUser($id);

        if ($roulette){

            Yii::$app->session->setFlash('error', 'Ошибка!');
             return $this->render('view', compact('roulette'));
        }

        return $this->throwAppException();
    }




    public function actionAddData()
    {
        if (Yii::$app->request->post()) {

            $roulette_data = new RouletteData();

            if ($roulette_data->load(Yii::$app->request->post())){

                $roulette_id = $this->validateId(Yii::$app->request->post('Roulette')['id']);
                $roulette = Roulette::findWhereIdAndUser($roulette_id);

                if ($roulette){

                    $roulette_data->roulette_id = $roulette->id;
                    $roulette_data->date = date("Y-m-d H:i:s",time());

                    if ($roulette_data->save()) {
                        Yii::$app->session->setFlash('success', 'Показание успешно добавлено :)');
                        return $this->redirect(['home/chart']);
                    }
                }

            }
        }

        return $this->throwAppException();
    }

    public function actionDeleteLastData()
    {
        $roulette = new Roulette();

        if ($roulette->load(Yii::$app->request->post())){

            $roulette_id = $this->validateId(Yii::$app->request->post('Roulette')['id']);

            $model = Roulette::findWhereIdAndUser($roulette_id);

            if ($model){

                $data = RouletteData::findLastWhereRolletteId($model->id);

                if ($data && $data->delete()){

                    Yii::$app->session->setFlash('success', 'Показание успешно удалено');
                    return $this->redirect(['home/chart']);
                }

                Yii::$app->session->setFlash('warning', 'Нечего удалять (:');
                return $this->redirect(['home/chart']);
            }

        }

        $this->throwAppException();
    }

    public function actionDeleteRoulette()
    {
        $roulette = new Roulette();
        if ($roulette->load(Yii::$app->request->post())){

            $roulette_id = $this->validateId(Yii::$app->request->post('Roulette')['id']);

            $model = Roulette::findWhereIdAndUser($roulette_id);

            if ($model){
                if($model->deleteAllData()){

                    if ($model->delete()){
                        Yii::$app->session->setFlash('success', 'График успешно удален');
                        return $this->redirect(['home/chart']);
                    }

                    Yii::$app->session->setFlash('warning', 'Упс... Что-то пошло не так :(. Попробуй еще раз');
                    return $this->redirect(['home/chart']);
                }
            }
        }

        $this->throwAppException();
    }
}