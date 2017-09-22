<?php

if ( ! function_exists('farmgate_post_type') ) {

// Register Custom Post Type
function farmgate_post_type() {

	$labels = array(
		'name'                  => _x( 'Farmgates', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Farmgate', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Farmgates', 'text_domain' ),
		'name_admin_bar'        => __( 'Farmgate', 'text_domain' ),
		'archives'              => __( 'Farmgate Archives', 'text_domain' ),
		'attributes'            => __( 'Farmgate Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Farmgate:', 'text_domain' ),
		'all_items'             => __( 'All Farmgates', 'text_domain' ),
		'add_new_item'          => __( 'Add New Farmgate', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Farmgate', 'text_domain' ),
		'edit_item'             => __( 'Edit Farmgate', 'text_domain' ),
		'update_item'           => __( 'Update Farmgate', 'text_domain' ),
		'view_item'             => __( 'View Farmgate', 'text_domain' ),
		'view_items'            => __( 'View Farmgates', 'text_domain' ),
		'search_items'          => __( 'Search Farmgate', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Farmgate', 'text_domain' ),
		'items_list'            => __( 'Farmgates list', 'text_domain' ),
		'items_list_navigation' => __( 'Farmgates list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter farmgates list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Farmgate', 'text_domain' ),
		'description'           => __( 'A farmgate information page.', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', ),
		'taxonomies'            => array( 'state', 'region' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-admin-post',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'farmgate', $args );

}
add_action( 'init', 'farmgate_post_type', 0 );

}

if ( ! function_exists( 'region_taxonomy' ) ) {

// Register Custom Taxonomy
function region_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Regions', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Region', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Regions', 'text_domain' ),
		'all_items'                  => __( 'All Regions', 'text_domain' ),
		'parent_item'                => __( 'Parent Region', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Region:', 'text_domain' ),
		'new_item_name'              => __( 'New Region Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Region', 'text_domain' ),
		'edit_item'                  => __( 'Edit Region', 'text_domain' ),
		'update_item'                => __( 'Update Region', 'text_domain' ),
		'view_item'                  => __( 'View Item', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate regions with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove regions', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used regions', 'text_domain' ),
		'popular_items'              => __( 'Popular Items', 'text_domain' ),
		'search_items'               => __( 'Search regions', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No items', 'text_domain' ),
		'items_list'                 => __( 'Items list', 'text_domain' ),
		'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'region', array( 'farmgate' ), $args );

}
add_action( 'init', 'region_taxonomy', 0 );

}


?>