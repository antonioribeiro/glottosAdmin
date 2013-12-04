<?php namespace Application\Controllers;

use \View;

class HomeController extends BaseController {

	public function index()
	{
		return View::make('home.layout');
	}

}