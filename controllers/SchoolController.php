<?php
namespace app\controllers;

use app\core\Request;
use app\models\School;

class SchoolController
{
	public function dashborad(Request $request)
	{
		$school = new School();
		return $this->render('login', [
			'model' => $school;
		]);
	}
}

?>