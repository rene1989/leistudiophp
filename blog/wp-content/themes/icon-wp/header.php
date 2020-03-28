<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package iconwp
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'iconwp' ); ?></a>
	
	<header id="masthead" class="site-header" role="banner">
    	<div class="container">
                    <div class="site-branding">
                    	<?php if ( get_theme_mod( 'iconwp_logo' ) ) : ?>								
                            <div id="site-logo"><a href="<?php echo esc_url(home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name') ); ?>" rel="home"><img src="<?php echo esc_url(get_theme_mod( 'iconwp_logo' )); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" /></a>
                            </div>
        
						<?php else : ?>
                            <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                            <p class="site-description"><?php bloginfo( 'description' ); ?></p>
                         <?php endif; ?>
                    </div><!-- .site-branding -->
                    <nav id="site-navigation" class="main-navigation" role="navigation">
                        <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><i class="fa fa-bars"></i></button>
                        <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
                    </nav><!-- #site-navigation -->
        </div>
    </header><!-- #masthead -->
    <?php if(is_home() || is_front_page()){ ?>
		<?php get_template_part( 'inc/slider' ) ?>
    <?php } ?>	
	<div id="content" class="site-content">
    
