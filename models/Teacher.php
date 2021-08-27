<?php

namespace app\models;

use app\core\Application;
use app\models\User;
use PDO;

class Teacher extends User
{

    public function rules(): array
    {
        return [];
    }

    public function attributes(): array
    {
        return ['first_name', 'last_name', 'email', 'username', 'date_of_birth'];
    }

    public function joinRequest($school_fk)
    {
        $lecture_fk = Application::$app->getUesrId();
        $stmt = $this->prepare("INSERT INTO join_requests (lecture_fk, school_fk) VALUES ($lecture_fk, $school_fk);");
        $stmt->execute();
    }

    public function openSchoolList()
    {
        $stmt = $this->prepare("SELECT * FROM schools WHERE is_open=1");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}

?>