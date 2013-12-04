<?php namespace Application\Services;

class Language {

	public static function guess($userRepository = null, $session, $glottos)
	{
		if( ! $lang = $session->get('glottos.lang'))
		{
			if( ! is_null($userRepository) && ! is_null($userRepository->locale))
			{
				$lang = $userRepository->locale;
			}
		}


		if(is_null($lang))
		{
	        $lang = !empty($_SERVER['HTTP_ACCEPT_LANGUAGE']) ? strtolower(strtok(strip_tags($_SERVER['HTTP_ACCEPT_LANGUAGE']), ',')) : '';

	        if(! $glottos->localeIsAvailable($lang))
	        {
	        	$lang = $glottos->getLocaleAsText();
	        }
		}

		$session->put('glottos.lang', $lang);

		$glottos->setLocale($lang);

		return $lang;
	}

}