<?php
/**
 * Created by PhpStorm.
 * User: andrii
 * Date: 08.08.18
 * Time: 11:56
 */

namespace app\controllers;


use app\models\Profiles;
use Yii;

class ProfileController extends AppController
{

    public function actionUpdate()
    {
        $profile = Profiles::findUserProfile();

        if ($profile && Yii::$app->request->post()) {

            $user = $profile->user;

            if ($profile->load(Yii::$app->request->post()) && $user->load(Yii::$app->request->post())) {
                if ($profile->updateProfile() && $user->save()) {
                    Yii::$app->session->setFlash('success', 'Профиль успешно обновлен :)');
                    return $this->refresh();
                }
            }

        }

        if (!$profile) {
            $profile = new Profiles();
            $profile->user_id = Yii::$app->user->id;
            $profile->save();
        }

        return $this->render('update', compact('profile'));
    }

}