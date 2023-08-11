<?php
// error_reporting(0);
require_once __DIR__ . '/../vendor/autoload.php';
use Worth\controllers\AuthController;
use MuhthishimisCoding\PreFramework\Application;
use Worth\controllers\SiteController;

// use Worth\models\LoginForm;

$_SERVER['REQUEST_URI'] = str_replace('pre-framework/', '', $_SERVER['REQUEST_URI']);
// REQUEST_URI returns complete url including /users?id=1
// PATH_INFO just returns /users
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
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
$app = new Application(dirname(__DIR__), $config);
$obj = new SiteController();
$auth = new AuthController();
// echo $_SERVER['REQUEST_URI'];
// string vs array would be better
$app->router->get('/', 'home');
$app->router->get('/contact', [$obj, 'contact']);
$app->router->post('/contact', [$obj, 'contact']);

$app->router->get('/login', [$auth, 'login']);
$app->router->post('/login', [$auth, 'login']);
$app->router->get('/register', [$auth, 'register']);
$app->router->post('/register', [$auth, 'register']);
$app->router->get('/logout', [$auth, 'logout']);
$app->router->get('/debug', ['view' => 'debug']);
$app->router->get('/profile', [$auth, 'profile']);
$app->run();