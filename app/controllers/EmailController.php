<?php

use Lib\Validation\EmailValidator as EmailValidator;
use Lib\Gestion\EmailGestion as EmailGestion;

class EmailController extends BaseController {

    protected $emailgestion;

	public function __construct(EmailValidator $validation, EmailGestion $emailgestion)
	{
		parent::__construct();
		$this->validation = $validation;
		$this->emailgestion = $emailgestion;
	}

	public function getForm()
	{
		return View::make('email');
	}

	public function postForm()
	{
		if ($this->validation->fails()) {
		  return Redirect::to('email/form')
		  ->withErrors($this->validation->errors());
		} else {
			$this->emailgestion->save();
			return View::make('email_ok');
		}
	}

}