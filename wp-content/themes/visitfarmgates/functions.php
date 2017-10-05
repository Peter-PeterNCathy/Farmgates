<?php
/**
 * Visit Farmgates functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Visit_Farmgates
 */

if ( ! function_exists( 'visitfarmgates_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function visitfarmgates_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Visit Farmgates, use a find and replace
		 * to change 'visitfarmgates' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'visitfarmgates', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'visitfarmgates' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'visitfarmgates_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'visitfarmgates_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function visitfarmgates_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'visitfarmgates_content_width', 640 );
}
add_action( 'after_setup_theme', 'visitfarmgates_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function visitfarmgates_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'visitfarmgates' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'visitfarmgates' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'visitfarmgates_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function visitfarmgates_scripts() {
	wp_enqueue_style( 'visitfarmgates-style', get_stylesheet_uri() );

	wp_enqueue_script( 'visitfarmgates-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'visitfarmgates-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'visitfarmgates_scripts' );

if ( ! function_exists('visitfarmgates_post_type') ) {

// Register Custom Post Type
function visitfarmgates_post_type() {

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
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'taxonomies'            => array( 'feature', 'region' ),
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
add_action( 'init', 'visitfarmgates_post_type', 0 );

}

// Register Custom Taxonomy
function visitfarmgates_region_taxonomy() {

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
add_action( 'init', 'visitfarmgates_region_taxonomy', 0 );

// Register Custom Taxonomy
function visitfarmgates_feature_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Features', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Feature', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Features', 'text_domain' ),
		'all_items'                  => __( 'All Features', 'text_domain' ),
		'parent_item'                => __( 'Parent Feature', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Feature:', 'text_domain' ),
		'new_item_name'              => __( 'New Feature Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Feature', 'text_domain' ),
		'edit_item'                  => __( 'Edit Feature', 'text_domain' ),
		'update_item'                => __( 'Update Feature', 'text_domain' ),
		'view_item'                  => __( 'View Item', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate features with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove features', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used features', 'text_domain' ),
		'popular_items'              => __( 'Popular Items', 'text_domain' ),
		'search_items'               => __( 'Search features', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No features', 'text_domain' ),
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
	register_taxonomy( 'feature', array( 'farmgate' ), $args );

}
add_action( 'init', 'visitfarmgates_feature_taxonomy', 0 );

// Register Custom Meta box
function visitfarmgates_products() {

	add_meta_box(
        'farmgate_products',
        'Products',
        'visitfarmgates_products_meta_box',
        'farmgate'
    );

}
add_action( 'add_meta_boxes', 'visitfarmgates_products', 0 );

// Register Custom Meta box
function visitfarmgates_products_meta_box( $post ) {

    wp_nonce_field( 'visitfarmgates_products_meta_box', 'visitfarmgates_products_meta_box_nonce' );
    $value = get_post_meta( $post->ID, 'farmgate_products', true );

    ?>

    <label for="farmgate_products"></label>
    <input type="text" id="farmgate_products" name="farmgate_products" value="<?php echo esc_attr( $value ); ?>" placeholder="Enter Product Ids" >
    <br>
    <div>Separate products with commas</div>

    <?php

}

function visitfarmgates_products_save_meta_box( $post_id ) {
    // For safe
    // if sending a hidden content (provent sent by others)
    if ( ! isset( $_POST['visitfarmgates_products_meta_box_nonce'] ) ) {
        return;
    }
    // if the value is the same as previous one
    if ( ! wp_verify_nonce( $_POST['visitfarmgates_products_meta_box_nonce'], 'visitfarmgates_products_meta_box' ) ) {
        return;
    }

    // if the current user has permission
    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }

    // if it is empty
    if ( ! isset( $_POST['farmgate_products'] ) ) {
        return;
    }

    $farmgate_products = sanitize_text_field( $_POST['farmgate_products'] );
    update_post_meta( $post_id, 'farmgate_products', $farmgate_products );

}
add_action( 'save_post', 'visitfarmgates_products_save_meta_box' );

// display specific taxonomy
function be_display_taxonomies_shortcode( $atts ) {

    $a = shortcode_atts( array(
		'post_type'            => 'post',
		'tax_term'             => false,
		'taxonomy'             => false,
    ), $atts );

    $post_type            = sanitize_text_field( $a['post_type'] );
    $tax_term             = sanitize_text_field( $a['tax_term'] );
	$taxonomy             = sanitize_key( $a['taxonomy'] );

/***
	// Set up initial query for post
	$args = array(
		'post_type'           => $post_type,
	);


	// If taxonomy attributes, create a taxonomy query
	if ( !empty( $taxonomy ) && !empty( $tax_term ) ) {
		
		$tax_args = array(
			'tax_query' => array(
				array(
					'taxonomy'         => $taxonomy,
					'field'            => 'slug',
					'terms'            => $tax_term,
				)
			)
		);

		$args = array_merge_recursive( $args, $tax_args );
	}

	$listing = new WP_Query( $args );

	$inner = '';
	// The Loop
	if ( $listing->have_posts() ) {
		
		while ( $listing->have_posts() ) {
			$listing->the_post();

			$args_farmgates = array(
				'post_type' => 'farmgate',
				'meta_key'	=> 'farmgate_products',
				'meta_value' => get_the_ID(),
			);
			$query_farmgates = new WP_Query( $args_farmgates );

			if ( $query_farmgates->have_posts() ) {
		
				while ( $query_farmgates->have_posts() ) {
					$query_farmgates->the_post();

					$inner .= get_the_title();

				}

				// Restore original Post Data 
				$query_farmgates->wp_reset_postdata();
			}
		}

		// Restore original Post Data 
		$listing->wp_reset_postdata();
	} else {
		// no posts found
	}

	**/


$term = get_term_by('slug', $tax_term, $taxonomy);
$term->name;
$term->description;
$term->count; 
$img_id = get_term_meta($term->term_id, 'thumbnail_id', true);
$img_url = wp_get_attachment_url( $img_id );
$browse_link = get_term_link($term->term_id, $taxonomy);


	$inner = '';
	$title_bg_open = '<div class="title-background" style="background-image:url(' . $img_url . ')">';
	$title = '<span class="title">' . $term->name . '</span>';
	$title_bg_close = '</div>';
	$desc_products_num = '<span class="products">' . $term->count . '</span>';
	$term->description = ' products are provided by local farms.';
	$desc = '<div class="description">' . $desc_products_num . $term->description . '</div>';
	$browse = '<div class="browse"><a href=' . $browse_link . '>Browse</a></div>';
	
	$inner = $title_bg_open . $title . $title_bg_close . $desc . $browse;
	$output = '<div class="product_tax">' . $inner . '</div>';

	return $output;
}
add_shortcode('display-taxonomies', 'be_display_taxonomies_shortcode');

function vf_display_products( $term_id ) {
	$args = array(
	'post_type' => 'product',
	'tax_query' => array(
			array(
				'taxonomy'         => 'product_cat',
				'field'            => 'term_id',
				'terms'            => $term_id,
			)
		)
	);

	$child_posts_query = new WP_Query( $args );

	echo '<ul class="sub-tax-products">';
	while ( $child_posts_query->have_posts() ) {
		$child_posts_query->the_post();
		echo '<li class="sub-tax-product">';

		echo '<div class="sub-tax-product-image">';
		the_post_thumbnail();
		echo '</div>';

		echo '<div class="sub-tax-product-title">';
		the_title();
		echo '</div>';

		// query relevant farm
		$args_farmgates = array(
			'post_type' => 'farmgate',
			'meta_key'	=> 'farmgate_products',
			'meta_value' => get_the_ID(),
		);
		$query_farmgates = new WP_Query( $args_farmgates );
		if ($query_farmgates->have_posts()) {
			$query_farmgates->the_post();

			echo '<div class="sub-tax-product-farm-title">';
			the_title();
			echo '</div>';

			echo '<a class="sub-tax-product-farm-link" href=' . get_permalink() . '>Visit Farm</a>';
		}
		$query_farmgates->wp_reset_query();

		echo '</li>';
	}
	$child_posts_query->wp_reset_query();
	echo '</ul>';
}


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}
