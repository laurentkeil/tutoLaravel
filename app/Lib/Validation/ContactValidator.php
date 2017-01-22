<?php namespace Lib\Validation;

class ContactValidator extends BaseValidator {

    public function __construct()
	{
		$this->regles = array(
			'nom' => 'required|min:5|max:20|alpha',
			'email' => 'required|email',
			'texte' => 'required|max:250'
		);
	}

}