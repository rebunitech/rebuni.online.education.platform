<?php

namespace app\models;

use app\core\Application;

class LoginUser extends User
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
		$tableName = $this->tableName();
		$username = $this->username;
		$password = $this->password;

		$stmt = $this->prepare("SELECT id, password, user_type FROM $tableName WHERE username=:uname;");
		$stmt->bindValue(":uname", $username);
		if ($stmt->execute()){
			$user = $stmt->fetchObject();
			if ($user) {
				$user_id = $user->id;
				$password_hashed = $user->password;
				if(password_verify($password, $password_hashed)){
					$this->user_id = $user_id;
					return $user->user_type ?? false;
				} else {
					$this->addError('username', self::RULE_INVALID, ["field" => "username and/or password"]);
				}
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