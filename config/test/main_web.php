<?php

return [
    'id' => 'main',
    'name' => $_SERVER['SERVER_NAME'],
    'charset' => 'UTF-8',
    'basePath' => FILE_PATH_ROOT,
    'bootstrap' => ['log', 'debug'],
    'params' => require(FILE_PATH_CONFIG_ENV . '_params.php'),
    'components' => [
        'db' => require(FILE_PATH_CONFIG_ENV . '_db.php'),
        'request' => [
            'cookieValidationKey' => 'Q98IYrOWRVhtIiJQxFWzOlYM2uxK2425',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => require(FILE_PATH_CONFIG_ENV . '_routes.php')
        ],
        'user' => [
            'class' => 'app\components\UserExtended',
            'identityClass' => 'app\components\UserIdentity',
            'enableAutoLogin' => true,
            'loginUrl' => ['auth/login']
        ],
        'authManager' => require(FILE_PATH_CONFIG_ENV . '_auth.php'),
        'errorHandler' => [
            'errorAction' => 'error/index',
        ],
        'view' => [
            'class' => 'app\components\ViewExtended'
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
        ],
        'timeZone' => 'UTC'
    ],
    'modules' => require_once(FILE_PATH_CONFIG_ENV . '_modules.php')
];