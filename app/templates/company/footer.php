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
	'app/templates/company/js/scripts.js'		
);

Assets::js($js_array);

//hook for plugging in javascript
$hooks->run('js');

//hook for plugging in code into the footer
$hooks->run('footer');
?>

</body>
</html>
