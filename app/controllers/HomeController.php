<?php

class HomeController extends BaseController {

    protected $messages;
    protected $livre;

	public function __construct(Livre $livre)
	{
		//$this->messages = $messages;
	  	$this->livre = $livre;
	}

	/*public function showWelcome()
	{
		$message = $this->messages->generaux()->bonjour;
		return View::make('hello')->with('message', $message);
	}*/

	public function index()
	{
		return View::make('livres', array('livres' => $this->livre->all()));
	}

}