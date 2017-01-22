<?php

use Lib\Validation\UserLoginValidator as UserLoginValidator;

class AuthController extends BaseController {

    protected $login_validation;

	public function __construct(UserLoginValidator $login_validation)
	{
		parent::__construct();
		$this->login_validation = $login_validation;
		$this->beforeFilter('ajax');
	}

	public function postLogin()
	{
		if ($this->login_validation->fails()) {
    	return Response::json($this->login_validation->errors()->toArray());
		} else {
			$user = array(
				'name' => Input::get('name'), 
				'password' => Input::get('password')
			);
			if(Auth::attempt($user, Input::get('souvenir'))) {
				return Response::json(array('ok' => (Auth::user()->admin)? 'admin' : 'user'));
			}
			return Response::json(array('password' => 'mauvais'));
		}
	}

	public function getLogout()
	{
		Auth::logout();
		return Response::make('', 200);
	}

}