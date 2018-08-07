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
    public function actionAdd($id, $weight, $iteration)
    {

        $id = $this->validateId(Yii::$app->request->get('id'));
        $weight = $this->validateIntegerData(Yii::$app->request->get('weight'));
        $iteration = $this->validateIntegerData(Yii::$app->request->get('iteration'));

        $working = Working::findWhereIdAndUser($id);

        if ($working){

            $working_data = new WorkingData();
            $working_data->working_id = $working->id;
            $working_data->weight = $weight;
            $working_data->iteration = $iteration;

            if ($working_data->save()){

                return WorkingDataListWidget::widget(['working' => $working]);
            }
        }
    }


    public function actionDelete()
    {
        if (Yii::$app->request->post('id')) {

            $id = $this->validateId(Yii::$app->request->post('id'));

            $working = Working::findWhereIdAndUser($id);

            if ($working) {

                $working_data = WorkingData::findLastWhereWorkingId($working->id);

                if ($working_data && $working_data->delete()) {

                    return WorkingDataListWidget::widget(['working' => $working]);
                }
            }
        }

    }
}