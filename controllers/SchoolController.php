<?php
namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\models\School;

class SchoolController extends Controller
{
	public function dashborad(Request $request, Response $response)
	{
		$school = new School();
		$user_id = Application::$app->getUesrId();
		$exists = School::findOne(["user_fk" => $user_id, 'user_type' => 'school']);
		if(!$exists) {
			$response->redirect('/addschool');
		}
		
		$school->load($exists);
		$courses = School::loadRelated("courses", ["school_fk" => $school->user_fk]);
		$school->$courses = $courses;
		return $this->render('schoolDashboard', [
			'model' => $school,
		]);
	}

	public function addSchool(Request $request, Response $response)
	{
		$school = new School();
		$user_id = Application::$app->getUesrId();
		$exists = School::findOne(["user_fk" => $user_id]);
		if($exists){
			$response->redirect('/school');
		}
		if ($request->isPost()){
			$school->loadData($request->getBody());
			if($school->validate() && $school->save()){
				echo "SAVED";
			}
		}
		return $this->render('addSchool', [
			'model' => $school,
		]);
	}
}

?>