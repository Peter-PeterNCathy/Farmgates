<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Visit_Farmgates
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php 
		
		$taxonomy = 'region';
	 
		$inner = '<h3 class="state_title">' . get_the_archive_title() . '</h3>';

		$args = array(
		'post_type' => 'farmgate',
		'tax_query' => array(
				array(
					'taxonomy'         => $taxonomy,
					'field'            => 'term_id',
					'terms'            => get_queried_object_id(),
				)
			)
		);

		$fg_query = new WP_Query( $args );

		$wrapper_region = '';
		while ( $fg_query->have_posts() ) {
			$fg_query->the_post();

			$wrapper_region .= '<div><a class="region_farmgate" href=' . get_permalink() . '>Visit ' . get_the_title() . '</a></div>';
		}
		
		$fg_query->wp_reset_query();

		$inner .= $wrapper_region;

		echo '<div class="display-content">' . $header . $inner . '</div>';
		?>

		
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
