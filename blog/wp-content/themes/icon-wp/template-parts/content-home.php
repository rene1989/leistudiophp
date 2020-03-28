<?php
/**
 * Template part for displaying posts.
 *
 * @package iconwp
 */


?>
<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
<div class="col-md-4 thumbnail-holder">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> style="background:url(<?php echo $image[0]; ?>) center center / cover; height: 100%;">
        <div class="effect-container">    
            <div class="entry-content">
                <p><?php echo iconwp_excerpt('40'); ?></p>
            </div><!-- .entry-content -->
            <header class="entry-header">
                    <?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
            </header><!-- .entry-header -->
    	</div>
	</article><!-- #post-## -->
</div>

