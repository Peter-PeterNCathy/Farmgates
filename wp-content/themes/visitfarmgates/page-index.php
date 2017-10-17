<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Visit_Farmgates
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="fg-index">
			<h3><b>Jump to letter:&nbsp;</b><a href="#letter-A">(A - D)</a>&nbsp;&nbsp;<a href="#letter-E">(E - H)</a>&nbsp;&nbsp;<a href="#letter-I">(I - L)</a>&nbsp;&nbsp;<a href="#letter-M">(M - P)</a>&nbsp;&nbsp;<a href="#letter-Q">(Q - T)</a>&nbsp;&nbsp;<a href="#letter-U">(U - X)</a>&nbsp;&nbsp;<a href="#letter-Y">(Y - Z)</a></h3>

			<?php
			$fgs = array();

			$args = array(
			'post_type' => 'farmgate',
			'post_status' => 'publish',
			'order' => 'ASC',
			'orderby' => 'title'
			);

			$fg_query = new WP_Query( $args );
			while ( $fg_query->have_posts() ) {
				$fg_query->the_post();

				if ( $fgs[strtoupper(get_the_title()[0])] == null) {
					$fgs[strtoupper(get_the_title()[0])] = array();
				}
				array_push($fgs[strtoupper(get_the_title()[0])], $fg_query->post);

			}
			$fg_query->wp_reset_query();
			?>

			<?php foreach ($fgs as $letter => $letter_posts) { ?>
				
				<div class="letter">
				<h1 id=<?php echo 'letter-'.$letter; ?>  class="letter-title"><?php echo $letter; ?></h1>
					<ul class="letter-list">
						<?php foreach ($letter_posts as $letter_post) { ?>
							<li><?php echo '<a class="letter-list-item" href=' . get_permalink($letter_post) . '>' . $letter_post->post_title . '</a>';  ?></li>
						<?php } ?>
					</ul>
				
				</div>
			<?php } ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
