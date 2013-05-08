<?php
/*
Template Name: Explore
*/
$type = 'recipe';
$args = array(
    'post_type' => $type,
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'caller_get_posts' => 1
);
$recipes = null;
$recipes = new WP_Query($args);

?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
<div id="container">
    <script type="text/javascript">
        $(document).ready(function(){
            $('#vietnam-button').on('click', function(){
                $('.recipe_item').each(function(index){
                    if($(this).data('origin') !== "Vietnamese"){
                        $(this).css('display', 'none');
                    }
                    else{
                       $(this).css('display', 'inline-block'); 
                    }
                });
            });
            $('#thailand-button').on('click', function(){
                $('.recipe_item').each(function(index){
                    if($(this).data('origin') !== "Thai"){
                        $(this).css('display', 'none');
                    }
                    else{
                       $(this).css('display', 'inline-block'); 
                    }
                });
            });
            $('#china-button').on('click', function(){
                $('.recipe_item').each(function(index){
                    if($(this).data('origin') !== "Chinese"){
                        $(this).css('display', 'none');
                    }
                    else{
                       $(this).css('display', 'inline-block'); 
                    }
                });
            });
            $('#india-button').on('click', function(){
                $('.recipe_item').each(function(index){
                    if($(this).data('origin') !== "Indian"){
                        $(this).css('display', 'none');
                    }
                    else{
                       $(this).css('display', 'inline-block'); 
                    }
                });
            });
        });
    </script>
    <div id="container-inner-explore">
        <div id="explore-leftsidebar">
            <div id="explore-header">
                <h1>EXPLORE</h1>
            </div>
            <div id="explore-cousine">
                <h3>Cuisine</h3>
                <div id="explore-cousine-ul">
                    <ul>

            <li><a href="#"><div id="vietnam-button" class="order-outer"><div class="round"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/vietnamese.png" class="nnationpic"></img></div><span>Vietnamese</span></div></a></li>
            <li><a href="#"><div id="thailand-button" class="order-outer"><div class="round"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/thailand.png" class="nnationpic"></img></div><span>Thai</span></div></a></li>

            <li><a href="#"><div id="india-button" class="order-outer"><div class="round"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/india.png" class="nnationpic"></img></div><span>Indian</span></div></a></li>
            <li><a href="#"><div id="china-button" class="order-outer"><div class="round"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/chinese.png" class="nnationpic"></img></div><span>Chinese</span></div></a></li>
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
            <div style="clear:both;"></div>
        </div>
        <div id="explore-main">
            <ul id="explore-food">
                <?php
                    if($recipes->have_posts()):
                        while($recipes->have_posts()) : $recipes->the_post();
                            $recipepost = get_post_custom(get_the_id());
                                echo '<li class="recipe_item" data-origin="' . $recipepost[origin][0] . '">';
                                    echo '<div class="explore-food-detail">';
                                    echo '<img>' . wp_get_attachment_image($recipepost[finished_image][0]) . '</img>';
                                    echo '<div class="explore-food-title">';
                                        echo '<div class="explore-food-title-left">';
                                            echo '<h3 class="top-title">' . $recipepost[recipe_name][0] . '</h3>';
                                            echo '<h3 class="title-ili">' . $recipepost[origin][0] . ' Cuisine</h3>';
                                        echo '</div>';
                                        echo '<div class="explore-food-title-right">';
                                            echo '<h3>$ ' . $recipepost[price][0] . '</h3>';
                                        echo '</div>';
                                    echo '<div class="food-description">';
                                        echo '<div class="explore-food-description">';
                                            echo '<p>' . $recipepost[description][0] . '</p>';
                                        echo '</div>';
                                    echo '<div class="explore-add-to-cart"><a class="primary-btn explore-btn" href="' . get_permalink() . '">Buy Now</a></div></div></div>';
                        endwhile;
                    endif;
                ?>
            </ul>
        </div>
    </div>
    <div style="clear:both;"></div>
</div>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer') ); ?>