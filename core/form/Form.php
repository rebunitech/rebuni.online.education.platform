<?php
namespace app\core\form;

use app\core\Model;
use app\core\form\Field;

class Form
{
	public static function begin(string $action, string $method)
	{
		echo sprintf('<form action="%s"  method="%s" class="mx-3" role="form">', $action, $method);
		return new Form();
	}

	public static function end()
	{
		return "</form>";
	}

	public function field(Model $model, $attribute, $type = "text")
	{
		return new Field($model, $attribute, $type);
	}
}
?>