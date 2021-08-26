<?php
namespace app\core\form;

use app\core\Model;

class Field
{
	public Model $model;
	public string $attribute;
	
	public const TYPE_TEXT = 'text';
	public const TYPE_PASSWORD = 'password';
	public const TYPE_EMAIL = 'email';
	public const TYPE_NUMBER = 'number';


	public function __construct(Model $model, $attribute, $type='text')
	{
		$this->model = $model;
		$this->attribute = $attribute;
		$this->type = $type;
	}

	public function __toString()
	{
		return sprintf('
			<div>
				<div>%s</div>
				<div><input type="%s" name="%s" value="%s" class="form-control %s" /> 
				<div class="error">%s</div>
			</div>
			', $this->model->getLabel($this->attribute),
			   $this->type,
			   $this->attribute,
			   $this->model->{$this->attribute},
			   $this->model->hasError($this->attribute) ? 'invalid' : '',
			   $this->model->getFirstError($this->attribute)
			);	
	}

}

?>