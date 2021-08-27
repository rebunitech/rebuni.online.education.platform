<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\models\Student;
use app\core\Application;
use app\models\Course;

class StudentController extends Controller
{
    public function dashborad(Request $request, Response $response)
    {
        $student = new Student();
        $course = new Course();
        $user_id = Application::$app->getUesrId();
		$data = Student::findOne(["id" => $user_id, 'user_type' => 'student']);
        $student->loadData($data);
        $student->courses = $course;
        
        return $this->render('studentDashboard', [
            'model' => $student
        ]);       
    }

}

?>