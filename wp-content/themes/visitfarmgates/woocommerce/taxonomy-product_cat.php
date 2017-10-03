<?php
/**
 * The Template for displaying products in a product category. 
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
		
		<?php
		if ( have_posts() ) : 
		?>

			<header class="page-header">
				<?php
				$title = single_cat_title( '', false );
				echo '<h1 class="tax-title">' . $title . '</h1>';
				the_archive_description( '<div class="tax-desc">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php
			$post_type = 'product';
			$taxonomy_name = 'product_cat';
			
			$term_children = get_term_children(get_queried_object_id(), $taxonomy_name);
			
			echo '<ul class="sub-tax">';
			foreach ( $term_children as $child ) {
				echo '<li class="sub-tax-item">';

				$term = get_term_by( 'id', $child, $taxonomy_name );
				echo '<a class="sub-tax-title" href="' . get_term_link( $child, $taxonomy_name ) . '">' . $term->name . '</a>';

				// products in sub taxonomy
				$args = array(
						'post_type'           => $post_type,
						'tax_query' => array(
								array(
									'taxonomy'         => $taxonomy_name,
									'field'            => 'term_id',
									'terms'            => $child,
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

				echo '</li>';
			}

			echo '</ul>';
			
			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; 
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();