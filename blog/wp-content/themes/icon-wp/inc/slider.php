<?php 
	$slider_display = get_theme_mod( 'iconwp_display_slider_setting');
	$slider_cat = get_theme_mod( 'iconwp_category_setting'); 
	//query posts
	query_posts(
		array(
		'offset'           => 0,
		'category_name' => $slider_cat,
		'posts_per_page' => -1,
		'orderby'          => 'post_date',
		'order'            => 'DESC',
		'include'          => '',
		'exclude'          => '',
		'meta_key'         => '',
		'meta_value'       => '',
		'post_type'        => 'post',
		'post_mime_type'   => '',
		'post_parent'      => '',
		'post_status'      => 'publish',
		'suppress_filters' => true
	));
	$counter = 1;
	$myposts = $wp_query->post_count;
?>
<?php if($slider_display == 1){ ?> 
	<?php if (have_posts()) : ?>    	
        <section id="home-slider">    
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                         
            <!-- Wrapper for slides -->
            
                
                <div class="carousel-inner">
                          
                    <?php while (have_posts()) : the_post(); ?> 
                        <?php
                        if ( has_post_thumbnail() ) { 
                        $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
                        ?>
                        <div class="item bg bg<?php echo $counter; ?> <?php if($counter == 1) {echo "active";} ?>" style="background-image:url(<?php echo $large_image_url[0]; ?>); background-position: center center;">    	
                            <div class="carousel-content-bg">
                                <div class="container">
                                    <h1><a class="more" href="<?php the_permalink('') ?>"><?php the_title(); ?></a></h1>
                                    <p><?php the_excerpt(); ?></p>              
                                </div>
                            </div>
                        </div>
                         <?php $counter = $counter + 1; ?>
                        <?php } ?>
                       
                    <?php endwhile; ?> 
                
                
                </div>
                <ol class="carousel-indicators">
                	<?php $x = 0; ?>
                	<?php do { ?>
                    <li data-target="#myCarousel" data-slide-to="<?php echo $x; ?>" class="<?php if($x == 0) {echo "active";} ?>"></li>
                    <?php $x = $x + 1; ?>
         			<?php } while ($x < ($counter - 1)); ?>
                </ol>
                <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
            
            </div>
        </section>
    <?php endif; ?> 
    
<?php } ?> 
<?php wp_reset_query(); ?>