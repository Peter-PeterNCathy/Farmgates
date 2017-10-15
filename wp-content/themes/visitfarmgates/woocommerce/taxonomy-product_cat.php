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
		<main id="main" class="tax-main">
		
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
			$taxonomy_name = 'product_cat';
			
			$term_children = get_term_children(get_queried_object_id(), $taxonomy_name);
			if ( empty($term_children) ) {
				vf_display_products( get_queried_object_id() );
			}
			else {
				echo '<ul class="sub-tax">';
				foreach ( $term_children as $child ) {
					echo '<li class="sub-tax-item">';

					$term = get_term_by( 'id', $child, $taxonomy_name );
					echo '<div class="sub-tax-title"><a id="sub-tax-title-text" href="' . get_term_link( $child, $taxonomy_name ) . '">' . $term->name . '</a></div>';

					vf_display_products($child);

					echo '</li>';
				}

				echo '</ul>'; // end sub-tax
			}
			
		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; 
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();