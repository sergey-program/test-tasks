<?php

return [
    'id' => 'main',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log', 'debug', 'gii'],
    'components' => [
        'db' => require(__DIR__ . DIRECTORY_SEPARATOR . '_db.php'),
        'request' => [
            'cookieValidationKey' => 'Q98IYrOWRVhtIiJQxFWzOlYM2uxK2425',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                ['class' => 'yii\log\FileTarget', 'levels' => ['error', 'warning']]
            ]
        ]
    ],
    'modules' => [
        'debug' => 'yii\debug\Module',
        'gii' => 'yii\gii\Module'
    ],
    'params' => require(__DIR__ . DIRECTORY_SEPARATOR . '_params.php'),
];