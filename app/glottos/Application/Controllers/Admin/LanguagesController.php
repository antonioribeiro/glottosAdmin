<?php namespace Application\Controllers\Admin;

use PragmaRX\Glottos\Support\Locale;
use Application\Controllers\BaseController;
use \Glottos;
use \View;
use \Session;
use \URL;
use \Input;
use \Redirect;

class LanguagesController extends BaseController {

	public function index($filter = null)
	{
		switch ($filter) {
			case 'enabled':
				$languages = Glottos::getEnabledLanguages();
				$filtered = 'enabled';
				break;

			case 'disabled':
				$languages = Glottos::getDisabledLanguages();
				$filtered = 'disabled';
				break;
			
			default:
				$languages = Glottos::getAllLanguages();
				$filtered = 'all';
				break;
		}

		return View::make('admin.pages.index')
					->with('languages', $languages)
					->with('filtered', $filtered);
	}

	public function enableLanguage($id)
	{
		return $this->enableDisableLanguage($id, true);
	}

	public function disableLanguage($id)
	{
		return $this->enableDisableLanguage($id, false);
	}

	public function enableDisableLanguage($id, $enable)
	{
		Glottos::enableDisableLanguage($id, $enable);

		return Redirect::back();
	}

	public function stats()
	{
		$languages = Glottos::getEnabledLanguages();

		$stats = Glottos::getLanguageStats();

		return View::make('admin.pages.stats')
					->with('stats', $stats[0])
					->with('languages', $languages);
	}

	public function show($localeSecondary, $localePrimary = null)
	{
		$localePrimary = $localePrimary ?: (Session::get('glottos.primary.language') ?: Glottos::getDefaultLocale());

		$messages = Glottos::getTranslations($localePrimary, $localeSecondary);

		$localePrimary = Glottos::findLocale($localePrimary);
		$localeSecondary = Glottos::findLocale($localeSecondary);

		$enabledLanguages = [];

		foreach(Glottos::getEnabledLanguages() as $language)
		{
			$linkA = URL::route(
									'admin.languages.show',
									array(
											$localeSecondary->locale->getText(),
											Glottos::getLocaleAsText($language->language_id, $language->country_id)
										)
								);

			$linkB = URL::route(
									'admin.languages.show',
									array(
											Glottos::getLocaleAsText($language->language_id, $language->country_id),
											$localePrimary->locale->getText()
										)
								);

			$languagesPrimary[$linkA] = $language->regional_name;

			$languagesSecondary[$linkB] = $language->regional_name;
		}

		$selectedPrimary = URL::route(
									'admin.languages.show',
									array(
											$localeSecondary->locale->getText(),
											$localePrimary->locale->getText()
										)
								);

		$selectedSecondary = URL::route(
									'admin.languages.show',
									array(
											$localeSecondary->locale->getText(),
											$localePrimary->locale->getText()
										)
								);

			// k($selectedPrimary);
			// kk($selectedSecondary);

		return View::make('admin.pages.translatedMessages')
					->with('localePrimary', $localePrimary)
					->with('localeSecondary', $localeSecondary)
					->with('languagesPrimary', $languagesPrimary)
					->with('languagesSecondary', $languagesSecondary)
					->with('selectedPrimary', $selectedPrimary)
					->with('selectedSecondary', $selectedSecondary)
					->with('messages', $messages);
	}

	public function edit($message, $localePrimary, $localeSecondary)
	{
		$primaryMessage = Glottos::findTranslationById($message, $localePrimary);
		$secondaryMessage = Glottos::findTranslationById($message, $localeSecondary);
		$key = '';

		if($primaryMessage)
		{
			$key = $primaryMessage->message->key;
		}
		else
		{
			$originalMessage = Glottos::findMessageById($message);

			if($originalMessage)
			{
				$key = $originalMessage->key;
			}
		}

		$localePrimary = Glottos::findLocale($localePrimary);
		$localeSecondary = Glottos::findLocale($localeSecondary);

		foreach(Glottos::getEnabledLanguages() as $language)
		{
			if( $language->language_id.'-'.$language->country_id !== $localeSecondary->language_id.'-'.$localeSecondary->country_id )
			{
				$linkA = URL::route(
										'admin.translation.edit',
										array(	
												$message,
												$language->language_id.'-'.$language->country_id,
												$localeSecondary->locale->getText()
											)
									);

				$languagesPrimary[$linkA] = $language->regional_name;			
			}
		}

		$selectedPrimary = URL::route(
									'admin.translation.edit',
									array(
											$message,
											$localePrimary->locale->getText(),
											$localeSecondary->locale->getText()
										)
								);		

        $formAction = URL::route('admin.translation.store', [
                                                            $message, 
                                                            $localePrimary->language_id.'-'.$localePrimary->country_id, 
                                                            $localeSecondary->language_id.'-'.$localeSecondary->country_id
                                                        ]);

        $nextLink = URL::route('admin.translation.next', [
                                                            $localePrimary->language_id.'-'.$localePrimary->country_id, 
                                                            $localeSecondary->language_id.'-'.$localeSecondary->country_id
                                                        ]);
		return View::make('admin.pages.translate')
					->with('formAction', $formAction)
					->with('nextLink', $nextLink)
					->with('localePrimary', $localePrimary)
					->with('localeSecondary', $localeSecondary)
					->with('key', $key )
					->with('languagesPrimary', $languagesPrimary)
					->with('selectedPrimary', $selectedPrimary)
					->with('primaryMessage', $primaryMessage ? $primaryMessage->translation : '' )
					->with('secondaryMessage', $secondaryMessage ? $secondaryMessage->translation : '');		
	}

	public function store($message, $localePrimary, $localeSecondary)
	{
		$primaryMessage = Glottos::findTranslationById($message, $localePrimary);
		$secondaryMessage = Glottos::findTranslationById($message, $localeSecondary);

		if (Input::get('message'))
		{
			Glottos::updateOrCreateTranslation($message, Input::get('message'), $localeSecondary);
		}
		else
		{
			return Redirect::back()->with('danger', 'Translation cannot be blank');
		}

		$localePrimary = Glottos::findLocale($localePrimary);
		$localeSecondary = Glottos::findLocale($localeSecondary);

		return Redirect::route('admin.translation.next',[
                                                            $localePrimary->language_id.'-'.$localePrimary->country_id, 
                                                            $localeSecondary->language_id.'-'.$localeSecondary->country_id
                                                        ])
								->with('success', 'Translation was saved and you were redirected to the next untranslated message.');
	}

	public function next($primaryLocale, $secondaryLocale)
	{
		$localeSecondary = Glottos::findLocale($secondaryLocale);

		$next = Glottos::findNextUntranslated($primaryLocale, $secondaryLocale);

		if(! $next)
		{
			return Redirect::route('admin.languages.stats')->with('danger', 'There are no untranslated messages for this language.');
		}

		return $this->edit($next->message_id, $primaryLocale, $secondaryLocale);
	}

	public function translate()
	{
		$localePrimary = Glottos::findLocale(Glottos::getPrimaryLocale());
		$localeSecondary = Glottos::findLocale(Glottos::getSecondaryLocale());

		return Redirect::route('admin.translation.next',[
                                                            $localePrimary->language_id.'-'.$localePrimary->country_id, 
                                                            $localeSecondary->language_id.'-'.$localeSecondary->country_id
                                                        ]);
	}
}