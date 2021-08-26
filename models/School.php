<?php

namespace app\models;

use app\core\DBModel;

class School extends DBModel
{
	public function tableName(): string
	{
		return 'users';
	}

	public function attributes(): array
	{
		return [];
	}
	public function rules() {
		return [];
	}
}

?>