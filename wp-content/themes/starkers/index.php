<?php
/**
 * The main template file
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file 
 *
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<?php /*?><?php if ( have_posts() ): ?>
<h2>Latest Posts</h2>	
<ol>
<?php while ( have_posts() ) : the_post(); ?>
	<li>
		<article>
			<h2><a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
			<time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php the_date(); ?> <?php the_time(); ?></time> <?php comments_popup_link('Leave a Comment', '1 Comment', '% Comments'); ?>
			<?php the_content(); ?>
		</article>
	</li>
<?php endwhile; ?>
</ol>
<?php else: ?>
<h2>No posts to display</h2>
<?php endif; ?><?php */
?>

<div id="container">
	<div id="container-index">
        <div id="nav-btn">
            <a class="primary-btn index-btn" href="http://localhost/diy_takeout/?page_id=14">ORDER</a>
            <a class="primary-btn index-btn" style="margin-left:35px;" href="#">EXPLORE</a>
        </div>
        <div id="middle">
            <div style="float:left;width:265px;height:35px;border-bottom:2px solid #fff;"></div>
            <div style="float:left;margin-left: 40px;margin-top: 24px;">OR</div>
            <div style="float:left;margin-left:40px;width:265px;height:35px;border-bottom:2px solid #fff;"></div>
        </div>
        <div id="search">
        	<div style="border-right:3px solid #b8b8b8;width:28px;left:5px;height:28px;position:absolute;top:47px;background:#fff;padding:10px;">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/search.png"></img>
            </div>
            <input id="search-input" type="text" placeholder="Spicy, Basil, Thai..."/>
        </div>
    </div>
</div>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer') ); ?>