<?php

return [
    'id' => 'main-console',
    'basePath' => FILE_PATH_ROOT,
    'bootstrap' => ['log', 'gii'],
    'params' => require(FILE_PATH_CONFIG_ENV . '_params.php'),
    'controllerNamespace' => 'app\commands',
    'components' => [
        'db' => require(FILE_PATH_CONFIG_ENV . '_db.php'),
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => require(FILE_PATH_CONFIG_ENV . '_routes.php'),
            'baseUrl' => 'http://tasks.ru/',    // change on dev \ prod
            'scriptUrl' => 'http://tasks.ru/',  // change on dev \ prod
        ],
        'authManager' => require(FILE_PATH_CONFIG_ENV . '_auth.php'),
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning']
                ]
            ]
        ],
//        'formatter' => [
//            'defaultTimeZone' => 'America/Adak'
//        ]
    ],
    'modules' => [
        'gii' => 'yii\gii\Module'
    ]
];