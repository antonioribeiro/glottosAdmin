<?php

Blade::extend(function ($view) {

	return preg_replace('/{{\'((.|\s)*?)\'}}/', '<?php echo Glottos::translate("$1"); ?>', $view);

});
