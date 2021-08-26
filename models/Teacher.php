<?php

namespace app\models;

use app\core\Application;
use app\core\DBModel;

class Teacher extends DBModel
{

    public int $user_fk;
    public ?string $first_name = '';
	public ?string $last_name = '';
	public string $email = '';
	public string $username = '';
    public ?string $date_of_birth = '';
    public string $is_active = '';
    public string $is_staff = '';
    public ?string $phone_number = '';
    public ?string $p_o_box = '';
    public ?string $region = '';
    public ?string $state = '';


    public function tableName(): string
    {
        return 'users';
    }

    public function rules(): array
    {
        return [];
    }

    public function attributes(): array
    {
        return ['first_name', 'last_name', 'email', 'username', 'date_of_birth'];
    }

    public function load($data)
    {
        $this->user_fk = Application::$app->getUesrId();
        parent::load($data);
    }

}

?>