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
            $course = Course::findOne(["id" => $courseID]);
            if($course->is_paid) {
                $school = School::findOne(["user_fk" => $course->school_fk]);
                $sellerCode = $school->payment_id;
                $useSandbox = true;
                $checkoutOptions = new CheckoutOptions($sellerCode, $useSandbox);
                $checkoutOptions -> setProcess(CheckoutType::Express);
                // $checkoutOptions -> setSuccessUrl("/");
                // $checkoutOptions -> setCancelUrl($cancelUrl);
                // $checkoutOptions -> setFailureUrl($failureUrl);
                // $checkoutOptions -> setIPNUrl($ipnUrl);
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
}

?>