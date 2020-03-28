<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package web2feel
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="page" class="hfeed site">
	<div class="top-bar">
		<div class="container"><div class="row">
			<div class="col-md-12">
				<div class="custom-search">
					<?php get_search_form();?>
				</div>
			</div>
		</div></div>
	</div>
	<header id="masthead" class="site-header" role="banner">
		<div class="container"> <div class="row"> 
			<div class="col-md-4">
				<div class="site-branding">

	<?php if (get_theme_mod(FT_scope::tool()->optionsName . '_logo', '') != '') { ?>
				<h1 class="site-title logo"><a class="mylogo" rel="home" href="<?php bloginfo('siteurl');?>/" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><img relWidth="<?php echo intval(get_theme_mod(FT_scope::tool()->optionsName . '_maxWidth', 0)); ?>" relHeight="<?php echo intval(get_theme_mod(FT_scope::tool()->optionsName . '_maxHeight', 0)); ?>" id="ft_logo" src="<?php echo get_theme_mod(FT_scope::tool()->optionsName . '_logo', ''); ?>" alt="" /></a></h1>
	<?php } else { ?>
				<h1 class="site-title logo"><a id="blogname" rel="home" href="<?php bloginfo('siteurl');?>/" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
	<?php } ?>

				</div>
			</div>
			<div class="col-md-8">
				<?php if( ft_of_get_option('fabthemes_topad')!=''){ ?>
				<div class="top-ad">
					<?php echo ft_of_get_option('fabthemes_topad'); ?>
				</div>
				<?php } ?>
			</div>
		</div></div>
	</header><!-- #masthead -->
	<div class="main-menu">
		<div class="container"> <div class="row"> 
			<div class="col-md-12"> 
			<div class="mobilenavi"></div>	
				<nav id="site-navigation" class="main-navigation" role="navigation">
					<?php wp_nav_menu( array( 'theme_location' => 'primary','container_class' => 'topmenu','menu_id'=>'topmenu' ) ); ?>
				</nav><!-- #site-navigation -->
			</div>
		</div></div>
	</div>
	
	<div id="content" class="site-content">
