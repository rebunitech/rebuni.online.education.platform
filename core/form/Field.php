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
			  <div class="m-3">
				<label for="id_%s" class="form-label m-2">%s</label>
			    <input type="%s" name="%s" class="form-control" id="id_%s" value="%s">
			    <div class="text-danger m-2">%s</div>
			  </div>
			', 
			   $this->attribute,
			   $this->model->getLabel($this->attribute),
			   $this->type,
			   $this->attribute,
			   $this->attribute,
			   $this->model->{$this->attribute},
			   $this->model->getFirstError($this->attribute)
			);	
	}

}

?>