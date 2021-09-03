<?php

namespace app\models;

use app\core\DBModel;

class RegisterUser extends DBModel
{
	public string $first_name = '';
	public string $last_name = '';
	public string $email = '';
	public string $username = '';
	public string $password = '';
	public string $passwordConfirm = '';
	public string $user_type = '';

	public function tableName(): string
	{
		return 'users';
	}

	public function attributes(): array
	{
		return ['first_name', 'last_name', 'email', 'password', 'username', 'user_type'];
	}

	public function labels(): array
	{
		return [
			'first_name' => 'First name',
			'last_name' => 'Last name',
			'email' => 'Email',
			'username' => 'Username',
			'password' => 'Password',
			'passwordConfirm' => 'Confirm password',
		];
	}
	public function rules()
	{
		return [
			'first_name' => [self::RULE_REQUIRED],
			'last_name' => [self::RULE_REQUIRED],
			'email' => [self::RULE_REQUIRED, self::RULE_EMAIL, [self::RULE_UNIQUE, 'class' => self::class]],
			'password' => [self::RULE_REQUIRED, self::RULE_NUMERIC, [self::RULE_MIN, 'min' => 8]],
			'passwordConfirm' => [self::RULE_REQUIRED, [self::RULE_MATCH, 'match' => 'password']],
			'username' => [self::RULE_REQUIRED, [self::RULE_UNIQUE, 'class' => self::class]],
			'user_type' => [self::RULE_REQUIRED],

		];
	}



	public function save($extra_attribute = [])
	{
		$this->password = password_hash($this->password, PASSWORD_DEFAULT);
		return parent::save($extra_attribute);
	}
}

?>