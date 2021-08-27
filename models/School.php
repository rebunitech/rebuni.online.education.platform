<?php

namespace app\models;

use app\core\Application;
use app\core\DBModel;

class School extends DBModel
{
	public int $user_fk;
	public string $name = '';
	public string $email = '';
	public string $phone_number = '';
	public string $p_o_box = '';
	public string $region = '';
	public string $state = '';
	public string $is_open = '';
	public string $date_registerd = '';
	public string $payment_id = '';

	public function tableName(): string
	{
		return 'schools';
	}

	public function attributes(): array
	{
		return ['name', 'email', 'phone_number', 'p_o_box', 'region', 'state', 'user_fk', 'payment_id'];
	}
	public function rules() {
		return [
			'name' => [self::RULE_REQUIRED],
			'payment_id' => [self::RULE_REQUIRED],
			'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
			'phone_number' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 10], [self::RULE_MAX, 'max' => 13]]
		];
	}

	public function labels(): array
	{
		return [
			'name' => 'Name',
			'email' => 'Email',	
			'phone_number' => 'Phone number',
			'p_o_box' => 'P.O.Box',	
			'region' => 'Region',	
			'state' => 'State',	
			'is_open' => 'Open for join request',
			'payment_id' => 'Payment ID',
		];
	}

	public function save($extra_attribute = [])
	{
		$this->user_fk = Application::$app->getUesrId();
		return parent::save($extra_attribute);
	}
}

?>