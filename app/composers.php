<?php

View::composer('home.layout', function($view)
{
	$lang = Session::get('glottos.lang');

	if (is_null($lang) || $lang === 'en')
	{
		$title = 'português';
		$url = URL::route('language.select', ['pt-br']);
	}
	else
	{
		$title = 'english';
		$url = URL::route('language.select', ['en']);
	}

    $view->with('switchLanguageTitle', $title);
 	$view->with('switchLanguageUrl', $url);
});

View::composer('admin.layout', function($view)
{
	if(Session::has('success'))
	{
		$view->with('success', Session::get('success'));
	}

	if(Session::has('info'))
	{
		$view->with('info', Session::get('info'));
	}

	if(Session::has('warning'))
	{
		$view->with('warning', Session::get('warning'));
	}

	if(Session::has('danger'))
	{
		$view->with('danger', Session::get('danger'));
	}
});

