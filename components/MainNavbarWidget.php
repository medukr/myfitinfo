<?php
/**
 * Created by PhpStorm.
 * User: andrii
 * Date: 24.07.18
 * Time: 17:25
 */

namespace app\components;

use app\models\Profiles;
use yii\base\Widget;

class MainNavbarWidget extends Widget
{
    public function init()
    {
        parent::init(); // TODO: Change the autogenerated stub
    }

    public function run()
    {
        $profile = \Yii::$app->user->identity->profile;
        if (!$profile){
            $profile = new Profiles();
        }

        return $this->render('mainNavbar', compact('profile'));
    }
}