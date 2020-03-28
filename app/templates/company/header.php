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
<!DOCTYPE html>
<html lang="<?php echo LANGUAGE_CODE; ?>">
<head>

	<!-- Site meta -->
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<?php
	//hook for plugging in meta tags
	$hooks->run('meta');
	?>
	<title><?php echo $data['title'];?></title>

	<link rel="icon" type="image/png" href="<?php echo DIR;?>app/templates/default/img/header_icon_16x16.png" sizes="16x16" />
	<!-- CSS -->
	<?php
	Assets::css(array(
		'app/templates/company/css/style.css',
		Url::templatePath() . 'css/bootstrap.min.css',
    	'https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900,200italic,300italic,400italic,600italic,700italic,900italic|Roboto+Condensed:300italic,400italic,700italic,400,300,700',
		'https://fonts.googleapis.com/css?family=Roboto+Condensed:300italic,400italic,700italic,400,300,700'     
	));

	//hook for plugging in css
	$hooks->run('css');
	?>

</head>
<body>
<?php
//hook for running code after body tag
$hooks->run('afterBody');
?>

