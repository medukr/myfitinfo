<?php

namespace app\modules\admin\controllers;

use app\modules\admin\models\User;
use yii\web\Controller;

/**
 * Default controller for the `admin` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $count_users = User::countUsers();

        return $this->render('index', compact('count_users'));
    }
}
