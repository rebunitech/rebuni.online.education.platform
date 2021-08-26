<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\models\User;
use app\models\LoginUser;

class AuthController extends Controller
{
	public function login(Request $request)
	{
		$user = new LoginUser();
		if ($request->isPost()) {
			$user->loadData($request->getBody());
			if($user->validate() && $user_type = $user->authenticate()) {
				$user->login();
				Application::$app->session->setFlash('success', "Login successfull!");
				if ($user_type === 'school'){
					Application::$app->response->redirect('/school');
				} else if ($user_type === 'teacher'){
					Application::$app->response->redirect('/teacher');
				} else if ($user_type === 'teacher'){
					Application::$app->response->redirect('/student');
				}
			}
		}
		$this->setLayout('auth');
		return $this->render('login', [
			'model' => $user
		]);
	}

	public function logout(Request $request)
	{
		Application::$app->session->destroyAuthSession();
		Application::$app->session->setFlash('success', "Logout successfull!");
		Application::$app->response->redirect('/login');
	}

	public function register(Request $request)
	{
		$user = new User();
		if ($request->isPost()) {
			$user->loadData($request->getBody());
			if ($user->validate() && $user->save()){
				Application::$app->session->setFlash('success', "Registeration successfull!");
				Application::$app->response->redirect('/login');
			}
		}
		$this->setLayout('register');
		return $this->render('register', [
			'model' => $user
		]);
	}
}
?>