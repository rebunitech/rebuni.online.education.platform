<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Response;
use app\core\Request;
use app\models\Course;
use app\models\School;
use YenePay\Models\CheckoutOptions;
use YenePay\Models\CheckoutItem;
use YenePay\Models\CheckoutType;
use YenePay\CheckoutHelper;

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

        if ($request->isPost())
        {
            $course->loadData($request->getBody());
            if($course->validate() && $course->save()) {
                Application::$app->session->setFlash('success', "Course add successfull!");
			    $response->redirect('/courses');
            }
        }
        return $this->render('addCourse', [
			'model' => $course,
		]);
    }

    public function viewCourse(Request $request, Response $response)
    {
        $course = new Course();
        $user_id = Application::$app->getUesrId();
        if (isset($request->getBody()['courseID'])){
            $courseID = $request->getBody()['courseID'];
            $exist = Course::exist(['course_fk' => $courseID, "student_fk" => $user_id], "course_student");
            $course = Course::findOne(["id" => $courseID]);
            $course->user_paid = $exist;
            $course->id = $courseID;
            if($course->is_paid && !$course->price == 0 && !$course->user_paid) {
                $school = School::findOne(["user_fk" => $course->school_fk]);
                $sellerCode = $school->payment_id;
                $useSandbox = true;
                $checkoutOptions = new CheckoutOptions($sellerCode, $useSandbox);
                $checkoutOptions -> setProcess(CheckoutType::Express);
                $url = "http://".$_SERVER["HTTP_HOST"]."/paid";
                $checkoutOptions -> setSuccessUrl($url);
                $checkoutOptions -> setMerchantOrderId("$user_id-$courseID-$school->user_fk");
                $checkoutOptions -> setExpiresAfter("2880");

                $checkoutOrderItem = new CheckoutItem("$courseID-$course->title", $course->price, 1);
                $checkoutHelper = new CheckoutHelper();
                $checkoutUrl = $checkoutHelper -> getSingleCheckoutUrl($checkoutOptions, $checkoutOrderItem);
                $course->checkoutUrl = $checkoutUrl;
            }

            return $this->render('courseDetail', [
                'model' => $course,
            ]);
            
        }
        $response->redirect("/student");
    }

    public function paid(Request $request, Response $response)
    {
        $course = new Course();
        $data = $request->getBody();
        $MerchantOrderId = $data['MerchantOrderId'];
        $data_list = explode('-', $MerchantOrderId);
        $user_id = $data_list[0];
        $courseID = $data_list[1];
        $exist = Course::exist(['course_fk' => $courseID, "student_fk" => $user_id], "course_student");
        if(!$exist){
            $course->addPaidCustomer($user_id, $courseID);
        }
        $response->redirect("/takeCourse?courseID=$courseID");
    }

    public function takeCourse(Request $request, Response $response)
    {
        $data = $request->getBody();
        $courseID = $data['courseID'];
        $content = Course::findOne(["id" => $courseID]);
        return $this->render('courseContent', [
            'model' => $content,
        ]);
    }
}

?>