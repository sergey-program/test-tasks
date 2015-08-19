<?php

return [
    'id' => 'main-console',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log', 'gii'],
    //'controllerNamespace' => 'app\commands',
    'modules' => [
        'gii' => 'yii\gii\Module',
    ],
    'components' => [
        'db' => require(__DIR__ . DIRECTORY_SEPARATOR . '_db.php'),
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'log' => [
            'targets' => [
                ['class' => 'yii\log\FileTarget', 'levels' => ['error', 'warning']]
            ]
        ]
    ],
    'params' => require(__DIR__ . DIRECTORY_SEPARATOR . '/_params.php')
];