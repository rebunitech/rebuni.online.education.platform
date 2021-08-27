<?php

namespace app\models;

use app\core\DBModel;
use app\core\Application;
use PDO;

class Course extends DBModel
{
    public int $school_fk;
    public string $title = '';
    public bool $is_paid = false;
    public ?float $price;

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
        return ['school_fk', 'title', 'is_paid', 'price'];
    }

    public function loadCourses()
    {
        $this->school_fk = Application::$app->getUesrId();
        $stmt = $this->prepare("SELECT * FROM courses WHERE school_fk=$this->school_fk;");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>