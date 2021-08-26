<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\models\Teacher;

class TeacherController extends Controller
{
    public function dashborad(Request $request, Response $response)
    {
        $teacher = new Teacher();
        $user_id = Application::$app->getUesrId();
		$exists = Teacher::findOne(["id" => $user_id, 'user_type' => 'teacher']);
        if($request->isPost()){

        }
        $teacher->load($exists);
        $courses = Teacher::loadRelated("course_lecture", ["lecture_fk" => $user_id]);
        $followers = Teacher::loadRelated("followers", ["following_fk" => $user_id]);
		$teacher->courses = $courses;
        $teacher->followers = $followers;
        return $this->render('teacherDashboard', [
            'model' => $teacher
        ]);       
    }
}

?>