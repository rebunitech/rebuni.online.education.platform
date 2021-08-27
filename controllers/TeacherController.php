<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\models\Teacher;
use PDO;

class TeacherController extends Controller
{
    public function dashborad(Request $request, Response $response)
    {
        $teacher = new Teacher();
        $user_id = Application::$app->getUesrId();
        $data = Teacher::findOne(["id" => $user_id, 'user_type' => 'teacher']);
        $courses = Teacher::loadRelated("course_lecture", ["lecture_fk" => $user_id]);
        $followers = Teacher::loadRelated("followers", ["following_fk" => $user_id]);
        $schools = Teacher::loadRelated("join_requests", ["lecture_fk" => $user_id, 'status' => 1]);
        $stmt = Teacher::prepare("SELECT * FROM join_requests as j INNER JOIN schools as s ON j.school_fk = s.user_fk WHERE j.lecture_fk = $user_id");
        $stmt->execute();
        $join_requests = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $teacher->loadData($data);
        $teacher->courses = $courses;
        $teacher->followers = $followers;
        $teacher->join_requests = $join_requests;
        $teacher->schools = $schools;
        return $this->render('teacherDashboard', [
            'model' => $teacher
        ]);
    }
    public function addrequest(Request $request, Response $response)
    {
        $teacher = new Teacher();
        if (isset($request->getBody()['schoolID'])) {
            $schoolId = $request->getBody()['schoolID'];
            $teacher->joinRequest($schoolId);
            $response->redirect("/dashboard");
        }
        return $this->render('schoolList', [
            'model' => $teacher
        ]);
    }
}
