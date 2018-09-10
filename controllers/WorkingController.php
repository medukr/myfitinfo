<?php
/**
 * Created by PhpStorm.
 * User: andrii
 * Date: 03.08.18
 * Time: 15:36
 */

namespace app\controllers;

use app\components\WorkingDataListWidget;
use app\models\Working;
use app\models\WorkingData;
use Yii;

class WorkingController extends AppController
{
    public function actionAdd()
    {

        $working_data = new WorkingData();

        if ($working_data->load(Yii::$app->request->post())) {

            $working = Working::findWhereIdAndUser($working_data->working_id);

            if ($working) {
                if ($working_data->save()) {

                    if (Yii::$app->request->post('submit')) {
                        return $this->redirect(['set/training', 'id' => $working->set_id]);
                    }

                    return WorkingDataListWidget::widget(['working' => $working]);

                }
            }
        }

        $this->throwAppException();
    }


    public function actionDelete()
    {

        $working = new Working();

        if ($working->load(Yii::$app->request->post())){

            $id = $this->validateId(Yii::$app->request->post('Working')['id']);

            $working = Working::findWhereIdAndUser($id);

            if ($working) {

                $working_data = WorkingData::findLastWhereWorkingId($working->id);

                if ($working_data && $working_data->delete()) {

                    if (Yii::$app->request->post('submit')){
                        return $this->redirect(['set/training', 'id' => $working->set_id]);
                    }

                    return WorkingDataListWidget::widget(['working' => $working]);
                } else {
                    if (Yii::$app->request->post('submit')){
                        return $this->redirect(['set/training', 'id' => $working->set_id]);
                    }

                    return WorkingDataListWidget::widget(['working' => $working]);
                }
            }

        }

        $this->throwAppException();

    }
}