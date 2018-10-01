<?php
return [
    'adminEmail' => '@@@',
    'teamEmail' => '@@@',

    /*Адресс админки*/
    'adminUrl' => 'dem',

    /*Адресс сайта*/
    'siteUrl' => 'sparrow.in.ua',

    /*Настойки для отправки писем*/
    'mailer_transport' => [
        'class' => 'Swift_SmtpTransport',
        'host' => 'smtp.gmail.com',
        'username' => 'team.myfitinfo@gmail.com',
        'password' => 'MEDyu4ok-74529-D',
        'port' => '465',
        'encryption' => 'ssl',
    ]
];
