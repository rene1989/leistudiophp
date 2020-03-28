<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package iconwp
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
    	<div id="footer-widget">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">                    
                    	<?php dynamic_sidebar('footer-one-widget'); ?>
                    </div>
                    <div class="col-md-4">                    
                    	<?php dynamic_sidebar('footer-two-widget'); ?>
                    </div>
                    <div class="col-md-4">                    
                    	<?php dynamic_sidebar('footer-three-widget'); ?>
                    </div>
                </div>
            </div>
        </div>		
	</footer><!-- #colophon -->
    <div class="site-info">
    	<div class="container">
			<p><?php echo __('&copy; ', 'iconwp') . esc_attr( get_bloginfo( 'name', 'display' ) );  ?>
				<?php if(is_home() && !is_paged()){?>            
                    <?php _e('- Powered by ', 'iconwp'); ?><a href="<?php echo esc_url( __( 'http://wordpress.org/', 'iconwp' ) ); ?>" title="<?php esc_attr_e( '' ); ?>"><?php _e('WordPress' ,'iconwp'); ?></a>
                    <?php _e(' and ', 'iconwp'); ?><a href="<?php echo esc_url( __( 'http://invictusthemes.com/', 'iconwp' ) ); ?>"><?php _e('Invictus Themes', 'iconwp'); ?></a>
                <?php } ?>
            </p>
    	</div>
    </div><!-- .site-info -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
