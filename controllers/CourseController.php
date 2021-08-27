<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Response;
use app\core\Request;
use app\models\Course;

class CourseController extends Controller
{
     
    public function listCourse(Request $request, Response $response)
    {
        $course = new Course();
        return $this->render('courseList', [
			'model' => $course,
		]);
    }

    public function addCourse(Request $request, Response $response)
    {
        $course = new Course();
        return $this->render('addCourse', [
			'model' => $course,
		]);
    }
}

?>