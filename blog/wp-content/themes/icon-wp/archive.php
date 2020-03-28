<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package iconwp
 */

get_header(); ?>
	<div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

        <?php if ( have_posts() ) : ?>

            <?php $image = '' ?>
			<header class="entry-header title-container" <?php if (!empty($image)) { ?> style="background: url(<?php echo $image[0]; ?> ) center center / cover no-repeat !important;"<?php }else { ?> id="no-featured"<?php } ?>>
            	<div class="container">
        			<div class="inner-container">
						<?php
                            the_archive_title( '<h1 class="entry-title">', '</h1>' );
                            the_archive_description( '<div class="taxonomy-description">', '</div>' );
                        ?>
            		</div>
                </div>
            </header><!-- .page-header -->

            <?php /* Start the Loop */ $couter = 1; ?>
            <?php while ( have_posts() ) : the_post(); ?>
					
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

            <?php the_posts_navigation(); ?>

        <?php else : ?>

            <?php get_template_part( 'template-parts/content', 'none' ); ?>

        <?php endif; ?>

        </main><!-- #main -->
	</div><!-- #primary -->


<?php get_footer(); ?>
