<?php
return [
    'adminEmail' => 'team.myfitinfo@gmail.com',
    'teamEmail' => 'team.myfitinfo@gmail.com',

    /*Адресс админки*/
    'adminUrl' => 'zzz',

    /*Адресс сайта*/
    'siteUrl' => 'myfitinfo.loc',

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
