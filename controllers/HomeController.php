<?php

namespace app\controllers;

use app\models\Disciplines;
use app\models\Presets;
use app\models\Roulette;
use app\models\RouletteData;
use app\models\Sets;
use Yii;

class HomeController extends AppController
{

    public function actionIndex()
    {
        $presets_ids = Sets::findUserSetsId();
        $count_sets = $this->countSets();
        $data = $this->createStatsData($presets_ids);

        return $this->render('index', compact('data', 'count_sets'));
    }

/*Метод формирует массив из стетов по входящим preset_id, таким образом, чтобы из него
можно было сформировать данные для графика, и заполнить поля верстки*/
    public function createStatsData($presets_ids)
    {
        $data = [];

        foreach ($presets_ids as $presets_id){
            $sets = Sets::getSetsWithDataLimit($presets_id);
            krsort($sets);
            $us = [];
            foreach ( $sets as $set){
                $s = [];
                foreach ($set as $key => $item){
                    $s[$key] = $item;
                }
                /*Имя принимается по последнему сету*/
                $us['name'] = $set->name;
                $us['preset_id'] = $set->preset_id;
                $sum = [];
                $sum['weight'] = 0;
                foreach ($set->workingWithoutDiscipline as $working){
                    $wd = [];
                    foreach ($working->workingData as $workingData){
                        $wd[] = [
                            'weight' => $workingData->weight,
                            'iteration' => $workingData->iteration,
                            'sum' => $workingData->weight * $workingData->iteration
                            ];
                        $sum['weight'] += $workingData->weight * $workingData->iteration;
                    }
                    $s['working_data'][] = $wd;
                }
                $s['sum'] = $sum;

                $us['sets'][] = $s;

            }

            $us['last_result'] = $us['sets'][count($us['sets']) - 1]['sum']['weight'];

            if (count($us['sets']) > 1 && $us['sets'][count($us['sets']) - 2]){
                $us['prelast_result'] = $us['sets'][count($us['sets']) - 2]['sum']['weight'];
            }else{
                $us['prelast_result'] = 0;
            }
            /*Если пресет, по которому было создан сет не удален, то имя принимается по нему*/
            if ($sets[0]->preset) $us['name'] = $sets[0]->preset->name;

            $data[] = $us;
        }

        return $data;
    }

    public function countSets()
    {
        $count_sets = Sets::countUserSets();
        return $count_sets->id;
    }

    public function actionStart()
    {
        $presets = Presets::findWhereUserOrAdmin();

        return $this->render('start', compact('presets'));
    }

    public function actionChart()
    {

        $model = new Roulette();
        $data_model = new RouletteData();

        $roulettes = Roulette::findWhereUserWithoutData();
        krsort($roulettes);

        return $this->render('chart', compact('roulettes','model', 'data_model'));
    }

    public function actionJournal()
    {
        $sets = Sets::findWhereUser();

        return $this->render('journal', compact('sets'));
    }

    public function actionDiscipline()
    {
        $disciplines = Disciplines::findWhereUserOrAdmin();

        return $this->render('discipline', compact('disciplines'));
    }

    public function actionProgram()
    {
        $presets = Presets::findWhereUserOrAdmin();
        $model = new Presets();
        return $this->render('program', compact('presets', 'model'));
    }



}
