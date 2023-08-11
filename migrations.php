<?php

// error_reporting(0);
require_once __DIR__ . '/vendor/autoload.php';
// use Worth\controllers\AuthController;
use MuhthishimisCoding\PreFramework\Application;
// use Worth\controllers\SiteController;

// $_SERVER['REQUEST_URI'] = str_replace('pre-framework/', '', $_SERVER['REQUEST_URI']);
// REQUEST_URI returns complete url including /users?id=1
// PATH_INFO just returns /users
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
$config = [
    'db' => [
        'dsn' => $_ENV['DB_DSN'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD'],
        'db' => $_ENV['DB_NAME']
    ],
    'error_reporting' => $_ENV['DEVELOPMENT_MODE'],
    'loginClass' => \Worth\models\LoginForm::class,
    'logFile' => '/log/error_log.txt'
];
$app = new Application(__DIR__, $config);

$app->db->applyMigrations();
