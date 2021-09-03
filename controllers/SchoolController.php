<?php
namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\models\School;
use PDO;

class SchoolController extends Controller
{
	public function dashborad(Request $request, Response $response)
	{
		$school = new School();
		$user_id = Application::$app->getUesrId();
		$exists = School::findOne(["user_fk" => $user_id]);
		if(!$exists) {
			$response->redirect('/addschool');
		}
		$school->loadData($exists);
		$courses = School::loadRelated("courses", ["school_fk" => $school->user_fk]);
		$teachers = School::loadRelated("join_requests", ["school_fk" => $user_id, 'status' => 1]);
		$join_requests = School::loadRelated("join_requests", ["school_fk" => $user_id, 'status' => 0]);
		$school->courses = $courses;
		$school->teachers = $teachers;
		$school->join_requests = $join_requests;
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
				Application::$app->session->setFlash('success', "Add school successfully!");
				$response->redirect("/school");
			}
		}
		return $this->render('addSchool', [
			'model' => $school,
		]);
	}

	public function profile(Request $request, Response $response)
	{
		$school = new School();
		$user_id = Application::$app->getUesrId();
		$exists = School::findOne(["user_fk" => $user_id]);
		if(!$exists){
			$response->redirect('/school');
		}
		
		$school->loadData($exists);
		if ($request->isPost()){
			$school->loadData($request->getBody());
			if($school->validate() && $school->update(["user_fk" => $user_id])){
				Application::$app->session->setFlash('success', "Profile update successfull!");
				$response->redirect('/school');
			}
		}
		
		return $this->render('schoolProfile', [
			'model' => $school,
		]);
	}

	public function openRequest(Request $request, Response $response)
	{
		$school = new School();
		$user_id = Application::$app->getUesrId();
		$exists = School::findOne(["user_fk" => $user_id]);
		if(!$exists){
			$response->redirect('/school');
		}
		$school->loadData($exists);
		$school->put('is_open', 1, ["user_fk" => $user_id]);
		Application::$app->session->setFlash('success', "Open request!");
		$response->redirect('/profile');
	}

	public function closeRequest(Request $request, Response $response)
	{
		$school = new School();
		$user_id = Application::$app->getUesrId();
		$exists = School::findOne(["user_fk" => $user_id]);
		if(!$exists){
			$response->redirect('/school');
		}
		$school->loadData($exists);
		$school->put('is_open', 0, ["user_fk" => $user_id]);
		Application::$app->session->setFlash('success', "Close request!");
		$response->redirect('/profile');
	}

	public function approveTeacher(Request $request, Response $response)
	{
		$approveID = $request->getBody()['appoveID'];
		$user_id = Application::$app->getUesrId();
		$stmt = School::prepare("UPDATE join_requests SET status=1 WHERE lecture_fk=$approveID AND school_fk=$user_id;");
		$stmt->execute();
		$response->redirect('/dashboard');
	}

	public function denieTeacher(Request $request, Response $response)
	{
		$denieID = $request->getBody()['denieID'];
		$user_id = Application::$app->getUesrId();
		$stmt = School::prepare("UPDATE join_requests SET status=2 WHERE lecture_fk=$denieID AND school_fk=$user_id");
		$stmt->execute();
		$response->redirect('/dashboard');
	}
}

?>