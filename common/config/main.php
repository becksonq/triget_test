<?php
return [
    'aliases'        => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath'     => dirname(dirname(__DIR__)) . '/vendor',
    'name'           => 'TRIGET Media test',
    'language'       => 'ru-RU',
    'sourceLanguage' => 'ru-RU',
    'components'     => [
        'cache'     => [
            'class' => 'yii\caching\FileCache',
        ],
        'formatter' => [
            'dateFormat'     => 'php:d-m-Y',
            'datetimeFormat' => 'php:d-m-Y в H:i:s',
            'timeFormat'     => 'php:H:i:s',
        ],
    ],
];
