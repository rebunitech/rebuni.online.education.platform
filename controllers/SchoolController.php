<?php
namespace app\controllers;

use app\core\Controller;
use app\core\Request;
use app\models\School;

class SchoolController extends Controller
{
	public function dashborad(Request $request)
	{
		$school = new School();
		return $this->render('schoolDashboard', [
			'model' => $school,
		]);
	}

}

?>