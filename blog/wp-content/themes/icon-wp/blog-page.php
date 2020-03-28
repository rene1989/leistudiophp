<?php
/**
 * Template Name: Blog page
 * Description: 
 */
 
get_header(); ?>
	<div id="primary" class="content-area">
    	<?php
			if ( get_query_var('paged') ) {
					$paged = get_query_var('paged');
			} elseif ( get_query_var('page') ) {
					$paged = get_query_var('page');
			} else {
					$paged = 1;
			}
			
			$temp = $wp_query;
			$wp_query = null;
			$wp_query = new WP_Query();
			$wp_query->query( array(
				'post_type' => 'post',
				'paged' => $paged
			));
		?>
        <main id="main" class="site-main" role="main">

        <?php if ( $wp_query->have_posts() ) : ?>

            <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
			<header class="entry-header title-container" <?php if (!empty($image)) { ?> style="background: url(<?php echo $image[0]; ?> ) center center / cover no-repeat !important;"<?php }else { ?> id="no-featured"<?php } ?>>
            	<div class="container">
        			<div class="inner-container">
						<?php
                            the_title( '<h1 class="entry-title">', '</h1>' );
                            the_archive_description( '<div class="taxonomy-description">', '</div>' );
                        ?>
            		</div>
                </div>
            </header><!-- .page-header -->

            <?php /* Start the Loop */ $couter = 1; ?>
            <?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
					
                <?php
					$couter =  $couter % 2;
                    /*
                     * Include the Post-Format-specific template for the content.
                     * If you want to override this in a child theme, then include a file
                     * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                     */
					if($couter == 1){ 
                    	get_template_part( 'template-parts/content', 'archiveOne' );
					
					}else{
						get_template_part( 'template-parts/content', 'archiveTwo' );
					}
					$couter++;
                ?>

            <?php endwhile; ?>
			<div class="container">
            	<?php the_posts_navigation(); ?>
            </div>

        <?php else : ?>
			<div class="container">
            	<?php get_template_part( 'template-parts/content', 'none' ); ?>
			</div>
        <?php endif; ?>

        </main><!-- #main -->
	</div><!-- #primary -->


<?php get_footer(); ?>