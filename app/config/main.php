<?php

Yii::setAlias('@yii/gii', dirname(__DIR__, 2) . '/vendor/yiisoft/yii2-gii');

$params = array_merge(
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-rest',
    'name' => 'Rest',
    'language' => 'ru-RU',
    'timeZone' => 'Europe/Moscow',
    'homeUrl' => '/',
    'basePath' => dirname(__DIR__),
    'vendorPath' => dirname(__DIR__) . '/../vendor',
    'controllerNamespace' => 'app\controllers',
    'components' => [
        'request' => [
            'parsers' => [
                'application/json' => yii\web\JsonParser::class,
            ],
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'enableStrictParsing' => false,
            'showScriptName' => false,
        ],
        'response' => [
            'format' => yii\web\Response::FORMAT_JSON,
        ],
        'log' => [
            'targets' => [
                [
                    'class' => yii\log\FileTarget::class,
                    'logFile' => dirname(__DIR__, 2) . '/logs/app.log',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'cache' => [
            'class' => yii\caching\FileCache::class,
            'cachePath' => dirname(__DIR__) . '/runtime/cache',
        ],
    ],
    'aliases' => ['@bower' => '@vendor/bower-asset', '@npm' => '@vendor/npm-asset',],
    'params' => $params,
];
