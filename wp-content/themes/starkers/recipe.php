<?php
/*
Template Name: Recipe
*/
?>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
<div id="container">
	<div id="container-inner-explore">
    	<div id="explore-leftsidebar">
        	<div id="food-img">
            	<img style="width:100%;" src="<?php echo get_stylesheet_directory_uri(); ?>/img/chicken.png"/>
            </div>
            <div id="food-title">
            	<h3>Pad Thai</h3>
                <h3>Thai</h3>
            </div>
            <div id="food-description">
            	<p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi volutpat, quam sed hendrerit dignissim, metus dui facilisis libero, vel vulputate est nisi vel ipsum. Integer sit amet risus tortor, ut viverra elit. Phasellus tempus accumsan neque, lacinia dignissim
                </p>
            </div>
            <table id="food-serving">
            	<tr>
                	<td>Servings:</td>
                    <td></td>
                </tr>
                <tr>
                	<td>Total cost:</td>
                    <td>$10</td>
                </tr>
            </table>
            <div id="food-add-to-cart" style="margin-left:20px;">
            	<a class="primary-btn food-btn" href="#">ADD TO CART</a>
            </div>
        </div>
         <div id="explore-main" class="food-explore-main">
         	<div id="food-main">
            	<div id="food-attr">
                	<ul style="margin-left:20%;">
                    	<li style="border-right:1px solid #979797;"><div class="food-attr-pic"><img style="width:25px;" src="<?php echo get_stylesheet_directory_uri(); ?>/img/difficulty-level.png"/></div><span>Easy Level</span></li>
                        <li style="border-right:1px solid #979797;"><div class="food-attr-pic"><img style="width:29px;" src="<?php echo get_stylesheet_directory_uri(); ?>/img/clock.png"/></div><span>30 mins</span></li>
                        <li><div><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/vegetarian.png"/></div></li>
                    </ul>
                </div>
                <div id="food-ingredients">
                	<h3>Ingredients</h3>
                    <table id="food-ingredients-table" style="width:100%;">
                    	<tr>
                        	<td>1 (12 ounce) package rice noodles</td>
                            <td>2 tablespoons fish sauce</td>
                        </tr>
                        <tr>
                        	<td>1 (12 ounce) package rice noodles</td>
                            <td>2 tablespoons fish sauce</td>
                        </tr>
                        <tr>
                        	<td>1 (12 ounce) package rice noodles</td>
                            <td>2 tablespoons fish sauce</td>
                        </tr>
                        <tr>
                        	<td>1 (12 ounce) package rice noodles</td>
                            <td>2 tablespoons fish sauce</td>
                        </tr>
                        <tr>
                        	<td>1 (12 ounce) package rice noodles</td>
                            <td>2 tablespoons fish sauce</td>
                        </tr>
                        <tr>
                        	<td>1 (12 ounce) package rice noodles</td>
                            <td>2 tablespoons fish sauce</td>
                        </tr>
                        <tr>
                        	<td>1 (12 ounce) package rice noodles</td>
                            <td>2 tablespoons fish sauce</td>
                        </tr>
                    </table>
                </div>
                <div id="food-instructions">
                	<h3>Instructions</h3>
                    <p>
                    	1. Place rice noodles in a large bowl and cover with several inches of room temperature water; let soak for 30 to 60 minutes. Drain.
                    </p>
                    <p>
                    2. Whisk sugar, vinegar, fish sauce, and tamarind paste in a saucepan over medium heat. Bring to a simmer, remove from heat.
                    </p>
                    <p>
                    3. Heat 1 tablespoon vegetable oil in a skillet over medium-high heat. Add chicken; cook and stir until chicken is cooked through, 5 to 7 minutes. Remove from heat.
                    </p>
                    <p>
                    4. Heat 1 tablespoon oil and minced garlic in a large skillet or wok over medium-high heat. Stir in eggs; scramble until eggs are nearly cooked through, about 2 minutes. Add cooked chicken breast slices and rice noodles; stir to combine.
                    </p>
                    <p>
                    5. Stir in tamarind mixture, 1 1/2 tablespoons sugar, and salt; cook until noodles are tender, 3 to 5 minutes. Stir in peanuts; cook until heated through, 1 to 2 minutes. Garnish with bean sprouts, chives, paprika, and lime wedges.
                    </p>
                </div>
                <div id="food-cooking-mode">
                	<a style="margin-left:22%;margin-top:65px;" class="primary-btn">COOKING MODE</a>
                </div>
            </div>
         </div>
    </div>
</div>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer') ); ?>