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
        throw new HttpException(404, 'Страница не найдена.');

    }

    public function validateId($id)
    {
        $identify = (int) Html::encode(trim($id));

        if ($identify == $id) return $identify;

        return null;
    }

    public function validateIntegerData($work_data)
    {
        return (int) Html::encode(trim($work_data));
    }

    public function validateInputData($data)
    {
        return htmlentities(trim($data), ENT_QUOTES, 'utf-8', false);
    }
}