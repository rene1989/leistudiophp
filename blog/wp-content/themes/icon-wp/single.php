<?php
/**
 * The template for displaying all single posts.
 *
 * @package iconwp
 */

get_header(); ?>
	<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
	<header class="entry-header title-container" <?php if (!empty($image)) { ?> style="background: url(<?php echo $image[0]; ?> ) center center / cover no-repeat !important;"<?php }else { ?> id="no-featured"<?php } ?>>
    	<div class="container">
        	<div class="inner-container">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
            
                <div class="entry-meta">
                    <?php iconwp_posted_on(); ?>
                </div><!-- .entry-meta -->
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
        
                    <?php get_template_part( 'template-parts/content', 'single' ); ?>
        
                    <?php the_post_navigation(); ?>
        
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
