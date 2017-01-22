<?php

use Lib\Validation\ContactValidator as ContactValidator;

class ContactController extends BaseController {

    public function __construct(ContactValidator $validation)
	{
		parent::__construct();
		$this->validation = $validation;
	}

	public function getForm()
	{
		return View::make('contact');
	}

	public function postForm()
	{
		if ($this->validation->fails()) {
		  return Redirect::to('contact/form')->withErrors($this->validation->errors())->withInput();
		} else {
			/*Mail::send('emails.contact', Input::all(), function($m)	{
				$m->to('laurent_0306@hotmail.com')->subject('Contact');
			});*/
			return View::make('confirm');
		}
	}

}