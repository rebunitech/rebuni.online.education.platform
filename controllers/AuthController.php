<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\models\RegisterUser;
use app\models\LoginUser;
use app\core\Response;

class AuthController extends Controller
{
	public function login(Request $request, Response $response)
	{
		$user = new LoginUser();
		if ($request->isPost()) {
			$user->loadData($request->getBody());
			if($user->validate() && $user_type = $user->authenticate()) {
				$user->login();
				Application::$app->session->setFlash('success', "Login successfull!");
				if ($user_type === 'school'){
					$response->redirect('/school');
				} else if ($user_type === 'teacher'){
					$response->redirect('/teacher');
				} else if ($user_type === 'student'){
					$response->redirect('/student');
				}
				exit;
			}
		}
		$this->setLayout('auth');
		return $this->render('login', [
			'model' => $user
		]);
	}

	public function logout(Request $request, Response $response)
	{
		Application::$app->session->destroyAuthSession();
		Application::$app->session->setFlash('success', "Logout successfull!");
		$response->redirect('/login');
	}

	public function register(Request $request, Response $response)
	{
		$user = new RegisterUser();
		if ($request->isPost()) {
			$user->loadData($request->getBody());
			if ($user->validate() && $user->save()){
				Application::$app->session->setFlash('success', "Registeration successfull!");
				$response->redirect('/login');
			}
		}
		$this->setLayout('auth');
		return $this->render('register', [
			'model' => $user
		]);
	}
}
?>