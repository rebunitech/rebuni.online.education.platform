<?php

namespace app\core;

use app\core\Application;
use app\core\Controller;
use app\core\Response;

class Router
{
	protected array $routes = [];
	public Request $request;
	public Response $response;

	public function __construct(Request $request, Response $response)
	{
		$this->request = $request;
		$this->response = $response;
	}

	public function get($path, $callback) {
		$this->routers['get'][$path] = $callback;
	}

	public function post($path, $callback) {
		$this->routers['post'][$path] = $callback;
	}

	public function resolve(){

		$path = $this->request->getPath();
		$method = $this->request->method();

		$callback = $this->routers[$method][$path] ?? false;
 	

		if ($callback === false) {
			$this->response->setStatusCode(404);
			return $this->renderView("_404");
		}
		
		if (is_string($callback)){
			return $this->renderView($callback);
		}		

		if (is_array($callback)){
			Application::$app->controller = new $callback[0]();
			$callback[0] = Application::$app->controller;
		}
		return call_user_func($callback, $this->request, $this->response);

	}

	public function renderView($callback, $params = [])
	{
		$layoutContent = $this->layoutContent();
		$viewContent = $this->renderOnlyView($callback, $params);
		return str_replace("{{content}}", $viewContent, $layoutContent);

	}

	protected function layoutContent()
	{
		$layout = Application::$app->controller->layout ?? 'main';
		ob_start();
		include_once Application::$ROOT_DIR."/views/layouts/$layout.php";	
		return ob_get_clean();
	} 

	protected function renderOnlyView($view, $params){
		foreach ($params as $key => $value) {
			$$key = $value;
		}
		ob_start();
		include_once Application::$ROOT_DIR."/views/$view.php";
		return ob_get_clean();
	}

	protected function renderContent($viewContent){
		$layoutContent = $this->layoutContent();
		return str_replace("{{content}}", $viewContent, $layoutContent);
	}
}

?>