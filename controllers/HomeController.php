<?php

namespace app\controllers;

class HomeController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionStart()
    {
        return $this->render('start');
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
        return $this->render('discipline');
    }

    public function actionProfile()
    {
        return $this->render('profile');
    }


}
