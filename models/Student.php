<?php

namespace app\models;

use app\models\User;

class Student extends User
{
    
    public function rules(): array
    {
        return [];
    }

    public function attributes(): array
    {
        return ['first_name', 'last_name', 'email', 'username', 'date_of_birth'];
    }

 
}

?>