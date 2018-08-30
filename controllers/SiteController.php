<?php

namespace app\controllers;

use app\models\RegisterForm;
use app\models\User;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends AppController
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],

            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post', 'get'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionResetPassword()
    {
        $model = new RegisterForm();
            if ($model->load(Yii::$app->request->post())){

                if ($model->validate()){

                    $email = $this->validateInputData($model->email);
                    $user = User::find()
                        ->where('email = :email', [':email' => $email])
                        ->one();
                    return $this->sendAccessEmail($user);

                }
            }

        return $this->render('resetPassword', compact('model'));
    }

    public function actionRegister()
    {
        $model = new RegisterForm();

        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->registerUser()){

//                return $this->sendAccessEmail($user);

                Yii::$app->session->setFlash('success', 'Вы успешно зарегестрированы');
                return $this->redirect(['site/login']);
            }
        }

        return $this->render('register', ['model' => $model,]);
    }


    public function sendAccessEmail($user)
    {
        //                Yii::$app->mailer->compose('access_registration', compact('user'))
//                    ->setFrom(['andrii.demydyuk@gmail.com' => 'myfitinfo.loc'])
//                    ->setTo($user->email)
//                    ->setSubject('Подтвержение регистрации пользователя')
//                    ->send();
        return $this->render('registerSuccess', compact('user'));
    }


    public function actionAccess()
    {

    }

}
