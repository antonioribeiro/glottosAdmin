<?php namespace Application\Controllers;

use \View;
use \Auth;
use \Redirect;
use \Input;

class LogonController extends BaseController {

	public function form()
	{
		return View::make('admin.login.form');
	}

	public function login()
	{
		$credentials = ['email' => Input::get('email'), 'password' => Input::get('password')];

		if(Auth::check())
		{
			Auth::logout();
		}

		if (Auth::attempt($credentials))
		{
			return Redirect::intended();
		}

		return Redirect::refresh()->with('danger', 'E-mail and/or password are invalid');
	}

	public function logout()
	{
		Auth::logout();

		return Redirect::route('home');
	}

}