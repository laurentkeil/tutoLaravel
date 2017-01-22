<?php namespace Lib\Gestion;

use Email;
use Input;

class EmailGestion implements EmailGestionInterface {

    protected $email;

	public function __construct(Email $email)
	{
		$this->email = $email;
	}

	public function save()
	{
		$email = new $this->email;
		$email->email = Input::get('email');
		$email->save();
	}

}