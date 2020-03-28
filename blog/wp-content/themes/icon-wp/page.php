<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package iconwp
 */

get_header(); ?>
	<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
	<header class="entry-header title-container" <?php if (!empty($image)) { ?> style="background: url(<?php echo $image[0]; ?> ) center center / cover no-repeat !important;"<?php }else { ?> id="no-featured"<?php } ?>>
    	<div class="container">
        	<div class="inner-container">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
            </div>
        </div>
    </header><!-- .entry-header -->
    
<div class="breadcrumb-container">
	<div class="container">
		<?php iconwp_breadcrumb(); ?>
    </div>
</div>
<div class="container">
	<div class="row">
        <div class="col-md-8">
            <div id="primary" class="content-area">
                <main id="main" class="site-main" role="main">
                
                    <?php while ( have_posts() ) : the_post(); ?>
        
                        <?php get_template_part( 'template-parts/content', 'page' ); ?>
        
                        <?php
                            // If comments are open or we have at least one comment, load up the comment template.
                            if ( comments_open() || get_comments_number() ) :
                                comments_template();
                            endif;
                        ?>
        
                    <?php endwhile; // End of the loop. ?>
        
                </main><!-- #main -->
            </div><!-- #primary -->
        </div>
    	<div class="col-md-4">
        <?php get_sidebar(); ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>
