<?php namespace Application\Controllers\Admin;

use Application\Controllers\BaseController;
use \Redirect;

class AdminController extends BaseController {

	public function index()
	{
		return Redirect::route('admin.languages.index');
	}

}