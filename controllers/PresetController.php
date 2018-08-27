<?php
/**
 * Created by PhpStorm.
 * User: andrii
 * Date: 01.08.18
 * Time: 17:07
 */

namespace app\controllers;

use Codeception\Util\Debug;
use yii\helpers\Html;
use yii\helpers\Url;
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
                    return $this->redirect(Url::to(['/preset/edit', 'id' => $model->id]));
                }
            }
        }

        $this->throwAppException();
    }



    public function actionEdit()
    {

        $preset_id = $this->validateId(Yii::$app->request->get('id'));

        $preset = Presets::findWhereIdAndUser($preset_id);

        if ($preset){

            $disciplines = Disciplines::findWhereUserOrAdmin();
            $preset_discipline = new PresetsDisciplines();

            return $this->render('edit', compact('preset', 'disciplines', 'preset_discipline'));
        }

        $this->throwAppException();

    }



    public function actionUpdateName()
    {

        if (Yii::$app->request->post('Presets')['id']) {

            $preset_id = $this->validateId(Yii::$app->request->post('Presets')['id']);

            $preset = Presets::findWhereIdAndUser($preset_id);

            if ($preset) {
                if ($preset->load(Yii::$app->request->post()) && $preset->save()) {

                    Yii::$app->session->setFlash('success', 'Название программы успешно изменено :)');

                    return $this->redirect(Url::to(['/preset/edit', 'id' => $preset->id]));
                }
            }
        }

        $this->throwAppException();

    }



    public function actionAddItem()
    {

        $preset_discipline = new PresetsDisciplines();

        if ($preset_discipline->load(Yii::$app->request->post())){

            $preset_id = $this->validateId($preset_discipline->preset_id);

            $preset = Presets::findWhereIdAndUser($preset_id);

            if ($preset){

                $discipline_id = $this->validateId($preset_discipline->discipline_id);

                $model = PresetsDisciplines::find()
                    ->where(['discipline_id' => $discipline_id])
                    ->andWhere(['preset_id' => $preset->id])
                    ->one();

                if ($model === null && $preset_discipline->save()){
                    $preset = Presets::findWhereIdAndUser($preset->id);
                }

                if (Yii::$app->request->post('submit')){
                    return $this->redirect(['preset/edit', 'id' => $preset->id]);
                }

                $this->layout = false;
                return $this->render('presetItemsList', compact('preset'));
            }

        }

        $this->throwAppException();
    }



    public function actionDeleteItem()
    {
        $preset_discipline = new PresetsDisciplines();

        if ($preset_discipline->load(Yii::$app->request->post())){

            $preset_id = $this->validateId($preset_discipline->preset_id);

            $preset = Presets::findWhereIdAndUser($preset_id);

            if ($preset){

                $discipline_id = $this->validateId($preset_discipline->discipline_id);

                $model = PresetsDisciplines::find()
                    ->where(['discipline_id' => $discipline_id])
                    ->andWhere(['preset_id' => $preset->id])
                    ->one();

                if ($model){
                    $model->delete();
                }

                if (Yii::$app->request->post('submit')){
                    return $this->redirect(['preset/edit', 'id' => $preset->id]);
                }

                $this->layout = false;
                return $this->render('presetItemsList', compact('preset'));

            }
        }

        $this->throwAppException();

    }



    public function actionDelete()
    {
        $preset = new Presets();

        if ($preset->load(Yii::$app->request->post())){

            $preset_id = $this->validateId(Yii::$app->request->post('Presets')['id']);

            $preset = Presets::findWhereIdAndUser($preset_id);

            if ($preset){
                $model = PresetsDisciplines::find()
                    ->where(['preset_id' => $preset->id])
                    ->all();

                if ($model){
                    foreach ($model as $item) {
                        $item->delete();
                    }
                }

                if ($preset->delete()){
                    $presets = Presets::findWhereUserOrAdmin();

                    Yii::$app->session->setFlash('success', 'Программа успешно удалена :)');

                    if (Yii::$app->request->post('submit')){

                        return $this->redirect(['home/program']);
                    }

                    $this->layout = false;
                    return $this->render('presetsList', compact('presets'));
                }
            }

        }

        $this->throwAppException();

    }
}