<?php
/*
Template Name: Order Now
*/
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
<div id="container">
	<div id="container-inner-order">
    	<ul>
        	<li><a href="#"><div class="order-outer"><div class="round"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/vietnamese.png" class="nnationpic"></img></div><span>Vietnamese</span></div></a></li>
            <li><a href="#"><div class="order-outer"><div class="round"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/thailand.png" class="nnationpic"></img></div><span>Thai</span></div></a></li>
            <li><a href="#"><div class="order-outer"><div class="round"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/india.png" class="nnationpic"></img></div><span>Indian</span></div></a></li>
            <li><a href="#"><div class="order-outer"><div class="round"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/chinese.png" class="nnationpic"></img></div><span>Chinese</span></div></a></li>
        </ul>
    </div>
</div>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer') ); ?>