<?php
/**
 * Created by PhpStorm.
 * User: andrii
 * Date: 01.08.18
 * Time: 17:07
 */

namespace app\controllers;


use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\Html;
use yii\web\Controller;
use Yii;
use yii\web\HttpException;

class AppController extends Controller
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

    public static function isSidebarActive($controller, $action)
    {
        return (Yii::$app->controller->id == $controller && Yii::$app->controller->action->id == $action) ? ' active' : '';
    }

    public function throwAppException()
    {
        throw new HttpException(404, 'The requested Item could not be found.');
    }

    public function validateId($id)
    {
        $id = (int) Html::encode(trim($id));

        if ($id >= 2) return $id;

        $this->throwAppException();
    }

    public function validateWorkingData($work_data)
    {
        $work_data = (int) Html::encode(trim($work_data));

        return $work_data;
    }
}