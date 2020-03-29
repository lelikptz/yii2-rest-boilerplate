<?php

$params = array_merge(
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-console',
    'basePath' => dirname(__DIR__, 2),
    'runtimePath' => dirname(__DIR__) . '/runtime',
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
