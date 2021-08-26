<?php

namespace app\models;

use app\core\DBModel;


class LoginUser extends DBModel
{

	public string $username = '';
	public string $password = '';
	public int $user_id;
	
	public function tableName(): string
	{
		return 'users';
	}

	public function attributes(): array
	{
		return ['username', 'password'];
	}

	public function labels(): array
	{
		return [
			'username' => 'Username',
			'password' => 'Password',	
		];
	}
	public function rules()
	{
		return [
			'username' => [self::RULE_REQUIRED],
			'password' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 8]]
		];
	}



	public function authenticate()
	{

		$user = self::findOne(["username" => $this->username], ['id', 'password']);
		if ($user) {
			if(password_verify($this->password, $user->password)){
				$this->user_id = $user->id;
				return $user->user_type ?? false;
			} else {
				$this->addError('username', self::RULE_INVALID, ["field" => "username and/or password"]);
			}
		} else {
			$this->addError('username', self::RULE_INVALID, ["field" => "username and/or password"]);	
		}
	
	}

	public function login()
	{
		Application::$app->session->setAuthSession('user_id', $this->user_id);
	}
}

?>