<?php namespace Lib\Validation;

use Validator, Input;

abstract class BaseValidator implements ValidatorInterface {

    protected $regles = array();
	protected $errors = array();
	protected $messages = array();

	public function fails($id = null)
	{
		if(!is_null($id)) $this->regles = str_replace('id', $id, $this->regles);

		$validation = Validator::make(Input::all(), $this->regles, $this->messages);

		if($validation->fails())
		{
			$this->errors = $validation->messages();
			return true;
		}
		return false;
	}

	public function errors()
	{
		return $this->errors;
	}

}