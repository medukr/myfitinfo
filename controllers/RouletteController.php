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
                    Yii::$app->session->setFlash('success', 'Новое измерение успешно добавлено :)');
                    return $this->redirect(['roulette/view', 'id' => $roulette->id]);
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
                        Yii::$app->session->setFlash('success', 'Показания успешно добавлены :)');
                        return $this->redirect('/chart');
                    }
                }

            }
        }

        return $this->throwAppException();
    }
}