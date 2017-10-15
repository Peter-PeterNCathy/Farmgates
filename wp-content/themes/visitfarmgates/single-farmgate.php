<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Visit_Farmgates
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) { 
			the_post();
			echo '<div class="single-farm">';

			echo '<div class="single-image">';
			the_post_thumbnail();
			echo '</div>';

			echo '<h2 class="single-title">';
			the_title();
			echo '</h2>';

			echo '<div class="single-content">';
			the_content();
			echo '</div>';

			echo '<div class="single-left">';
			echo '<div class="contact"><div class="contact-title">Contact</div>';
			echo '<div class="contact-address">' . do_shortcode('[wp_places formattedAddress]') . '</div>';

			echo '<div class="contact-hrwrapper"><hr class="contact-hr"></div>';

			echo '<div class="contact-phone">Phone: ' . do_shortcode('[wp_places phoneNumber]') . '</div>';
			echo '<div><a class="contact-website" href=' . do_shortcode('[wp_places website]') . '>Website'  . '</a>&nbsp|&nbsp';
			$place_id = get_post_meta( get_the_ID(), 'wp_place_id', true );
			echo '<a class="contact-directions" target="_blank" href=https://www.google.com/maps/dir/?api=1&destination_place_id=' . $place_id . '&destination=' . get_the_title() . '>Directions</a><div>';
			
			echo '</div>';

			echo '<div class="contact-hours"><span class="hours-title">Open Hours:</span><br>';
			echo do_shortcode('[wp_places hours]') . '</div>';
			echo '</div>';	// end left

			echo '<div class="single-right">';
			// products
			$product_ids = explode(',', get_post_meta( get_the_ID(), 'farmgate_products', true ));
			echo '<ul class="single-products">';
			foreach ($product_ids as $product_id) {
				echo '<li class="single-product">';
				echo '<div class="single-product-img">' . get_the_post_thumbnail($product_id) . '</div>';
				echo '<div class="single-product-title">' . get_post($product_id)->post_title . '</div>';
				echo '</li>';
			}
			echo '</ul>';

			echo '</div>'; // end right

			echo '</div>';
		}
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
