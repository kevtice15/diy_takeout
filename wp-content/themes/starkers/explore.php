<?php
/*
Template Name: Explore
*/
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
<div id="container">
	<div id="container-inner-explore">
    	<div id="explore-leftsidebar">
        	<div id="explore-header">
            	<h1>EXPLORE</h1>
            </div>
            <div id="explore-cousine">
            	<h3>Cousine</h3>
                <div id="explore-cousine-ul">
                	<ul>
                    	<li><a href="#"><div class="order-outer"><div class="round"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/vietnamese.png" class="nnationpic"></img></div><span>Vietnamese</span></div></a></li>
            <li><a href="#"><div class="order-outer"><div class="round"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/thailand.png" class="nnationpic"></img></div><span>Thai</span></div></a></li>
            <li><a href="#"><div class="order-outer"><div class="round"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/india.png" class="nnationpic"></img></div><span>Indian</span></div></a></li>
            <li><a href="#"><div class="order-outer"><div class="round"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/chinese.png" class="nnationpic"></img></div><span>Chinese</span></div></a></li>
                    </ul>
                </div>
            </div>
            <div style="padding-top:30px;" id="ingredient">
            	<h3 style="margin-bottom:30px;">Ingredient</h3>
                <input type="text"></input>
            </div>
            <div id="allergies">
            	<h3 style="margin-bottom:30px;">Allergies & Diet</h3>
                <div id="allergies-ul">
                	<ul>
                    	<li><a href="#"><div class="order-outer"><div class="aller-outer"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/gluten.png" class="nnationpic"></img></div><span>Gluten</span></div></a></li>
            <li><a href="#"><div class="order-outer"><div class="aller-outer"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/meat.png" class="nnationpic"></img></div><span>Meat</span></div></a></li>
            <li><a href="#"><div class="order-outer"><div class="aller-outer"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/peanut.png" class="nnationpic"></img></div><span>Peanut</span></div></a></li>
            <li style="margin-left:23px;"><a href="#"><div class="order-outer"><div class="aller-outer"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/shellfish.png" class="nnationpic"></img></div><span>Shellfish</span></div></a></li>
            <li style="margin-left:10px;"><a href="#"><div class="order-outer"><div class="aller-outer"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/vegetarian.png" class="nnationpic"></img></div><span>Vegetarian</span></div></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="explore-main">
        	<ul id="explore-food">
            	<li>
                	<div class="explore-food-detail">
                    	<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/chicken.png"/>
                        <div class="explore-food-title">
                        	<div class="explore-food-title-left">
                            	<h3>
                                	Pad Thai
                                </h3>
                                <h3>
                                	Thai
                                </h3>
                            </div>
                            <div class="explore-food-title-right">
                            	<h3>
                                	$10
                                </h3>
                            </div>
                            <div class="explore-food-description">
                            	<p>
                                	Lorem Ipsum dolor sit amet consectetur adipiscing...
                                </p>
                            </div>
                            <div class="explore-add-to-cart">
                            	<a class="primary-btn explore-btn">Add to cart</a>
                            </div>
                        </div>
                	</div>
                 </li>
                 <li>
                	<div class="explore-food-detail">
                    	<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/chicken.png"/>
                	</div>
                 </li>
                 <li>
                	<div class="explore-food-detail">
                    	<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/chicken.png"/>
                	</div>
                 </li>
            </ul>
        </div>
    </div>
</div>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer') ); ?>