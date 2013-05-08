<?php
/*
Template Name: Order Now
*/
?>
<?php 
	Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); 
	//echo do_shortcode("[ic_add_posts post_type='restaurant']");
?>



<div id="container">
	<div id="container-inner-order">
    	<ul>
    		<?php
    			$type = 'restaurant';
    			$args = array(
    				'post_type' => $type,
    				'post_status' => 'publish',
    				'posts_per_page' => -1,
    				'caller_get_posts' => 1
    			);
    			$query = null;
    			$query = new WP_Query($args);
    			if($query->have_posts()){
    				while($query->have_posts()) : $query->the_post(); ?>
    				<?php	
    				echo '<li><a href=' . get_permalink() . '><div class="order-outer"><div class="round"><img src=' . get_stylesheet_directory_uri() . '/img/vietnamese.png class="nnationpic"></img></div><span>' . get_the_title() . '</span></div></a></li>';
    				endwhile;
    				}
    				wp_reset_query();
    				wp_reset_postdata();
    		?>
        </ul>
    </div>
</div>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer') ); ?>