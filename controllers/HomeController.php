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
        return $this->render('index');
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

        $roulettes = Roulette::findWhereUser();

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

    public function actionProfile()
    {
        return $this->render('profile');
    }

    public function actionProgram()
    {
        $presets = Presets::findWhereUserOrAdmin();
        $model = new Presets();
        return $this->render('program', compact('presets', 'model'));
    }


}
