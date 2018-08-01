<?php

namespace app\controllers;

use app\models\Disciplines;
use app\models\LoginForm;
use app\models\Presets;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use Yii;

class HomeController extends \yii\web\Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],

                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }


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
