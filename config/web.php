<?php

/**
 * @SWG\Swagger(
 *   info={
 *     "title"="REST API",
 *     "version"="0.0.1"
 *   },
 *   host=API_HOST,
 *   basePath="/api"
 * )
 *
 * @SWG\SecurityScheme(
 *   securityDefinition="jwt",
 *   description="add 'Bearer ' before jwt token",
 *   type="apiKey",
 *   in="header",
 *   name="Authorization"
 * )
 */

$params = require(__DIR__ . '/params.php');
$db = require(__DIR__ . '/db.php');
$rules = require(__DIR__ . '/rules.php');

$config = [
    'id' => 'rest-api',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],

    /* waktu aplikasi */
    'timeZone' => 'Asia/Jakarta',

    /* module */
    'modules' => [
        'v1' => [
            'basePath' => '@app/modules/versiSatu',
            'class' => 'app\modules\versiSatu\v1',
        ],
    ],

    'components' => [
        'request' => [
            'cookieValidationKey' => 'BVWfyckvqYTzdr6YQcluvhXWLxAcGpwr',
            /* Enable JSON Input: */
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ],
        ],
        'response' => [
            /* Enable JSON Output: */
            'format'        => \yii\web\Response::FORMAT_JSON,
            'charset'       => 'UTF-8',
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
            /* send all mails to a file by default. You have to set */
            /* 'useFileTransport' to false and configure a transport */
            /* for the mailer to send real emails. */
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,
        'urlManager' => [
            'enablePrettyUrl'     => true,
            'enableStrictParsing' => true,
            'showScriptName'      => false,
            'rules'               => [
                '' => 'site/index',
                'docs' => 'site/docs',
                [
                    'pattern' => 'resource',
                    'route' => 'site/resource',
                    'suffix' => '.json'
                ],
                [
                    'class'         => 'yii\rest\UrlRule',
                    'pluralize'     => false,
                    'controller'    => ['v1'],
                    'extraPatterns' => $rules,
                ],
            ],
        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    /* configuration adjustments for 'dev' environment */
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        /* uncomment the following to add your IP if you are not connecting from localhost. */
        /*'allowedIPs' => ['127.0.0.1', '::1'], */
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        /* uncomment the following to add your IP if you are not connecting from localhost. */
        /*'allowedIPs' => ['127.0.0.1', '::1'], */
    ];
}

return $config;
