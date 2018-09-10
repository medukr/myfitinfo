<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'language' => 'ru-RU',
    'timezone' => 'Europe/Kiev',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'defaultRoute' => 'home/index',
    'modules' => [
        $params['adminUrl'] => [
            'class' => 'app\modules\admin\Module',
            'layout' => 'admin',
        ],
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'UaAvAVXulA17-64ZQhOjEQUfHHlsiRhc',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
            'loginUrl' => '/login',
        ],

        'formatter' => [
            'class' => 'yii\i18n\Formatter',
            'locale' => 'ru-RU',
            'defaultTimeZone' => 'Europe/Kiev'
        ],

        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.gmail.com',
                'username' => 'andrii.demydyuk@gmail.com',
                'password' => 'qwe123',
                'port' => '465 ',
                'encryption' => 'ssl',
                ]
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '/login' => 'site/login',
                '/logout' => 'site/logout',
                '/reset' => 'site/reset-password',
                '/register' => 'site/register',

                '/site/<action:\w+>' => 'site/error',
                '/home/<action:\w+?>' => 'site/error',

                '/start/<id:\d+>' => 'set/start',
                '/training/<id:\d+>' => 'set/training',
                '/set/<action:\w+>' => 'set/<action>',
                '/program/<id:\d+>' => 'preset/edit',
                '/chart/<id:\d+>' => 'roulette/view',
                '/profile' => 'profile/update',
                '/stats/<name:(\w+\s?)+>' => 'stats/view',

                '/<action:index|start|chart|program|journal|discipline>' => 'home/<action>',

                /*---------Admin Module---------*/
                '/'.$params['adminUrl'].'/<controller:\w+>' => $params['adminUrl'].'/<controller>/index',
                '/'.$params['adminUrl'].'/<controller:\w+>/<action:\w+>/<id:\d+>' => $params['adminUrl'].'/<controller>/<action>',
            ],
        ],

    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
