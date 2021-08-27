<?php

namespace app\models;

use app\core\DBModel;
use app\core\Application;
use PDO;

class Course extends DBModel
{
    public int $school_fk;
    public string $title = '';
    public ?string $description = '';
    public $is_paid = 0;
    public ?float $price = 0.0;

    public function tableName(): string
    {
        return 'courses';
    }

    public function rules(): array
    {
        return [];
    }

    public function attributes(): array
    {
        return ['school_fk', 'title', 'description', 'is_paid', 'price'];
    }

    public function labels(): array
    {
        return [
            'title' => 'Title',
            'is_paid' => 'Is Paid',
            'price' => 'Price',
            'description' => 'Description'
        ];   
    }


    public function loadCourses()
    {
        $this->school_fk = Application::$app->getUesrId();
        $stmt = $this->prepare("SELECT * FROM courses WHERE school_fk=$this->school_fk;");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function listCourse()
    {
        $stmt = $this->prepare("SELECT * FROM courses");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function save($extra_attribute = [])
	{
		$this->school_fk = Application::$app->getUesrId();
        if ($this->is_paid == 'on'){
            $this->is_paid = 1;
        } else {
            $this->is_paid = 0;
        }

		return parent::save($extra_attribute);
	}

    public function addPaidCustomer($userID, $courseID)
    {
        $stmt = $this->prepare("INSERT INTO course_student (student_fk, course_fk, paid) VALUES (:userID, :courseID, 1)");
        $stmt->bindValue(":userID", $userID);
        $stmt->bindValue(":courseID", $courseID);
        $stmt->execute();
        return true;
    }
}
?>