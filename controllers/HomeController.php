<?php

namespace app\controllers;

use app\models\Disciplines;
use app\models\Presets;

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
        return $this->render('charts');
    }

    public function actionJournal()
    {
        return $this->render('journal');
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
