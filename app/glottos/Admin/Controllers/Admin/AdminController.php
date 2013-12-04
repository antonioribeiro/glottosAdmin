<?php namespace Admin\Controllers\Admin;

use Admin\Controllers\BaseController;
use \Redirect;

class AdminController extends BaseController {

	public function index()
	{
		return Redirect::route('admin.languages.index');
	}

}