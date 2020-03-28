<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package iconwp
 */

get_header(); ?>
	<?php if(get_theme_mod( 'iconwp_display_optional_pages_setting' ) == 1){ ?> 
	<section id="home-optional-pages" style="background:#f4f4f4; padding:50px 0; text-align:center;">
        <div class="container">
        	<div class="row">
            	<div class="col-md-4">
                	<?php if ( get_theme_mod( 'iconwp_page_one_img_url_setting' ) ) : ?>
                        <div class="circle-img">
                            <img src="<?php echo esc_url(get_theme_mod( 'iconwp_page_one_img_url_setting' )); ?>"  />
                        </div>
                    <?php endif; ?>
                    <?php if ( get_theme_mod( 'iconwp_page_one_title_setting' ) ) : ?>
                    	<h2><?php echo get_theme_mod( 'iconwp_page_one_title_setting' ); ?></h2>
                    <?php endif; ?>
                    <?php if ( get_theme_mod( 'iconwp_page_one_desc_setting' ) ) : ?>
                    	<p><?php echo get_theme_mod( 'iconwp_page_one_desc_setting' ); ?></p>
                    <?php endif; ?>
                    <?php if ( get_theme_mod( 'iconwp_page_one_url_setting' ) ) : ?>
                    	<a href="<?php echo esc_url(get_theme_mod( 'iconwp_page_one_url_setting' )); ?>" class="btn btn-lg btn-primary">Read More</a>
                    <?php endif; ?>
                </div>
                <div class="col-md-4">
                	<?php if ( get_theme_mod( 'iconwp_page_two_img_url_setting' ) ) : ?>
                        <div class="circle-img">
                            <img src="<?php echo esc_url(get_theme_mod( 'iconwp_page_two_img_url_setting' )); ?>"  />
                        </div>
                    <?php endif; ?>
                    <?php if ( get_theme_mod( 'iconwp_page_two_title_setting' ) ) : ?>
                    	<h2><?php echo get_theme_mod( 'iconwp_page_two_title_setting' ); ?></h2>
                    <?php endif; ?>
                    <?php if ( get_theme_mod( 'iconwp_page_two_desc_setting' ) ) : ?>
                    	<p><?php echo get_theme_mod( 'iconwp_page_two_desc_setting' ); ?></p>
                    <?php endif; ?>
                    <?php if ( get_theme_mod( 'iconwp_page_two_url_setting' ) ) : ?>
                    	<a href="<?php echo esc_url(get_theme_mod( 'iconwp_page_two_url_setting' )); ?>" class="btn btn-lg btn-primary">Read More</a>
                    <?php endif; ?>
                </div>
                <div class="col-md-4">
                	<?php if ( get_theme_mod( 'iconwp_page_three_img_url_setting' ) ) : ?>
                        <div class="circle-img">
                            <img src="<?php echo esc_url(get_theme_mod( 'iconwp_page_three_img_url_setting' )); ?>"  />
                        </div>
                    <?php endif; ?>
                    <?php if ( get_theme_mod( 'iconwp_page_three_title_setting' ) ) : ?>
                    	<h2><?php echo get_theme_mod( 'iconwp_page_three_title_setting' ); ?></h2>
                    <?php endif; ?>
                    <?php if ( get_theme_mod( 'iconwp_page_three_desc_setting' ) ) : ?>
                    	<p><?php echo get_theme_mod( 'iconwp_page_three_desc_setting' ); ?></p>
                    <?php endif; ?>
                    <?php if ( get_theme_mod( 'iconwp_page_three_url_setting' ) ) : ?>
                    	<a href="<?php echo esc_url(get_theme_mod( 'iconwp_page_three_url_setting' )); ?>" class="btn btn-lg btn-primary">Read More</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
	</section>
    <?php } ?> 
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>
			<h1 class="posts-title">Recent Posts</h1>
			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', 'home' );
				?>

			<?php endwhile; ?>

			<?php the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
