<?php

namespace app\models;

use app\core\Application;
use app\core\DBModel;

abstract class User extends DBModel
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

    public function loadData($data)
    {
        $this->user_fk = Application::$app->getUesrId() ?? 0;
        parent::loadData($data);
    }

}

?>