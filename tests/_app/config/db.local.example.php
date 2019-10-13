<?php
/**
 * Example local config db
 */
$db = [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=172.27.0.3;port=3306;dbname=yii2-hit-counter-test',
    'username' => 'root',
    'password' => 'root',
    'charset' => 'utf8',
];
return $db;