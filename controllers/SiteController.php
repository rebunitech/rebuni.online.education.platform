<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;

class SiteController extends Controller
{
	public function home(Request $request)
	{
		$params = [
			'name' => 'Wendirad'
		];

		return $this->render('home', $params);
	}
	public function handleContact(Request $request)
	{
		$body = $request->getBody();

		echo var_dump($body);
		
	}

	public function contact(Request $request)
	{	
		return $this->render('contact');
	}
}

?>