<?php

$database = '';
$username = '';
$password = '';

return [
    'bootstrap' => ['debug', 'gii'],
    'components' => [
        'request' => [
            'cookieValidationKey' => '',
        ],
        'db' => [
            'class' => yii\db\Connection::class,
            'dsn' => "mysql:host=mysql;dbname=$database",
            'username' => $username,
            'password' => $password,
            'charset' => 'utf8',
        ],
    ],
    'modules' => [
        'debug' => [
            'class' => yii\debug\Module::class,
            'allowedIPs' => ['*'],
        ],
        'gii' => [
            'class' => yii\gii\Module::class,
            'allowedIPs' => ['*'],
        ],
    ],
];
