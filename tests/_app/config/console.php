<?php
return [
    'id' => 'yii2-test-console',
    'basePath' => dirname(__DIR__),
    'aliases' => [
        '@testmigrations' => dirname(__DIR__) . '/migrations',
        '@modulemigrations' => dirname(__DIR__) . '/../../src/migrations',
    ],
    'components' => [
        'log' => null,
        'cache' => null,
        'db' => require __DIR__ . '/db.php',
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
    ],
    'controllerMap' => [
        'migrate' => [
            'class' => yii\console\controllers\MigrateController::class,
            'migrationPath' => null,
            // 'migrationNamespaces' => [
            //     '',
            // ],
        ],
    ],
];