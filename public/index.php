<?php

require_once __DIR__.'/../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

use app\core\Application;
use app\controllers\SiteController;
use app\controllers\AuthController;
use app\controllers\SchoolController;
use app\controllers\TeacherController;
use app\controllers\StudentController;
use app\controllers\CourseController;

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
$app->router->get('/dashboard', [SiteController::class, 'dashboard']);
$app->router->get('/profile', [SiteController::class, 'profile']);
$app->router->get('/school', [SchoolController::class, 'dashborad']);
$app->router->get('/addschool', [SchoolController::class, 'addSchool']);
$app->router->post('/addschool', [SchoolController::class, 'addSchool']);
$app->router->get('/schoolprofile', [SchoolController::class, 'profile']);
$app->router->post('/schoolprofile', [SchoolController::class, 'profile']);
$app->router->get('/openrequest', [SchoolController::class, 'openRequest']);
$app->router->get('/closerequest', [SchoolController::class, 'closeRequest']);
$app->router->get('/approve', [SchoolController::class, 'approveTeacher']);
$app->router->get('/denie', [SchoolController::class, 'denieTeacher']);
$app->router->get('/teacher', [TeacherController::class, 'dashborad']);
$app->router->get('/addrequest', [TeacherController::class, 'addrequest']);
$app->router->get('/student', [StudentController::class, 'dashborad']);
$app->router->get('/courses', [CourseController::class, 'listCourse']);
$app->router->get('/addcourse', [CourseController::class, 'addCourse']);
$app->router->post('/addcourse', [CourseController::class, 'addCourse']);
$app->router->get('/viewcourse', [CourseController::class, 'viewCourse']);
$app->router->get('/paid', [CourseController::class, 'paid']);
$app->router->get('/takeCourse', [CourseController::class, 'takeCourse']);

$app->run();
?>
