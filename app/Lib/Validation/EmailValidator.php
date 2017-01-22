<?php namespace Lib\Validation;

class EmailValidator extends BaseValidator {

    public function __construct()
	{
		$this->regles = array(
			'email' => 'required|email|unique:emails'
		);
	}

}