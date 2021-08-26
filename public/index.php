<?php

require_once __DIR__.'/../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

use app\core\Application;
use app\controllers\SiteController;
use app\controllers\AuthController;
use app\controllers\SchoolController;
use app\controllers\TeacherController;

$config = [
	'db' => [
		'dsn' => $_ENV['DB_DSN'],
		'user' => $_ENV['DB_USER'],
		'password' => $_ENV['DB_PASSWORD'],
	]
];

$app = new Application(dirname(__DIR__), $config);

$app->router->get('/', [SiteController::class, 'home']);
$app->router->get('/contact', [SiteController::class, 'contact']);
$app->router->post('/contact', [SiteController::class, 'handleContact']);
$app->router->get('/login', [AuthController::class, 'login']);
$app->router->get('/logout', [AuthController::class, 'logout']);
$app->router->post('/login', [AuthController::class, 'login']);
$app->router->get('/register', [AuthController::class, 'register']);
$app->router->post('/register', [AuthController::class, 'register']);
$app->router->get('/dashboadrd', [SiteController::class, 'dashboadrd']);
$app->router->get('/addschool', [SchoolController::class, 'addSchool']);
$app->router->post('/addschool', [SchoolController::class, 'addSchool']);
$app->router->get('/school', [SchoolController::class, 'dashborad']);
$app->router->get('/teacher', [TeacherController::class, 'dashborad']);

$app->run();

?>
