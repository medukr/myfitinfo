<?php
/**
 * Created by PhpStorm.
 * User: andrii
 * Date: 01.08.18
 * Time: 17:07
 */

namespace app\controllers;

use yii\web\HttpException;
use app\models\Disciplines;
use app\models\Presets;
use app\models\PresetsDisciplines;
use Yii;

class PresetController extends AppController
{


    public function actionAdd()
    {
        if (Yii::$app->request->post()){
            $model = new Presets();
            if ($model->load(Yii::$app->request->post())){
                $model->user_id = Yii::$app->user->id;
                if ($model->save()){
                    return $this->redirect("/set/edit/$model->id");
                }
            }
        }

        return 'Что-то пошло не так';
    }



    public function actionEdit($id)
    {
        //необходимо проверить входные данные
        $preset_id = $id;

        $preset = Presets::findWhereIdAndUser($preset_id);
        if ($preset){
            $disciplines = Disciplines::findWhereUserOrAdmin();

            return $this->render('edit', compact('preset', 'disciplines'));
        }

        throw new HttpException(404, 'The requested Item could not be found.');

    }



    public function actionAddItem()
    {
        //проверить входные данные
        $preset_id = Yii::$app->request->get('preset_id');
        $discipline_id = Yii::$app->request->get('discipline_id');

        $preset = Presets::findWhereIdAndUser($preset_id);

        if ($preset){

            $count = 0;
            foreach ($preset->discipline as $discipline) {
                if ($discipline->id == $discipline_id ) $count++;
            }

            if ($count == 0){
                $pres_dis = new PresetsDisciplines();
                $pres_dis->discipline_id = $discipline_id;
                $pres_dis->preset_id = $preset->id;
                $pres_dis->save();
                $preset = Presets::findWhereIdAndUser($preset_id);
            }

            $this->layout = false;
            return $this->render('presetItemsList', compact('preset'));
        }

        return 'Что-то пошло не так :\'(';
    }




    public function actionDeleteItem()
    {
        if (Yii::$app->request->post('discipline_id') && Yii::$app->request->post('preset_id')){

            //необхзодимо проверить вхоодные данные
            $discipline_id = Yii::$app->request->post('discipline_id');
            $preset_id = Yii::$app->request->post('preset_id');

            $preset = Presets::findWhereIdAndUser($preset_id);
            if ($preset){
                $model = PresetsDisciplines::find()
                    ->where(['discipline_id' => $discipline_id])
                    ->andWhere(['preset_id' => $preset_id])
                    ->one();
                $model->delete();

                $this->layout = false;
                return $this->render('presetItemsList', compact('preset'));
            }

        }

        return 'Что-то пошло не так';

    }




    public function actionUpdateName()
    {

        if (Yii::$app->request->post()) {

            //необходимо проверить входные данные
            $preset_id = Yii::$app->request->post('Presets')['id'];

            $preset = Presets::findWhereIdAndUser($preset_id);

            if ($preset) {
                if ($preset->load(Yii::$app->request->post()) && $preset->save()) {
                    return $this->redirect("/set/edit/$preset->id");
                }
            }
        }

        return 'Что-то пошло не так';

    }




    public function actionDelete()
    {
        if (Yii::$app->request->post('preset_id')){

            //нужно проверять входящие данные
            $preset_id = Yii::$app->request->post('preset_id');

            $preset = Presets::findWhereIdAndUser($preset_id);

            if ($preset){
                $model = PresetsDisciplines::find()->where(['preset_id' => $preset->id])->all();
                if ($model) {
                    foreach ($model as $item) {
                        $item->delete();
                    }
                }
                $preset->delete();

                $presets = $presets = Presets::findWhereUserOrAdmin();
                $this->layout = false;
                return $this->render('presetsList', compact('presets'));
            }
        }

        return 'Что-то пошло не так';
    }
}