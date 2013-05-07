<?php
   /*
   Plugin Name: Custom Posts
   Description: A plugin that allows for custom post types for DIY Takeout
   Version: 1.0
   Author: KeVon Ticer
   */
  
  /*************************************

	Custom Post Code for restaurants

  *************************************/
  function custom_post_restaurant() {
		$labels = array(
		'name'               => _x( 'Restaurants', 'post type general name' ),
		'singular_name'      => _x( 'Restaurant', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'restaurant' ),
		'add_new_item'       => __( 'Add New Restaurant' ),
		'edit_item'          => __( 'Edit Restaurant' ),
		'new_item'           => __( 'New Restaurant' ),
		'all_items'          => __( 'All Restaurants' ),
		'view_item'          => __( 'View Restaurant' ),
		'search_items'       => __( 'Search Restaurants' ),
		'not_found'          => __( 'No restaurants found' ),
		'not_found_in_trash' => __( 'No restaurants found in the Trash' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Restaurants'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'Holds our restaurants and restaurant specific data',
		'public'        => true,
		'menu_position' => 5,
		'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
		'has_archive'   => true,
	);
		register_post_type( 'restaurant', $args );	
	}

	add_action( 'init', 'custom_post_restaurant' );


	/*************************************

	Custom Post Code for recipes

  *************************************/

	function custom_post_recipe() {
		$labels = array(
		'name'               => _x( 'Recipes', 'post type general name' ),
		'singular_name'      => _x( 'Recipe', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'recipe' ),
		'add_new_item'       => __( 'Add New Recipe' ),
		'edit_item'          => __( 'Edit Recipe' ),
		'new_item'           => __( 'New Recipe' ),
		'all_items'          => __( 'All Recipes' ),
		'view_item'          => __( 'View Recipe' ),
		'search_items'       => __( 'Search Recipes' ),
		'not_found'          => __( 'No recipes found' ),
		'not_found_in_trash' => __( 'No recipes found in the Trash' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Recipes'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'Holds our recipes and recipe specific data',
		'public'        => true,
		'menu_position' => 6,
		'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
		'has_archive'   => true,
	);
		register_post_type( 'recipe', $args );	
	}

	add_action( 'init', 'custom_post_recipe' );


?>