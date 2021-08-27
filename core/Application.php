<?php

namespace app\core;

use app\core\Request;
use app\core\Router;
use app\core\Response;
use app\core\Controller;
use app\core\Database;
use app\core\Session;

class Application 
{
	public static string $ROOT_DIR;
	public static Application $app;
	public Router $router;
	public Request $request;
	public Response $response;
	public Controller $controller;
	public Database $db;
	public Session $session;
	
	public function __construct($rootPath, array $config){

		self::$ROOT_DIR = $rootPath;
		self::$app = $this;
		$this->request = new Request();
		$this->response = new Response();
		$this->session = new Session();
		$this->router = new Router($this->request, $this->response);
		$this->db = new Database($config['db']);
	}

	public function getController()
	{
		return $this->controller;
	}

	public function setController(Controller $controller)
	{
		$this->controller = $controller;
	}

	public function getUserType()
	{
		return $this->session->getAuthSession("user_type");
	}

	public function getUesrId()
	{
		return $this->session->getAuthSession("user_id");
	}
	
	public function run(){
		echo $this->router->resolve();
	}
}
?>