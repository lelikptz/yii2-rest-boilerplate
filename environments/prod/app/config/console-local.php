<?php

$database = '';
$username = '';
$password = '';

return [
    'components' => [
        'db' => [
            'class' => yii\db\Connection::class,
            'dsn' => "mysql:host=mysql;dbname=$database",
            'username' => $username,
            'password' => $password,
            'charset' => 'utf8',
        ],
    ],
];
