<?php
/**
 * External db congig (in travise etc.)
 */
$db = [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=yii2-hit-counter-test',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8',
];

//override by local db config
if (file_exists(__DIR__.'/db.local.php')) {
    $db = array_merge($db, require(__DIR__.'/db.local.php'));
}
return $db;