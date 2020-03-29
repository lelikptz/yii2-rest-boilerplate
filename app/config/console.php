<?php

Yii::setAlias('@yii/gii', dirname(__DIR__, 2) . '/vendor/yiisoft/yii2-gii');

$params = array_merge(
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-console',
    'basePath' => dirname(__DIR__),
    'vendorPath' => dirname(__DIR__) . '/../vendor',
    'controllerNamespace' => 'app\commands',
    'components' => [
        'log' => [
            'targets' => [
                [
                    'class' => yii\log\FileTarget::class,
                    'logFile' => dirname(__DIR__, 2) . '/logs/console.log',
                    'levels' => ['error', 'warning']
                ],
            ],
        ],
    ],
    'params' => $params,
];
