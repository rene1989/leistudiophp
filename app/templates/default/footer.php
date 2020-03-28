<?php
/**
 * Sample layout
 */

use Helpers\Assets;
use Helpers\Url;
use Helpers\Hooks;

//initialise hooks
$hooks = Hooks::get();
?>


<!-- JS -->
<?php

	$js_array=array(
	Url::templatePath() . 'js/jquery.js',
	'//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js',
	Url::templatePath() . 'js/bootstrap.min.js',
	Url::templatePath() . 'js/animatescroll.js',
	Url::templatePath() . 'js/retina.min.js',
	Url::templatePath() . 'js/jquery.form-validator.min.js',
	Url::templatePath() . 'js/jquery.validate.min.js',
	Url::templatePath() . 'js/scripts.js'		
);

if($data['language'] != "en"){
	if($data['language'] == "cn"){
 		${error_message_localization_code} = "zh";
 	}
 	else{
 		${error_message_localization_code} = $data['language'];
 	}
	
	array_push($js_array, Url::templatePath() . 'js/localization/messages_'.${error_message_localization_code}.'.js');
}
Assets::js($js_array);

//hook for plugging in javascript
$hooks->run('js');

//hook for plugging in code into the footer
$hooks->run('footer');
?>

</body>
</html>
