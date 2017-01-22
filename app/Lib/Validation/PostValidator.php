<?php namespace Lib\Validation;

class PostValidator extends BaseValidator {

    public function __construct()
	{
		$this->regles = array(
			'titre' => 'required|max:80',
			'contenu' => 'required',
			'tags' => 'tags'
		);

		$this->messages = array(
			'tags' => 'Un tag doit avoir un maximum de 50 caractères.',
		);
	}

}