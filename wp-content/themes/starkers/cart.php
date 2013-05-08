<?php
/*
Template Name: Cart
*/
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
<div id="container">
<div id="checkout-wrapper">
				<div class="cart-h1">Items in Your Cart</div>
				<hr>
				
				<div class="cart-item">
					<img src="./img/thailand.png">
				</div>
				
				<div class="cart-item-name">
					<h1>Pad Thai</h1>
					<h2>from</h2>
					<h3>Spoon Thai</h3>
					<hr>
				</div>
				
				<div class="cart-item-subtitle">
					Available to ship: Within 24 hours
				</div>
				
				<div id="cart-specs">
					<table>
						<tr>
							<td>Unit Price</td>
							<td>Quantity</td>
							<td>Total</td>
						</tr>
						<tr>
								<td>$10.00</td>
								<td><input type="text" name="search"></td>
								<td>$20.00</td>
							</tr>						
					</table>
                    </div>
					<BR>
					<div class="hr-pad">
					<hr>
					</div>
					<div class="checkout-button">Check Out</div>
                    <div style="clear:both;"></div>
				</div>					
			<div id="checkout-wrapper" style="margin-top:40px;">
				<div class="cart-h1">Recommended Items</div>
				<hr>
				<ul class="appetizers-ul">
				<li>		
                	<div class="explore-food-detail">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/chicken.png"/>
                        	<div class="explore-food-title">
                            <div class="explore-food-title-left">
                            	<h3 class="top-title">
                                	Pad Thai
                                </h3>
                                <h3 class="title-ili">
                                	Thai Cuisine
                                </h3>
                            </div>
						<div class="food-description">
							 <div class="explore-food-description">
                            	<p>
                                	Lorem Ipsum dolor sit amet consectetur adipiscing...
                                </p>
                            </div>
                            <div class="explore-add-to-cart">
								<a class="primary-btn explore-btn">Buy Now</a>
                            </div>
					</div>
				</div>
                </div>
                </li>
                </ul>
                <div style="clear:both;"></div>		
		</div>
        </div>	
        <div style="clear:both;"></div>
        </div>
</div>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer') ); ?>