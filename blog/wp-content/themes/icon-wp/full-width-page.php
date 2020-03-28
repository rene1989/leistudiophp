<?php
/**
 * Template Name: Full-width, no sidebar
 * Description: A full-width template with no sidebar
 */
 
get_header();
?>
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
        <div id="primary" class="content-area col-md-12 ">
            <main id="main" class="site-main" role="main">
                <?php while ( have_posts() ) : the_post(); ?>
    
                    <?php get_template_part( 'template-parts/content', 'page' ); ?>				
    
                <?php endwhile; // end of the loop. ?>
            </main><!-- #main -->
        </div><!-- #primary -->	
    </div>
</div>
<?php get_footer(); ?>