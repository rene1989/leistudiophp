<?php
/**
 * Template part for displaying posts.
 *
 * @package iconwp
 */

?>
<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
<div style="padding:40px 0; background:#fff;">
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="container">
        <div class="row">
            
            <div class="col-md-6">
            	<?php if($image[0] != ""){ ?>
                    <header class="entry-header">
                        <?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
                
                        <?php if ( 'post' == get_post_type() ) : ?>
                        <div class="entry-meta">
                            <?php iconwp_posted_on(); ?>
                        </div><!-- .entry-meta -->
                        <?php endif; ?>
                    </header><!-- .entry-header -->
            	<?php } ?>
                <div class="entry-content no-top-margin">
                    <p><?php echo iconwp_excerpt('40'); ?></p>
            		<p class="read-more"><a href="<?php the_permalink('') ?>" class="btn-more"><?php _e( 'Read More', 'iconwp' ); ?><i class="fa fa-angle-double-right"></i></a></p>
                    <?php
                        wp_link_pages( array(
                            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'iconwp' ),
                            'after'  => '</div>',
                        ) );
                    ?>
                </div><!-- .entry-content -->
            </div>
            <div class="col-md-6">
            	<?php if($image[0] == ""){ ?>
                	<header class="entry-header">
						<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
                
                        <?php if ( 'post' == get_post_type() ) : ?>
                        <div class="entry-meta">
                            <?php iconwp_posted_on(); ?>
                        </div><!-- .entry-meta -->
                        <?php endif; ?>
                    </header><!-- .entry-header -->
                <?php } ?>
            	<img src="<?php echo $image[0]; ?>" />
            </div>       
        </div>
        <footer class="entry-footer">
            <?php //iconwp_entry_footer(); ?>
        </footer><!-- .entry-footer -->
    </div>
</article><!-- #post-## -->
</div>
